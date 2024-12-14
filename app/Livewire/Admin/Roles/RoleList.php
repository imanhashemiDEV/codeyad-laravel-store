<?php

namespace App\Livewire\Admin\Roles;

use App\Models\Guaranty;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{

    use WithPagination;
    #[Validate('required|unique:guaranties,name')]
    public $name;
    public $search;
    public $editIndex;

    public function createRow(): void
    {
        $this->validate();

        Role::query()->create([
            'name' => $this->name,
        ]);

        session()->flash('success', 'نقش ایجاد شد');
        $this->reset();

    }

    public function editRow($id): void
    {
        $this->editIndex = $id;
        $role = Role::query()->findOrFail($id);
        $this->name = $role->name;
    }

    public function updateRow(): void
    {

        $this->validate();
        $role = Role::query()->findOrFail($this->editIndex);
        $role->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'نقش ویرایش شد');
        $this->reset();
    }

    #[Computed()]
    public function roles():Paginator
    {
        return Role::query()->paginate(10);
    }

    #[On('destroy-role')]
    public function destroyRow($role_id): void
    {
        Role::destroy($role_id);
    }

    public function searchData(): void
    {
        $this->roles = Role::query()
            ->where('name', 'like', '%'.$this->search.'%')
            ->paginate(10);
    }

    #[Layout('admin.master'),Title('لیست نقش ها')]
    public function render():View
    {
        return view('livewire.admin.roles.role-list');
    }
}
