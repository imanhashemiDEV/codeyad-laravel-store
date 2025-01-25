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
        return view('livewire.front.cart');
    }
}
