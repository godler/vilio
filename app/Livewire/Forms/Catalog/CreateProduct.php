<?php

namespace App\Livewire\Forms\Catalog;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateProduct extends Form
{
    public $product;

    #[Rule(['required','min:5'], null, null, 'Nazwa jest wymagana')]
    public $name = '';

    #[Rule('nullable|string')]
    public $index;
 
    #[Rule('required|min:5')]
    public $description = '';

    #[Rule(['nullable', 'numeric'])]
    public $base_price = '';
    
    #[Rule(['required', 'numeric'])]
    public $category_id;

    public $unit_id;

    public $attachments;

    // TODO: add validation
    public $files = [];


    public function setProduct(Product $product)
    {
        $this->product = $product;
 
        $this->name = $product->name;

        $this->index = $product->index;
 
        $this->description = $product->description;

        $this->base_price = $product->base_price;

        $this->category_id = $product->category_id;

        $this->unit_id = $product->unit_id;

        $this->attachments = $product->attachments;
    }

    public function clearProduct() {
        $this->reset(); 
    }

    public function updateProduct() {
        $this->product->update($this->all());
    }

    public function createProduct() {
        $this->product = Product::create($this->all());
    }

    public function uploadFiles() {
        foreach ($this->files as $file) {
            $this->product->addMedia($file->getRealPath())->toMediaCollection('attachments');
        }
    }

}
