<?php

namespace App\Livewire\Catalog\Products;

use App\Models\Unit;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On; 
use Livewire\WithFileUploads;
use App\Models\ProductCategory;
use App\Livewire\Catalog\Products\Index;
use App\Livewire\Forms\Catalog\CreateProduct;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Form extends Component
{
    use WithFileUploads;
    
    public CreateProduct $form;

    public $categories;

    public $units;

    public function mount() {
        $this->categories = ProductCategory::all();

        $this->units = Unit::all();
    }

    #[On('submit-contact-form')]
    public function submit() {
       $this->form->validate();

       if ($this->form->product) {
            $this->form->updateProduct();
       } else {
            $this->form->createProduct();
       }

        if($this->form->files) {
            $this->form->uploadFiles();
        }
        $this->redirect(Index::class);
    }

    #[On('edit-product')] 
    public function setActiveProduct($id) {
            $this->form->setProduct(Product::find($id));
            $this->resetErrorBag();
    }

    #[On('clear-product')] 
    public function clearActiveProduct() {
            $this->form->clearProduct();
            $this->resetErrorBag();
    }

    public function placeholder() {
        return '';
    }
    
    public function removeAttachment($id)
    {
        Media::find($id)->delete();
        $this->form->product->refresh();
    }
    
    public function render()
    {
        return view('livewire.catalog.products.form');
    }
}
