<?php
namespace App\Livewire\Forms\Catalog;

use App\Models\ProductCategory;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProductCategoryForm extends Form
{
    public ?ProductCategory $category;

    #[Rule(['required','min:5'], null, null, 'Nazwa jest wymagana')]
    public $name = '';
 
    public function setCategory(ProductCategory $category)
    {
        $this->category = $category;
 
        $this->name = $category->name;
    }

    public function clearCategory() {
        $this->reset(); 
    }
}
