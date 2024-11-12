<?php

namespace App\Livewire\Admin\Products;

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

class ProductList extends Component
{
    use WithPagination;


    public $search;


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

    public function searchData(): void
    {
        $this->categories = Category::query()
            ->where('name', 'like', '%'.$this->search.'%')
            ->with('parentCategory')->paginate(10);
    }

    #[Layout('admin.master'),Title('لیست محصولات')]
    public function render():View
    {
        return view('livewire.admin.products.product-list');
    }
}
