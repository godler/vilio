<?php

namespace App\Livewire\Offer;

use App\Models\Offer;
use Livewire\Component;

class Index extends Component
{
    public string $search_name = '';
    
    public function render()
    {
        return view('livewire.offer.index', [
            'offers' => Offer::all()
        ]);
    }
}
