<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{

    use WithPagination;
    #[Validate('required')]
    public $name;
    #[Validate('nullable|mimes:jpeg,jpg,png')]
    public $image;
    public $parent_id;

    public $editIndex;

    public function createRow(): void
    {
        $this->validate();
        Category::query()->create([
            'name' => $this->name,
            'slug' => "",
            'image' => "",
            'parent_id' => $this->parent_id,
        ]);

        session()->flash('success', 'دسته بندی ایجاد شد');
        $this->reset();

    }

    public function editRow($id)
    {
        $this->editIndex = $id;
        $category = Category::query()->findOrFail($id);
        $this->name = $category->name;
        $this->image = $category->image;
        $this->parent_id = $category->parent_id;
    }

    public function updateRow()
    {
        $this->validate();
        $category = Category::query()->findOrFail($this->editIndex);
        $category->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'password' => $this->password ? Hash::make($this->password) : $category->password,
        ]);

        session()->flash('success', 'دسته بندی ویرایش شد');
        $this->reset();
    }

    #[Computed()]
    public function categories():Paginator
    {
        return Category::query()->paginate(10);
    }

    #[Layout('admin.master'),Title('لیست دسته بندی ها')]
    public function render():View
    {
        return view('livewire.admin.categories.category-list');
    }
}
