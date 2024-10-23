<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserList extends Component
{


    #[Computed()]
    public function users()
    {
        return User::query()->paginate(10);
    }

    #[Layout('admin.master')]
    public function render():View
    {
        return view('livewire.admin.users.user-list');
    }
}
