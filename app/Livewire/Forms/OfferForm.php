<?php

namespace App\Livewire\Forms;

use Carbon\Carbon;
use Livewire\Form;
use App\Models\Offer;
use App\Models\Address;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Arr;
use App\Models\OfferProduct;
use Livewire\Attributes\Rule;

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
    public $content = '{}';

    public $products = [];

    public $rules = [
        'expire_date' => ['date']
    ];
    


    public function setOffer(Offer $offer)
    {
        $this->offer = $offer;

        $this->index = $offer->index;
        $this->customer_id = $offer->customer_id;
        $this->expire_date = $offer->expire_date;
        $this->user_id = $offer->user_id;
        $this->content = $offer->content;

        $this->setCustomer($offer->customer_id);
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

        $this->customer_id = $this->customer->id;

        if($this->customer->addresses->count() == 1 )
        {
            $this->address = $this->customer->addresses->first();
            $this->address_id = $this->address->id;
        }

        $this->generateIndex();
    }

    public function addProduct($id)
    {   
        $product = Product::find($id);

        $offer_product = new OfferProduct();

        $offer_product->price = $product->base_price;
        $offer_product->amount = 1;

        // $this->products[] = [
        //     'product' => $product,
        //     'name' => $product->name,
        //     'product_id' => $product->id,
        //     'price' => $product->base_price,
        //     'vat' => 23,
        //     'total'=> $product->base_price * 2, 
        //     'amount' => 2
        // ];
    
        $this->products[] = $offer_product->toArray();


    }


    public function createOffer()
    {
        $this->user_id = auth()->user()->id;
        Offer::create($this->getOfferToSave());
    }

    public function updateOffer()
    {
        $this->offer->update($this->getOfferToSave());
    }

    private function getOfferToSave():array
    {
        return Arr::except($this->toArray(), ['products', 'customer', 'user', 'products' ]);
    }
    

    public function saveProducts() 
    {

    }

    public function updateProducts()
    {
        dd($this->products);

    }

    public function updated($property)
    {
        dd($property);
        $this->form->recalculateProducts();
    }

    public function recalculateProducts()
    {
        $products  = [];
        
        foreach($this->products as $product)
        {
            $products = (new Product($product))->toArray();
        }

        $this->products = $products;
    }

}
