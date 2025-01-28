<?php

namespace App\Livewire\Front;

use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Shipping extends Component
{

    public $provinces,$cities;
    public $province_id,$city_id,$name,$mobile,$address;

    public function mount(): void
    {
        $this->provinces = Province::query()->pluck('name','id');
        $this->cities = collect();
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

    #[Layout('frontend.master'),Title('صفحه آدرس و پرداخت')]
    public function render():View
    {
        $addresses = Address::query()->where('user_id',auth()->user()->id)->get();
        $total_price = 0;
        $total_discount = 0;
        $carts = \App\Models\Cart::query()
            ->with(['product','product.productPrices','color','guaranty'])
            ->where('user_id', auth()->user()->id)
            ->get();

        foreach ($carts as $cart){
            $price = $cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first()->price;
            $total_price += $price * $cart->count;
            $discount = $cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first()->discount;
            $total_discount +=  (($price * $discount)/100) * $cart->count ;
        }
        return view('livewire.front.shipping', compact('addresses','carts','total_discount','total_price'));
    }
}
