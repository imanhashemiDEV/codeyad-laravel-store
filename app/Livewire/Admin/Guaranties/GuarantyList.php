<?php

namespace App\Livewire\Admin\Guaranties;

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

class GuarantyList extends Component
{
    use WithPagination;
    #[Validate('required|unique:guaranties,name')]
    public $name;
    public $search;
    public $editIndex;

    public function createRow(): void
    {
        $this->validate();

        Guaranty::query()->create([
            'name' => $this->name,
        ]);

        session()->flash('success', 'گارانتی ایجاد شد');
        $this->reset();

    }

    public function editRow(int $id): void
    {
        $this->resetValidation();
        $this->editIndex = $id;
        $guaranty = Guaranty::query()->findOrFail($id);
        $this->name = $guaranty->name;
    }

    public function updateRow(): void
    {

        $this->validate();
        $guaranty = Guaranty::query()->findOrFail($this->editIndex);
        $guaranty->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'گارانتی ویرایش شد');
        $this->reset();
    }

    #[Computed()]
    public function guaranties(): Paginator
    {
        return Guaranty::query()->paginate(10);
    }

    #[On('destroy-guaranty')]
    public function destroyRow($guaranty_id): void
    {
        Guaranty::destroy($guaranty_id);
    }

    public function searchData(): void
    {
        $this->guaranties = Guaranty::query()
            ->where('name', 'like', '%'.$this->search.'%')
            ->paginate(10);
    }

    #[Layout('admin.master'),Title('لیست گارانتی ها')]
    public function render():View
    {
        return view('livewire.admin.guaranties.guaranty-list');
    }
}
