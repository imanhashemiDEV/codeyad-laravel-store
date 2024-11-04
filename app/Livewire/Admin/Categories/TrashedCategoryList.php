<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
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

class TrashedCategoryList extends Component
{
    use WithPagination;


    #[Computed()]
    public function categories():Paginator
    {
        return Category::query()
            ->with('parentCategory')
            ->onlyTrashed()
            ->paginate(10);
    }

    #[On('hard-destroy-category')]
    public function hardDestroyRow($category_id): void
    {
        Category::query()->withTrashed()->findOrFail($category_id)->forceDelete();
    }

    public function restoreRow($category_id)
    {
        Category::query()->withTrashed()->findOrFail($category_id)->restore();
    }


    #[Layout('admin.master'),Title('لیست دسته بندی های حذف شده')]
    public function render():View
    {
        return view('livewire.admin.categories.trashed-category-list');
    }
}
