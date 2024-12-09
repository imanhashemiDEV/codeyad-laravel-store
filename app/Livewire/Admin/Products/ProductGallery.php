<?php

namespace App\Livewire\Admin\Products;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductGallery extends Component
{
    use WithFileUploads, LivewireAlert;

    public Product $product;
    #[Validate(['images.*' => 'image|max:1024'])]
    public $images =[];

    public function createRow(){
        if($this->images){
            foreach ($this->images as $image) {
                $name = $image->hashName();
                $image->storeAs('images/products/', $name,'public');
                Gallery::query()->create([
                    'name'=> $name,
                    'product_id'=>$this->product->id,
                ]);
            }
        }

        $this->alert('success', 'برای این محصول گالری ثبت شد ');
    }

    #[Computed]
    public function gallerire(): \Illuminate\Database\Eloquent\Collection
    {
        return Gallery::query()->where('product_id',$this->product->id)->get();
    }

    public function removeImage($gallery_id)
    {
        Gallery::destroy($gallery_id);
        $this->alert('success', 'عکس از گالری حذف شد ');
    }

    #[Layout('admin.master'),Title('گالری محصول')]
    public function render():View
    {
        return view('livewire.admin.products.product-gallery');
    }
}
