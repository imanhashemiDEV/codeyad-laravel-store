<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequests\StoreCartApiRequest;
use App\Http\Requests\ApiRequests\UpdateCartApiRequest;
use App\Http\Resources\CartApiResource;
use App\Models\Cart;
use App\Models\ProductPrice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    /**
     * Display the authenticated user's cart.
     */
    public function index(Request $request): JsonResponse
    {
        $carts = Cart::query()
            ->with(['product.productPrices', 'color', 'guaranty'])
            ->where('user_id', $request->user()->id)
            ->get();

        $totalPrice = 0;
        $totalDiscount = 0;

        foreach ($carts as $cart) {
            $productPrice = $this->productPrice($cart);

            if ($productPrice) {
                $totalPrice += $productPrice->price * $cart->count;
                $totalDiscount += (($productPrice->price * $productPrice->discount) / 100) * $cart->count;
            }
        }

        return response()->json([
            'result' => true,
            'message' => 'cart items',
            'data' => [
                'items' => CartApiResource::collection($carts),
                'count' => $carts->count(),
                'total_price' => $totalPrice,
                'total_discount' => $totalDiscount,
                'payable_price' => $totalPrice - $totalDiscount,
            ],
        ]);
    }

    /**
     * Add a product to the authenticated user's cart.
     */
    public function store(StoreCartApiRequest $request): JsonResponse
    {
        $productPrice = ProductPrice::query()
            ->where('product_id', $request->input('product_id'))
            ->where('color_id', $request->input('color_id'))
            ->where('guaranty_id', $request->input('guaranty_id'))
            ->first();

        if (! $productPrice) {
            return response()->json([
                'result' => false,
                'message' => 'این ترکیب رنگ و گارانتی برای محصول موجود نیست',
                'data' => [],
            ], 422);
        }

        $cart = Cart::query()
            ->where('user_id', $request->user()->id)
            ->where('product_id', $request->input('product_id'))
            ->where('color_id', $request->input('color_id'))
            ->where('guaranty_id', $request->input('guaranty_id'))
            ->first();

        if ($cart) {
            $cart->update(['count' => $cart->count + (int) $request->input('count')]);
        } else {
            $cart = Cart::query()->create([
                'user_id' => $request->user()->id,
                'product_id' => $request->input('product_id'),
                'color_id' => $request->input('color_id'),
                'guaranty_id' => $request->input('guaranty_id'),
                'count' => $request->input('count'),
            ]);
        }

        $cart->load(['product.productPrices', 'color', 'guaranty']);

        return response()->json([
            'result' => true,
            'message' => 'product added to cart',
            'data' => new CartApiResource($cart),
        ], 201);
    }

    /**
     * Update the quantity of a cart item.
     */
    public function update(UpdateCartApiRequest $request, Cart $cart): JsonResponse
    {
        $this->ensureOwnership($request, $cart);

        $cart->update(['count' => $request->input('count')]);
        $cart->load(['product.productPrices', 'color', 'guaranty']);

        return response()->json([
            'result' => true,
            'message' => 'cart item updated',
            'data' => new CartApiResource($cart),
        ]);
    }

    /**
     * Remove an item from the cart.
     */
    public function destroy(Request $request, Cart $cart): JsonResponse
    {
        $this->ensureOwnership($request, $cart);

        $cart->delete();

        return response()->json([
            'result' => true,
            'message' => 'cart item deleted',
            'data' => [],
        ]);
    }

    /**
     * Remove all items from the cart.
     */
    public function clear(Request $request): JsonResponse
    {
        Cart::query()->where('user_id', $request->user()->id)->delete();

        return response()->json([
            'result' => true,
            'message' => 'cart cleared',
            'data' => [],
        ]);
    }

    private function ensureOwnership(Request $request, Cart $cart): void
    {
        abort_if($cart->user_id !== $request->user()->id, 404);
    }

    private function productPrice(Cart $cart): ?ProductPrice
    {
        return $cart->product?->productPrices
            ?->where('color_id', $cart->color_id)
            ->where('guaranty_id', $cart->guaranty_id)
            ->first();
    }
}
