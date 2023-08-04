<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Customer;

class CustomerSelector extends Component
{

    public ?string $search = null;

    public function render()
    {
        return view('livewire.components.customer-selector', [
            'customers' => Customer::when($this->search, function($query) {
                $query->search($this->search);
            })->take(10)->get()
        ]);
    }
}
