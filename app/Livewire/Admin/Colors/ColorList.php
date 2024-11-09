<?php

namespace App\Livewire\Admin\Colors;

use App\Models\Color;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ColorList extends Component
{
    use WithPagination;
    #[Validate('required|unique:colors,name')]
    public $name;
    #[Validate('required|unique:colors,code')]
    public $code;
    public $search;
    public $editIndex;

    public function createRow(): void
    {
        $this->validate();

        Color::query()->create([
            'name' => $this->name,
            'code' => $this->code,
        ]);

        session()->flash('success', 'رنگ ایجاد شد');
        $this->reset();

    }

    public function editRow($id): void
    {
        $this->editIndex = $id;
        $color = Color::query()->findOrFail($id);
        $this->name = $color->name;
        $this->code = $color->code;
    }

    public function updateRow(): void
    {

        $this->validate();
        $color = Color::query()->findOrFail($this->editIndex);
        $color->update([
            'name' => $this->name,
            'code' => $this->code,
        ]);

        session()->flash('success', 'رنگ ویرایش شد');
        $this->reset();
    }

    #[Computed()]
    public function colors():Paginator
    {
        return Color::query()->paginate(10);
    }

    #[On('destroy-color')]
    public function destroyRow($color_id): void
    {
        Color::destroy($color_id);
    }

    public function searchData(): void
    {
        $this->colors = Color::query()
            ->where('name', 'like', '%'.$this->search.'%')
            ->paginate(10);
    }

    #[Layout('admin.master'),Title('لیست رنگ ها')]
    public function render():View
    {
        return view('livewire.admin.colors.color-list');
    }
}
