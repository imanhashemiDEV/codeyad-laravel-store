<?php

namespace App\Livewire\Admin\Products;

use App\Enums\ProductStatus;
use App\Models\ProductPrice;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProductPrice extends Component
{

    use WithFileUploads;
    #[Validate('required')]
    public $main_price;
    #[Validate('required')]
    public $price,$discount,$count,$max_sell;
    #[Validate('required')]
    public $color_id,$guaranty_id;

    public function createRow(): void
    {
        $this->validate();

        ProductPrice::query()->create([
            'main_price' => $this->name,
            'price'=>$this->price,
            'discount'=>$this->discount,
            'count'=>$this->count,
            'max_sell'=>$this->max_sell,
            'status'=>ProductStatus::Active->value,
            'product_id'=>$this->product->id,
            'color_id'=>$this->color_id,
            'guaranty_id'=>$this->guaranty_id,
        ]);

        $this->product->colors()->attach($this->color_id);
        $this->product->guaranties()->attach($this->guaranty_id);

        session()->flash('success', 'تنوع محصول ایجاد شد');
        $this->reset();
        $this->redirectRoute('admin.product.prices');

    }


    #[Layout('admin.master'),Title('ایجاد محصول')]
    public function render():View
    {
        return view('livewire.admin.products.create-product-price');
    }
}
