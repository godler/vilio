<?php

namespace App\Livewire\Offer;

use Livewire\Component;
use App\Models\Template;
use App\Livewire\Forms\OfferForm;
use Livewire\Attributes\Computed;

class Form extends Component
{
    public OfferForm $form;

    public $preview = null;


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

    public function generatePreview() 
    {
            
        $this->preview = true;

       
    }

    public function total()
    {
        return collect($this->form->products)->map(fn($item) => $item['price']*$item['amount'])->sum();
    }

    public function gross_total()
    {
        return collect($this->form->products)->map(fn($item) => $item['price']*$item['amount'] + (($item['price']*$item['amount'])*($item['vat']/100)))->sum();
    }

    public function hidePreview() 
    {
        $this->preview = null;
    }

    public function render()
    {
        return view('livewire.offer.form', [
            'total' => $this->total(),
            'gross_total' => $this->gross_total()
        ]);
    }
    

}
