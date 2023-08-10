<?php

namespace App\Livewire\Settings;

use Livewire\Component;
use App\Models\Settings;
use Illuminate\Support\Arr;

class Form extends Component
{
    public ?Settings $settings = null;

    public $name = '';
    public $company_name = '';
    public $tax_number = '';
    public $address = '';
    public $city = '';
    public $post_code = '';
    public $country = '';
    public $offer_mask = '';

    public function save(){
        if(!$this->settings)
        {
            $this->settings = new Settings();    
        }

        $this->settings->fill(Arr::except([
            'name' => $this->name,
            'company_name' => $this->company_name,
            'tax_number' => $this->tax_number,
            'address' => $this->address,
            'city' => $this->city,
            'post_code' => $this->post_code,
            'country' => $this->country,
            'offer_mask' => $this->offer_mask,
        ], ['settings']))->save();
    }

    public function mount()
    {
        $settings = Settings::first();

        if($settings)
        {
            $this->settings = $settings;
            $this->fill($settings);
        }
    }


    public function render()
    {
        return view('livewire.settings.form');
    }
}
