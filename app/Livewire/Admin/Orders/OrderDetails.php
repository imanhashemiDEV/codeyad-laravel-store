<?php

namespace App\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class OrderDetails extends Component
{
    public $order_id;
    public function mount($order_id): void
    {
        $this->order_id =  $order_id;
    }

    #[Layout('admin.master'),Title('جزئیات لیست سفارشات')]
    public function render():View
    {
        $order_details = OrderDetail::query()->where('order_id', $this->order_id)->paginate(5);
        return view('livewire.admin.orders.order-details', compact('order_details'));
    }
}
