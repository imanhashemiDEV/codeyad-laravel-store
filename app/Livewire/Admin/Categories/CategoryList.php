<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CategoryList extends Component
{

    use WithPagination , WithFileUploads;
    #[Validate('required')]
    public $name;
    #[Validate('nullable|mimes:jpeg,jpg,png')]
    public $image;
    public $parent_id;

    public $editIndex;

    public function createRow(): void
    {
        $this->validate();

        if($this->image){
            $image = $this->image->hashName();
            $this->image->storeAs('images/categories/', $image,'public');
        }


        Category::query()->create([
            'name' => $this->name,
            'slug' => make_slug($this->name),
            'image' => $this->image ? $image : null,
            'parent_id' => $this->parent_id,
        ]);

        session()->flash('success', 'دسته بندی ایجاد شد');
        $this->reset();

    }

    public function editRow($id): void
    {
        $this->editIndex = $id;
        $category = Category::query()->findOrFail($id);
        $this->name = $category->name;
        $this->parent_id = $category->parent_id;
    }

    public function updateRow(): void
    {
        if($this->image){
            $image = $this->image->hashName();
            $this->image->storeAs('images/categories/', $image,'public');
        }

        $this->validate();
        $category = Category::query()->findOrFail($this->editIndex);
        $category->update([
            'name' => $this->name,
            'slug' => make_slug($this->name),
            'image' => $this->image ? $image : $category->image,
            'parent_id' =>  $this->parent_id,
        ]);

        session()->flash('success', 'دسته بندی ویرایش شد');
        $this->reset();
    }

    #[Computed()]
    public function categories():Paginator
    {
        return Category::query()->with('parentCategory')->paginate(10);
    }

    #[On('destroy-category')]
    public function destroyRow($category_id): void
    {
        Category::destroy($category_id);
    }

    #[Layout('admin.master'),Title('لیست دسته بندی ها')]
    public function render():View
    {
//        $categories = Category::query()->pluck('name', 'id');
        $categories = Category::getCategories();
        return view('livewire.admin.categories.category-list', compact('categories'));
    }
}
