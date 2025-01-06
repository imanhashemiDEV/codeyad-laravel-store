<?php

namespace App\Livewire\Front;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Header extends Component
{

    #[Computed(persist: true)]
    public function categories(): \Illuminate\Database\Eloquent\Collection
    {
        return Category::query()
            ->with('childCategory')
            ->where('parent_id',null)->get();
    }

    public function render():View
    {
        return view('livewire.front.header');
    }
}
