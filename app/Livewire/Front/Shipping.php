<?php

namespace App\Livewire\Front;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Shipping extends Component
{
    #[Layout('frontend.master'),Title('صفحه آدرس و پرداخت')]
    public function render():View
    {
        return view('livewire.front.shipping');
    }
}
