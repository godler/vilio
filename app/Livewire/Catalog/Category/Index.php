<?php

namespace App\Livewire\Catalog\Category;

use App\Models\ProductCategory;
use Livewire\Component;

class Index extends Component
{

    public function removeCategory($id) {
        ProductCategory::find($id)->delete();
    }
    
    public function render()
    {
        return view('livewire.catalog.category.index', [
            'categories' => ProductCategory::all()
        ]);
    }
}
