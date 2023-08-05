<?php

namespace App\Livewire\Catalog\Customer;

use App\Livewire\Forms\Catalog\CustomerForm;
use App\Models\Customer;
use Livewire\Component;
use Livewire\Attributes\On; 

class Form extends Component
{
    public ?CustomerForm $form;

    public function submit() 
    {      
       $this->form->validate();
    
       if ($this->form->customer) {
            $this->form->updateCustomer();
       } else {
            $this->form->createCustomer();
       }
        
    
        $this->form->handleAddresses();

        $this->redirect(Index::class);
    }

    #[On('edit-customer')] 
    public function setActiveCategory($id) {
        $this->form->setCustomer(Customer::find($id));
        $this->resetErrorBag();
    }

    #[On('clear-customer')] 
    public function clearActiveCustomer() {
        $this->form->clearCustomer();
        $this->resetErrorBag();
    }

    public function addAddress() {
        $this->form->addAddress();
    }

    public function removeAddress($key) {
        $this->form->removeAddress($key);
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
        return view('livewire.catalog.customer.form');
    }
}
