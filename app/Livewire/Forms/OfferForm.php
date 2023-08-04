<?php

namespace App\Livewire\Forms;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Offer;
use Carbon\Carbon;
use Livewire\Attributes\Rule;
use Livewire\Form;

class OfferForm extends Form
{
    public ?Offer $offer = null;
    public ?Customer $customer = null;
    public ?Address $address = null;


    public $index;
    public $customer_id;
    public $address_id;
    public $expire_date;
    public $user_id;
    public $content;
    


    public function setOffer(Offer $offer)
    {
        $this->offer = $offer;
    }

    public function setOfferById(int $id)
    { 
        $this->setOffer(Offer::find($id));
    }

    public function setEmptyOffer() 
    {
        $this->setOffer(new Offer);
    }

    public function generateIndex() 
    {
        $this->index = 'OF-'.Offer::count() + 1 .'-'. $this->customer->id.'-'. Carbon::now()->year;
    }

    public function setCustomer($id)
    {
        $this->customer = Customer::with('addresses')->where('id', $id)->first();

        if($this->customer->addresses->count() == 1 )
        {
            $this->address = $this->customer->addresses->first();
            $this->address_id = $this->address->id;
        }

        $this->generateIndex();
    }
    

}
