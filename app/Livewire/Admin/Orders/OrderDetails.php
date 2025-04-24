<?php

namespace App\Livewire\Admin\Orders;

use App\Enums\OrderDetailStatus;
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

    public function changeStatus($status,$id): void
    {
        $order_detail = OrderDetail::find($id);
      if($status=== OrderDetailStatus::InProgress->value){
          $order_detail->update([
              'status' => OrderDetailStatus::Send->value,
          ]);
      }elseif($status=== OrderDetailStatus::Send->value){
          $order_detail->update([
              'status' => OrderDetailStatus::Received->value,
          ]);
      }elseif($status=== OrderDetailStatus::Received->value){
          $order_detail->update([
              'status' => OrderDetailStatus::Rejected->value,
          ]);
      }elseif($status=== OrderDetailStatus::Rejected->value){
          $order_detail->update([
              'status' => OrderDetailStatus::InProgress->value,
          ]);
      }
    }

    #[Layout('admin.master'),Title('جزئیات لیست سفارشات')]
    public function render():View
    {
        $order_details = OrderDetail::query()
            ->with(['product','color','guaranty'])
            ->where('order_id', $this->order_id)
            ->paginate(5);
        return view('livewire.admin.orders.order-details', compact('order_details'));
    }
}
