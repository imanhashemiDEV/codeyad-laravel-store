<?php

namespace App\Livewire\Admin\Users;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserList extends Component
{

    #[Layout('admin.master')]
    public function render():View
    {
        return view('livewire.admin.users.user-list');
    }
}
