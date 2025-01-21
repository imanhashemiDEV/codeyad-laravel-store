<?php

namespace App\Livewire\Admin\Products;

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Guaranty;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{

    use WithFileUploads;
    #[Validate('required|unique:products,name')]
    public $name;
    #[Validate('required|unique:products,e_name')]
    public $e_name;
    #[Validate('required')]
    public $price;
    public $discount,$count,$max_sell;
    #[Validate('required')]
    public $description;
    #[Validate('required|mimes:jpeg,jpg,png')]
    public $image;
    #[Validate('required')]
    public $category_id,$brand_id;
    public $color_id, $guaranty_id;
    public function createRow(): void
    {
        $this->validate();
        if($this->image){
            $image = $this->image->hashName();
            $this->image->storeAs('images/products/', $image,'public');
        }

        Product::query()->create([
            'name' => $this->name,
            'e_name' => $this->e_name,
            'slug' => make_slug($this->name),
            'price'=>$this->price,
            'discount'=>$this->discount,
            'count'=>$this->count,
            'max_sell'=>$this->max_sell,
            'image' => $image,
            'description'=>$this->description,
            'status'=>ProductStatus::Active->value,
            'category_id'=>$this->category_id,
            'brand_id'=>$this->brand_id,
            'color_id'=>$this->color_id,
            'guaranty_id'=>$this->guaranty_id,
        ]);

        session()->flash('success', 'محصول ایجاد شد');
        $this->reset();
        $this->redirectRoute('admin.products.list');
    }


    #[Layout('admin.master'),Title('ایجاد محصول')]
    public function render():View
    {
        $categories = Category::query()
            ->where('parent_id','!=',null)
            ->pluck('name', 'id');
        $brands = Brand::query()->pluck('name', 'id');
        $colors=Color::query()->pluck('name','id');
        $guaranties=Guaranty::query()->pluck('name','id');
        return view('livewire.admin.products.create-product',compact('categories','brands','colors','guaranties'));
    }
}
