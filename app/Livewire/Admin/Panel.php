<?php

namespace App\Livewire\Admin;

use App\Enums\OrderDetailStatus;
use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Panel extends Component
{
    public $users_count=0;
    public $in_progress_count=0;
    public $send_count=0;
    public $rejected_count=0;
    public function mount(): void
    {
      $this->users_count = User::query()->count();

      $orders = Order::query()->where('status',OrderStatus::Successful->value)->get();

      foreach ($orders as $order) {
          $order_details = OrderDetail::query()->where('order_id',$order->id)->get();
          foreach ($order_details as $order_detail) {
              if($order_detail->status==OrderDetailStatus::InProgress->value){
                  $this->in_progress_count++;
              }elseif($order_detail->status==OrderDetailStatus::Send->value){
                  $this->send_count++;
              }elseif($order_detail->status==OrderDetailStatus::Rejected->value){
                  $this->rejected_count++;
              }
          }
      }


    }
    #[Layout('admin.master'),Title('پنل مدیریت')]
    public function render():View
    {
        return view('livewire.admin.panel');
    }
}
