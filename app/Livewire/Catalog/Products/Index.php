<?php

namespace App\Livewire\Catalog\Products;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Index extends Component
{
    #[Rule(['string'])]
    public $search_name;

    public $category_id;

    public $categories;

    public function removeProduct($id)
    {
        Product::find($id)->delete();
    }

    public function mount() {
        $this->categories = ProductCategory::all();
    }


    public function render()
    {
        return view('livewire.catalog.products.index', [
            'products' => Product::when($this->search_name, function($query) {
                return $query->where('name', 'like', '%'.$this->search_name.'%');
              })->when($this->category_id, function($query) {
                return $query->where('category_id', $this->category_id);
              })
        ->get()
        ]);
    }
}
