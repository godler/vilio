<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfferProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'amount', 'vat', 'product_id', 'offer_id', 'hidden'];

    protected $appends = ['total', 'thumb', 'unit', 'gross'];

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

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getThumbAttribute()
    {
        return $this->product->thumb;
    }

    public function getTotalAttribute()
    {
        return $this->price * $this->amount;
    }

    public function getGrossAttribute()
    {
        return $this->total + $this->vatvalue;
    }

    public function getVatvalueAttribute() 
    {
        return $this->total * ($this->vat / 100);
    }

    public function getUnitAttribute()
    {
        return $this->product->unit?->name;
    }
}
