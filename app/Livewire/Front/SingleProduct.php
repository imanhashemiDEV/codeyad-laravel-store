<?php

namespace App\Livewire\Front;

use App\Jobs\DeletePendingCartJob;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SingleProduct extends Component
{
    public Product $product;

    public $selected_color;
    public $selected_guaranty;

    public $discount;
    public $price;
    public $count=1;
    public $max_sell=1;
    public $product_prices;
    public function mount(): void
    {
        $this->selected_color = $this->product->color_id;
        $this->selected_guaranty = $this->product->guaranty_id;
        $this->discount = $this->product->discount;
        $this->price = $this->product->price;
        $this->max_sell = $this->product->max_sell;
    }

    public function increaseProductCount(): void
    {
        if($this->count < $this->max_sell){
            $this->count++;
        }
    }

    public function decreaseProductCount(): void
    {
        if($this->count > 1){
           $this->count--;
        }
    }

    public function getProductByColor($color_id): void
    {
        $this->selected_color = $color_id;
       $new_product = ProductPrice::query()
            ->where('color_id', $color_id)
            ->where('product_id',$this->product->id)
            ->first();
       $this->discount = $new_product->discount;
       $this->price = $new_product->price;
       $this->selected_guaranty = $new_product->guaranty_id;
       $this->max_sell = $new_product->max_sell;
    }

    public function addToCart(): void
    {
        if (auth()->user()){
            $cart = \App\Models\Cart::query()
                ->where('product_id',$this->product->id)
                ->where('user_id', auth()->user()->id)
                ->where('color_id', $this->selected_color)
                ->where('guaranty_id', $this->selected_guaranty)
                ->first();
            if($cart){
                $cart->update([
                    'count' => $cart->count + $this->count
                ]);
            }else{
                \App\Models\Cart::query()->create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$this->product->id,
                    'color_id'=>$this->selected_color,
                    'guaranty_id'=>$this->selected_guaranty,
                    'count'=>$this->count
                ]);
            }
             DeletePendingCartJob::dispatch($cart)->delay(now()->addDays(30));
            $this->redirectRoute('user.cart');
        }else{
            $this->redirectRoute('login');
        }
    }

    #[Layout('frontend.master'),Title('صفحه جزئیات محصول')]
    public function render():View
    {
        $this->product_prices = ProductPrice::query()->with('guaranty')
            ->where('color_id','!=', $this->selected_color)
            ->where('product_id',$this->product->id)
            ->get();
        return view('livewire.front.single-product');
    }
}
