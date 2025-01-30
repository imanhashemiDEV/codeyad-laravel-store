<?php

namespace App\Livewire\Front;

use App\Enums\OrderStatus;
use App\Models\Order;
use Livewire\Attributes\Url;
use Livewire\Component;

class Payment extends Component
{
    #[Url]
    public $Authority;
    #[Url]
    public $Status;
    public $total_price,$total_discount;
    public $order;
    public function mount()
    {
        $order = Order::query()->where('transaction_id', $this->Authority)->first();
        if($this->Status === 'OK'){

            $order->update([
                'status'=>OrderStatus::Successful->value
            ]);

        }else{
            $order->update([
                'status'=>OrderStatus::Canceled->value
            ]);
        }
    }
    public function render()
    {
        return view('livewire.front.payment');
    }
}
