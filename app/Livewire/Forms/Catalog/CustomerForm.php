<?php
namespace App\Livewire\Forms\Catalog;

use App\Models\Address;
use App\Models\Customer;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Arr;

class CustomerForm extends Form
{
    public $rules = [
        'name' => ['required','min:5'],
        'phone_number'=> ['string', 'nullable'],
        'email' => ['email', 'nullable'],
        'notes' => ['string', 'nullable'],
        'addresses' => ['array'],
        'addresses.*.city' => ['required', 'string'],
        'addresses.*.address' => ['required', 'string'],
        'addresses.*.post_code' => ['required', 'string']
    ];
    
    public ?Customer $customer;

    public $name = '';
    
    public $phone_number;

    public $email;

    public $notes;
    
    public $addresses = []; 

    protected $address = [
            'address' => null,
            'post_code' => null,
            'city' => null
    ];

    public function updateCustomer()
    {
        $this->customer->update($this->all());
    }

    public function createCustomer()
    {
        Customer::create($this->all());
    }

    public function handleAddresses() {
        foreach($this->addresses as $address)
        {
            if(isset($address['id'])) {
                $this->customer->addresses()->whereId($address['id'])->update($address);
            } else {
                $this->customer->addresses()->create($address);
            }
        }
    }
 
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
 
        $this->name = $customer->name;

        $this->phone_number = $customer->phone_number;

        $this->email = $customer->email;

        $this->notes = $customer->notes;

        $this->addresses =  $customer->addresses->map(fn($item) => Arr::except($item->toArray(), ['created_at', 'updated_at']))->toArray();
    }

    public function clearCustomer() {
        $this->reset(); 
    }

    public function addAddress() {
        $this->addresses[] = $this->address;
    }

    public function removeAddress($key) {
        if (isset($this->addresses[$key]['id'])) {
            Address::find($this->addresses[$key]['id'])->delete();
        }
        array_splice($this->addresses, $key, 1);
    }
}
