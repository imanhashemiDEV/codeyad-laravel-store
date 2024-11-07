<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
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

class BrandList extends Component
{
    use WithPagination , WithFileUploads;
    #[Validate('required|unique:brands,name')]
    public $name;
    #[Validate('nullable|mimes:jpeg,jpg,png')]
    public $image;
    public $search;
    public $editIndex;

    public function createRow(): void
    {
        $this->validate();

        if($this->image){
            $image = $this->image->hashName();
            $this->image->storeAs('images/brands/', $image,'public');
        }


        Brand::query()->create([
            'name' => $this->name,
            'slug' => make_slug($this->name),
            'image' => $this->image ? $image : null,
        ]);

        session()->flash('success', 'برند ایجاد شد');
        $this->reset();

    }

    public function editRow($id): void
    {
        $this->editIndex = $id;
        $brand = Brand::query()->findOrFail($id);
        $this->name = $brand->name;
    }

    public function updateRow(): void
    {
        if($this->image){
            $image = $this->image->hashName();
            $this->image->storeAs('images/brands/', $image,'public');
        }

        $this->validate();
        $brand = Brand::query()->findOrFail($this->editIndex);
        $brand->update([
            'name' => $this->name,
            'slug' => make_slug($this->name),
            'image' => $this->image ? $image : $brand->image,
        ]);

        session()->flash('success', 'برند ویرایش شد');
        $this->reset();
    }

    #[Computed()]
    public function brands():Paginator
    {
        return Brand::query()->paginate(10);
    }

    #[On('destroy-brand')]
    public function destroyRow($brand_id): void
    {
        Brand::destroy($brand_id);
    }

    public function searchData(): void
    {
        $this->brands = Brand::query()
            ->where('name', 'like', '%'.$this->search.'%')
            ->paginate(10);
    }

    #[Layout('admin.master'),Title('لیست برند ها')]
    public function render():View
    {
        return view('livewire.admin.brands.brand-list');
    }
}
