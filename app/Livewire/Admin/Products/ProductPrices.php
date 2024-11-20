<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPrices extends Component
{
    use WithPagination;

    public $search;

    #[Computed()]
    public function products():Paginator
    {
        return Product::query()
            ->with('category','brand')
            ->paginate(10);
    }

    #[On('destroy-product')]
    public function destroyRow($product_id): void
    {
        Product::destroy($product_id);
    }

    public function searchData(): void
    {
        $this->products = Product::query()
            ->where('name', 'like', '%'.$this->search.'%')
            ->with('category','brand')
            ->paginate(10);
    }

    #[Layout('admin.master'),Title('لیست محصولات')]
    public function render()
    {
        return view('livewire.admin.products.product-prices');
    }
}
