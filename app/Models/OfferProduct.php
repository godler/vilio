<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    use HasFactory;

    protected $fillable = ['base_price', 'amount'];

    protected $appends = ['total'];

    public function total():Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['price'] * $attributes['amount'] 
        );
    }
}
