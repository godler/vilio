<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class ProductSelector extends Component
{
    public ?string $search = null;

    public function render()
    {
        return view('livewire.components.product-selector', [
            'products' => Product::when($this->search, function($query) {
                $query->search($this->search);
            })->take(10)->get()
        ]);
    }
}
