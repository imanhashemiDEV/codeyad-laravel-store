<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;
    #[Validate('required')]
    public $name;
    #[Validate('nullable|unique:users,email')]
    public $email;
    #[Validate('nullable|unique:users,mobile')]
    public $mobile;
    #[Validate('required|min:6')]
    public $password;

    public function createUser()
    {
        $this->validate();
        User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'کاربر جدید ایجاد شد');
        $this->reset();

    }

    #[Computed()]
    public function users()
    {
        return User::query()->paginate(1);
    }

    #[Layout('admin.master')]
    public function render():View
    {
        return view('livewire.admin.users.user-list');
    }
}
