<?php

namespace App\Livewire\Front;

use App\Models\Address;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Province;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Shipping extends Component
{

    public $provinces,$cities;
    public $province_id,$city_id,$name,$mobile,$address;
    public $selected_address,$payment_type;
    public $total_price = 0;
    public $total_discount = 0;

    public $carts;
    public function mount(): void
    {
        $this->provinces = Province::query()->pluck('name','id');
        $this->cities = collect();

        $this->carts = \App\Models\Cart::query()
            ->with(['product','product.productPrices','color','guaranty'])
            ->where('user_id', auth()->user()->id)
            ->get();

        foreach ($this->carts as $cart){
            $price = $cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first()->price;
            $this->total_price += $price * $cart->count;
            $discount = $cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first()->discount;
            $this->total_discount +=  (($price * $discount)/100) * $cart->count ;
        }
    }

    public function changeProvince($province_id): void
    {
        $this->cities = City::query()->where('province_id', $province_id)->pluck('name','id');
    }

    public function createAddress()
    {
        $this->validate([
            'province_id'=>'required',
            'city_id'=>'required',
            'address'=>'required',
        ]);
        Address::query()->create([
            'user_id'=>auth()->user()->id,
            'province_id'=>$this->province_id,
            'city_id'=>$this->city_id,
            'name'=>$this->name ?? auth()->user()->name,
            'mobile'=>$this->mobile ?? auth()->user()->mobile,
            'address'=>$this->address
        ]);

        $this->dispatch('close-modal');
    }

    public function payment(): void
    {
        $this->validate([
            'selected_address'=>'required',
            'payment_type'=>'required',
        ]);
        DB::beginTransaction();
        try {
            $order = Order::query()->create([
                'user_id'=> auth()->user()->id,
                'address_id'=>$this->selected_address,
                'order_code'=> generateRandomInteger(6),
                'total_price'=>$this->total_price,
                'total_discount'=>$this->total_discount,
                'payment_type'=>$this->payment_type
            ]);

            $carts = \App\Models\Cart::query()
                ->where('user_id', auth()->user()->id)
                ->get();

            foreach ($carts as $cart){
                OrderDetail::query()->create([
                    'order_id'=>$order->id,
                    'product_id'=>$cart->product_id,
                    'guaranty_id'=>$cart->guaranty_id,
                    'color_id'=>$cart->color_id,
                    'main_price'=>$cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first()->main_price,
                    'price'=>$cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first()->price,
                    'discount'=>$cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first()->discount,
                    'count'=>$cart->count,
                ]);
            }
            DB::commit();

            // send to zarinpal

        }catch (\Exeption $exeption){
            Log::error($exeption->getMessage());
            DB::rollBack();
        }


    }

    #[Layout('frontend.master'),Title('صفحه آدرس و پرداخت')]
    public function render():View
    {
        $addresses = Address::query()->where('user_id',auth()->user()->id)->get();


        return view('livewire.front.shipping', compact('addresses'));
    }
}
