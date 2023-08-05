<?php

namespace App\Livewire\Offer;

use App\Livewire\Forms\OfferForm;
use App\Models\Customer;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Form extends Component
{
    public OfferForm $form;


    public function setCustomer($id)
    {
          $this->form->setCustomer($id);
    }

    public function addProduct($id) 
    {
        $this->form->addProduct($id);
    }

    public function render()
    {
        return view('livewire.offer.form');
    }

}
