<?php

namespace App\Livewire\Template;

use App\Models\Template;
use Livewire\Component;

class Index extends Component
{
    
    public function render()
    {
        return view('livewire.template.index', [
            'templates' => Template::all()
        ]);
    }
}
