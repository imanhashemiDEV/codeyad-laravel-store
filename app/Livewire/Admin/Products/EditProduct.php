<?php

namespace App\Livewire\Admin\Products;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $e_name;
    public $price;
    public $discount,$count,$max_sell;
    public $description;
    public $image;
    public $product_image;
    public $category_id,$brand_id;

    public $product;

    public function mount(Product $product): void
    {
        $this->product = $product;
        $this->name= $product->name;
        $this->e_name= $product->e_name;
        $this->price= $product->price;
        $this->discount= $product->discount;
        $this->count= $product->count;
        $this->max_sell= $product->max_sell;
        $this->description= $product->description;
        $this->product_image= $product->image;
        $this->category_id= $product->category_id;
        $this->brand_id= $product->brand_id;
        $this->dispatch('loadckeditor', ['description' => $this->description,
        ]);
    }

    public function updateRow(): void
    {
        if($this->image){
            $image = $this->image->hashName();
            $this->image->storeAs('images/products/', $image,'public');
        }

        $this->validate([
            'name'=>'required|unique:products,name,'. $this->product->id,
            'e_name' => 'required|unique:products,e_name,'. $this->product->id,
            'price'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'category_id'=>'required',
            'brand_id'=>'required'
        ]);


        Product::query()->find($this->product->id)->update([
            'name' => $this->name,
            'e_name' => $this->e_name,
            'slug' => make_slug($this->name),
            'price'=>$this->price,
            'discount'=>$this->discount,
            'count'=>$this->count,
            'max_sell'=>$this->max_sell,
            'image' => $this->image ? $image : $this->product->image,
            'description'=>$this->description,
            'category_id'=>$this->category_id,
            'brand_id'=>$this->brand_id
        ]);

        session()->flash('success', 'محصول ویرایش شد');
        $this->reset();
        $this->redirectRoute('admin.products.list');

    }


    #[Layout('admin.master'),Title('ویرایش محصول')]
    public function render():View
    {
        $categories = Category::query()
            ->where('parent_id','!=',null)
            ->pluck('name', 'id');
        $brands = Brand::query()->pluck('name', 'id');
        return view('livewire.admin.products.edit-product', compact('categories','brands'));
    }
}
