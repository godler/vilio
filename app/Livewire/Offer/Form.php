<?php

namespace App\Livewire\Offer;

use App\Livewire\Forms\OfferForm;

use Livewire\Component;

class Form extends Component
{
    public OfferForm $form;


    public function mount($offer = null) 
    {
        if($offer){
            $this->form->setOfferById($offer);   
        }
    }

    public function setCustomer($id)
    {
          $this->form->setCustomer($id);
    }

    public function addProduct($id) 
    {
        $this->form->addProduct($id);
    }

    public function saveOffer()
    {
        if($this->form->offer) {
            $this->form->updateOffer();
        }else {
            $this->form->createOffer();
        }

        $this->form->saveProducts();
    }

    public function updatedForm($value, $key)
    {
        $property = explode('.', $key);

      
        $this->form->updatedForm($value, $property);
    }

    public function removeProduct($key)
    {
        $this->form->removeProduct($key);
    }

    public function render()
    {
        return view('livewire.offer.form');
    }
    

}
