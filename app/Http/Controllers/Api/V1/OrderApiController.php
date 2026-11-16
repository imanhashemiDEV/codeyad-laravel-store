<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\OrderStatus;
use App\Enums\PaymentType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequests\StoreOrderApiRequest;
use App\Http\Resources\OrderApiResource;
use App\Http\Resources\OrderListApiResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class OrderApiController extends Controller
{
    /**
     * Display the authenticated user's orders.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = (int) $request->input('per_page', 15);
        $perPage = $perPage > 0 ? min($perPage, 50) : 15;

        $orders = Order::query()
            ->with(['address', 'orderDetails.product', 'orderDetails.color', 'orderDetails.guaranty'])
            ->where('user_id', $request->user()->id)
            ->latest()
            ->paginate($perPage)
            ->appends($request->query());

        return response()->json([
            'result' => true,
            'message' => 'orders list',
            'data' => new OrderListApiResource($orders),
        ]);
    }

    /**
     * Display the specified order.
     */
    public function show(Request $request, Order $order): JsonResponse
    {
        $this->ensureOwnership($request, $order);

        $order->load(['address', 'orderDetails.product', 'orderDetails.color', 'orderDetails.guaranty']);

        return response()->json([
            'result' => true,
            'message' => 'order found',
            'data' => new OrderApiResource($order),
        ]);
    }

    /**
     * Create an order from the authenticated user's cart.
     */
    public function store(StoreOrderApiRequest $request): JsonResponse
    {
        $carts = Cart::query()
            ->with(['product.productPrices'])
            ->where('user_id', $request->user()->id)
            ->get();

        if ($carts->isEmpty()) {
            return response()->json([
                'result' => false,
                'message' => 'سبد خرید خالی است',
                'data' => [],
            ], 422);
        }

        $totalPrice = 0;
        $totalDiscount = 0;
        $lines = [];

        foreach ($carts as $cart) {
            $productPrice = $cart->product->productPrices
                ->where('color_id', $cart->color_id)
                ->where('guaranty_id', $cart->guaranty_id)
                ->first();

            if (! $productPrice) {
                return response()->json([
                    'result' => false,
                    'message' => 'قیمتی برای یکی از محصولات سبد خرید یافت نشد',
                    'data' => [],
                ], 422);
            }

            $totalPrice += $productPrice->price * $cart->count;
            $totalDiscount += (($productPrice->price * $productPrice->discount) / 100) * $cart->count;

            $lines[] = [
                'cart' => $cart,
                'product_price' => $productPrice,
            ];
        }

        $order = DB::transaction(function () use ($request, $carts, $lines, $totalPrice, $totalDiscount) {
            $order = Order::query()->create([
                'user_id' => $request->user()->id,
                'address_id' => $request->input('address_id'),
                'order_code' => generateRandomInteger(6),
                'total_price' => $totalPrice,
                'total_discount' => $totalDiscount,
                'status' => OrderStatus::Draft->value,
                'payment_type' => $request->input('payment_type'),
            ]);

            foreach ($lines as $line) {
                OrderDetail::query()->create([
                    'order_id' => $order->id,
                    'product_id' => $line['cart']->product_id,
                    'guaranty_id' => $line['cart']->guaranty_id,
                    'color_id' => $line['cart']->color_id,
                    'main_price' => $line['product_price']->main_price,
                    'price' => $line['product_price']->price,
                    'discount' => $line['product_price']->discount,
                    'count' => $line['cart']->count,
                ]);
            }

            Cart::query()->whereIn('id', $carts->pluck('id'))->delete();

            return $order;
        });

        $order->load(['address', 'orderDetails.product', 'orderDetails.color', 'orderDetails.guaranty']);

        $data = ['order' => new OrderApiResource($order)];

        if ($order->payment_type === PaymentType::Internet->value) {
            $data['payment_url'] = $this->initiatePayment($order);
        }

        return response()->json([
            'result' => true,
            'message' => 'order created',
            'data' => $data,
        ], 201);
    }

    /**
     * Initiate an online payment for a draft order.
     */
    public function pay(Request $request, Order $order): JsonResponse
    {
        $this->ensureOwnership($request, $order);

        if ($order->payment_type !== PaymentType::Internet->value) {
            return response()->json([
                'result' => false,
                'message' => 'این سفارش پرداخت آنلاین ندارد',
                'data' => [],
            ], 422);
        }

        if ($order->status !== OrderStatus::Draft->value) {
            return response()->json([
                'result' => false,
                'message' => 'وضعیت این سفارش اجازه پرداخت مجدد را نمی‌دهد',
                'data' => [],
            ], 422);
        }

        $order->load(['address', 'orderDetails.product', 'orderDetails.color', 'orderDetails.guaranty']);

        return response()->json([
            'result' => true,
            'message' => 'payment link created',
            'data' => [
                'order' => new OrderApiResource($order),
                'payment_url' => $this->initiatePayment($order),
            ],
        ]);
    }

    private function initiatePayment(Order $order): ?string
    {
        $payable = (int) round($order->total_price - $order->total_discount);

        $result = Payment::purchase(
            (new Invoice)->amount($payable),
            function ($driver, $transactionId) use ($order) {
                $order->update(['transaction_id' => $transactionId]);
            }
        )->pay()->toJson();

        $payment = json_decode($result);

        return is_object($payment) ? ($payment->action ?? null) : null;
    }

    private function ensureOwnership(Request $request, Order $order): void
    {
        abort_if($order->user_id !== $request->user()->id, 404);
    }
}
