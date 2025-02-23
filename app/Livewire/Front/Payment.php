<?php

namespace App\Livewire\Front;

use App\Enums\OrderStatus;
use App\Jobs\DeleteCancelledOrderJob;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use function Sodium\increment;

class Payment extends Component
{
    #[Url]
    public $Authority;
    #[Url]
    public $Status;
    public $total_price,$total_discount;
    public $order;
    public function mount(): void
    {
        $this->order = Order::query()
            ->with('orderDetails')
            ->where('transaction_id', $this->Authority)->first();
        if($this->Status === 'OK'){

            $this->order->update([
                'status'=>OrderStatus::Successful->value
            ]);

            foreach ($this->order->orderDetails as $detail){
                 $product = $detail->product;
                $product_price =  $detail->product->productPrices->where('color_id',$detail->color_id)->where('guaranty_id',$detail->guaranty_id)->first();

                $product->increment('sold', $detail->count);
                $product_price->increment('sold', $detail->count);
            }

        }else{
            $this->order->update([
                'status'=>OrderStatus::Canceled->value
            ]);
            DeleteCancelledOrderJob::dispatch($this->order)->delay( now()->addDays(10));
        }
    }
    #[Layout('frontend.master'),Title('صفحه نتیجه پرداخت')]
    public function render():View
    {
        return view('livewire.front.payment');
    }
}
