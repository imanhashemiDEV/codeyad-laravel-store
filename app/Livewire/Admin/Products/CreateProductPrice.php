<?php

namespace App\Livewire\Admin\Products;

use App\Enums\ProductStatus;
use App\Models\Color;
use App\Models\Guaranty;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
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
    public $discount,$count,$max_sell;
    #[Validate('required')]
    public $color_id,$guaranty_id;
    public $price;
    public $colors;
    public $guaranties;
    public $product;
    public function mount(Product $product): void
    {
        $this->product = $product;
        $this->colors=Color::query()->pluck('name','id');
        $this->guaranties=Guaranty::query()->pluck('name','id');
    }
    public function createRow(): void
    {
        $this->validate();

        ProductPrice::query()->create([
            'main_price' => $this->main_price,
            'price'=> ($this->main_price)-(($this->main_price * $this->discount)/100),
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
        $this->redirectRoute('admin.product.prices',$this->product->id);

    }


    #[Layout('admin.master'),Title('ایجاد محصول')]
    public function render():View
    {
        return view('livewire.admin.products.create-product-price');
    }
}
