<?php

namespace App\Livewire\Front;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class HomePage extends Component
{



    #[Layout('frontend.master'),Title('صفحه اصلی')]
    public function render():View
    {
        return view('livewire.front.home-page');
    }
}
