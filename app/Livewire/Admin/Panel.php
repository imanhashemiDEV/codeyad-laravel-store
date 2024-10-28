<?php

namespace App\Livewire\Admin;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Panel extends Component
{
    #[Layout('admin.master'),Title('پنل مدیریت')]
    public function render():View
    {
        return view('livewire.admin.panel');
    }
}
