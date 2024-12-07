<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use App\Models\ProductProperty;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProductProperties extends Component
{
    use LivewireAlert;
    public Product $product;
    public $name;
    public $category_attribute_id;
    public $editIndex;
    public function createRow()
    {
        ProductProperty::query()->create([
            'name'=>$this->name,
            'product_id'=>$this->product->id,
            'category_attribute_id'=>$this->category_attribute_id
        ]);
        $this->alert('success', 'برای این محصول یک ویژگی ثبت شده است');
    }

    #[On('destroy-property')]
    public function destroyProductProperty($property_id)
    {
        ProductProperty::destroy($property_id);
    }

    #[Computed]
    public function productProperties()
    {
        return ProductProperty::query()
            ->with('categoryAttribute')
            ->groupBy('category_attribute_id')
            ->where('product_id',$this->product->id)
            ->get();
    }

    #[Layout('admin.master'),Title('ویژگی های محصول')]
    public function render():View
    {
        return view('livewire.admin.products.product-properties');
    }
}
