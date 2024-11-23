<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPrices extends Component
{
    use WithPagination;

    public $product;

    public function mount(Product $product): void
    {
        $this->product = $product;
    }

    #[Computed()]
    public function productPrices():Paginator
    {
        return ProductPrice::query()
            ->where('product_id',$this->product->id)
            ->paginate(10);
    }

    #[On('destroy-product-price')]
    public function destroyRow($product_price_id): void
    {
        ProductPrice::destroy($product_price_id);
    }


    #[Layout('admin.master'),Title('لیست تنوع محصول')]
    public function render():View
    {
        return view('livewire.admin.products.product-prices');
    }
}
