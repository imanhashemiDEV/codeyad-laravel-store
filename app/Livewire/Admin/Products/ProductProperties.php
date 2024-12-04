<?php

namespace App\Livewire\Admin\Products;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProductProperties extends Component
{

    #[Layout('admin.master'),Title('ویژگی های محصول')]
    public function render():View
    {
        return view('livewire.admin.products.product-properties');
    }
}
