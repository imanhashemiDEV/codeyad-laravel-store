<?php

namespace App\Livewire\Admin;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Panel extends Component
{
    #[Layout('admin.master')]
    public function render():View
    {
        return view('livewire.admin.panel');
    }
}
