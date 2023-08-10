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
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
    public $description = '';
    public $hide_prices = false;

    public $products = [];
    public $attachments = [];

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
        $this->description = $offer->description;
        $this->hide_prices = $offer->hide_prices;

        $this->setCustomer($offer->customer_id);

        $this->products = $offer->products->toArray();

        $this->setAttachments();
    }

    public function setOfferById(int $id)
    { 
        $offer = Offer::find($id);

        if (!$offer) {
            abort(404);
        }

        $this->setOffer($offer);
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

        $this->products[] = (new OfferProduct([
            'name' => $product->name,
            'product_id' => $product->id,
            'price' => $product->base_price,
            'amount' => 1,
            'vat' => 23,
        ]))->toArray();

        $this->setAttachments();
    }

    public function removeProduct($key) {
        $product = isset($this->products[$key]) ? $this->products[$key] : null;

        if ($product) {
            if(isset($product['id'])) {
                OfferProduct::find($product['id'])->delete();
            };
            array_splice($this->products, $key, 1);
        }
        $this->setAttachments();
    }


    public function createOffer()
    {
        $this->user_id = auth()->user()->id;
        $this->offer = Offer::create($this->getOfferToSave());
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
        $this->offer->products()?->delete();

        $this->offer->products()->createMany($this->products);
    }

    public function updatedForm($value, $property )
    {
       if($property[0] == 'products') {
         $this->updateProduct($property[1], $property[2], $value);
       }

       $this->setAttachments();

    }

    public function updateProduct($index, $property, $value)
    {
        $this->products[$index][$property] = $value;
     
        $this->products[$index] = (new OfferProduct())->fill($this->products[$index])->toArray();
    }

    private function setAttachments() {
        $this->attachments = Media::whereIn('model_id', collect($this->products)->pluck('product_id'))->where('model_type', \App\Models\Product::class )->get();
    }
}
