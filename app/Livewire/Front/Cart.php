<?php

namespace App\Livewire\Front;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Cart extends Component
{
    #[Layout('frontend.master'),Title('سبد خرید')]
    public function render():View
    {
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

        return view('livewire.front.cart', compact('carts', 'total_discount','total_price'));
    }
}
