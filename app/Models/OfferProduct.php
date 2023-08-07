<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'amount', 'vat', 'product_id', 'offer_id', 'hidden'];

    protected $appends = ['total'];

    protected $casts = [
        'hidden' => 'boolean'
    ];

    protected $attributes = [
        'hidden' => false
    ];

    public function total():Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['price'] * $attributes['amount'] 
        );
    }

    public function grossPrice(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['total'] + ($attributes['total'] * $attributes['vat'])
        );
    }
}
