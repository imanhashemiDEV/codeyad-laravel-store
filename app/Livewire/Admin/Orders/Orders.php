<?php

namespace App\Livewire\Admin\Orders;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Orders extends Component
{

    #[Computed()]
    public function orders():\Illuminate\Contracts\Pagination\Paginator
    {
        return Order::query()
            ->with('user')
            ->where('status',OrderStatus::Successful->value)
            ->paginate(10);
    }

    #[Layout('admin.master'),Title('لیست سفارشات')]
    public function render():View
    {
        return view('livewire.admin.orders.orders');
    }
}
