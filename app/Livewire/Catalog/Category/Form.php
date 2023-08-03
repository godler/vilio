<?php

namespace App\Livewire\Catalog\Category;

use App\Livewire\Forms\Catalog\ProductCategoryForm;
use App\Models\ProductCategory;
use Livewire\Component;
use Livewire\Attributes\On; 

class Form extends Component
{
    public ?ProductCategoryForm $form;

    public function submit() {
       $this->form->validate();

       if ($this->form->category) {
            $this->form->category->update($this->form->all());
       } else {
        ProductCategory::create($this->form->all());
       }
        

        $this->redirect(Index::class);
    }

    #[On('edit-category')] 
    public function setActiveCategory($id) {
            $this->form->setCategory(ProductCategory::find($id));
            $this->resetErrorBag();
    }

    #[On('clear-category')] 
    public function clearActiveCategory() {
            $this->form->clearCategory();
            $this->resetErrorBag();
    }

    public function placeholder() {
        return <<<'HTML'
            <div>
                Loading...
            </div>
        HTML;
    }
    
    public function render()
    {
        return view('livewire.catalog.category.form');
    }
}
