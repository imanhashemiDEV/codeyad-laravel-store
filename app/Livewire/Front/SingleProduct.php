<?php

namespace App\Livewire\Front;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SingleProduct extends Component
{
    public Product $product;

    #[Layout('frontend.master'),Title('صفحه جزئیات محصول')]
    public function render():View
    {
        return view('livewire.front.single-product');
    }
}
