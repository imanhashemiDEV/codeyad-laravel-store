<?php

namespace App\Livewire\Admin\Users;

use App\Models\Category;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
    public $search;
    public $editIndex;
    public $roles;
    public $selected_user;
    public $selected_roles=[];


    public function mount()
    {
        $this->roles = Role::query()
            ->pluck('name', 'id');
    }

    public function createRow(): void
    {
        $this->validate();
        User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'کاربر ایجاد شد');
        $this->reset();

    }

    public function editRow($id)
    {
        $this->editIndex = $id;
        $user = User::query()->findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
    }

    public function updateRow()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$this->editIndex,
            'mobile' => 'required|unique:users,mobile,'.$this->editIndex,
        ]);
       $user = User::query()->findOrFail($this->editIndex);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
        ]);

        session()->flash('success', 'کاربر ویرایش شد');
        $this->reset();
    }

    public function setSelectedUser($user_id): void
    {
        $this->selected_user = User::query()->findOrFail($user_id);
        $this->selected_roles =  $this->selected_user->roles()->pluck('name');
    }

    public function saveUserRoles(): void
    {
        $this->selected_user->syncRoles($this->selected_roles);
        session()->flash('success', ' نقشها به کاربر متصل شدند');
    }

    #[Computed()]
    public function users():Paginator
    {
        return User::query()
            ->with('roles')
            ->paginate(10);
    }

    public function searchData(): void
    {
        $this->users =User::query()
            ->where('name', 'like', '%'.$this->search.'%')
            ->paginate(10);
    }

    #[Layout('admin.master'),Title('لیست کاربران')]
    public function render():View
    {

        return view('livewire.admin.users.user-list');
    }
}
