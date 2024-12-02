<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\CategoryAttribute;
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

class CategoryAttributes extends Component
{

    use WithPagination , WithFileUploads;
    #[Validate('required')]
    public $name;
    public $editIndex;
    public Category $category;


    public function createRow(): void
    {
        $this->validate();

        CategoryAttribute::query()->create([
            'name' => $this->name,
            'category_id' => $this->category->id,
        ]);

        session()->flash('success', 'ویژگی دسته بندی ایجاد شد');
        $this->reset();

    }

    public function editRow($id): void
    {
        $this->editIndex = $id;
        $category_attribute = CategoryAttribute::query()->findOrFail($id);
        $this->name = $category_attribute->name;
    }

    public function updateRow(): void
    {

        $this->validate();
        $category_attribute = CategoryAttribute::query()->findOrFail($this->editIndex);
        $category_attribute->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'ویژگی دسته بندی ویرایش شد');
        $this->reset();
    }

    #[Computed()]
    public function categoryAttributes():Paginator
    {
        return CategoryAttribute::query()->paginate(10);
    }

    #[On('destroy-category-attribute')]
    public function destroyRow($category_attribute_id): void
    {
        CategoryAttribute::destroy($category_attribute_id);
    }


    #[Layout('admin.master'),Title('لیست دسته بندی ها')]
    public function render():View
    {
        return view('livewire.admin.categories.category-attributes');
    }
}
