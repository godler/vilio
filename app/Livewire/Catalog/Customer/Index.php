<?php

namespace App\Livewire\Catalog\Customer;

use App\Models\Customer;
use Livewire\Component;

class Index extends Component
{

    public $search_name = '';

    public function removeCustomer($id) {
        Customer::find($id)->delete();
    }
    
    public function render()
    {
        return view('livewire.catalog.customer.index', [
            'customers' => Customer::when($this->search_name, function($query) {
                return $query->where('name', 'like', '%'.$this->search_name.'%')
                        ->orWhere('name', 'like', '%'.$this->search_name.'%')
                        ->orWhere('phone_number', 'like', '%'.$this->search_name.'%');
              })
            ->get()
        ]);
    }
}
