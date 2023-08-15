<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['index', 'customer_id', 'expire_date', 'user_id', 'description', 'hide_prices', 
                            'customer_name', 'phone_number', 'email', 'is_company',  'tax_number', 'address', 'city', 'post_code'];

    protected $casts = [
        'hide_prices' => 'boolean',
        'is_company' => 'boolean'
    ];

    protected $appends = [
        'total', 'gross_total'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(OfferProduct::class, 'offer_id');
    }

    public function preview_products(): HasMany
    {
        return $this->hasMany(OfferProduct::class, 'offer_id')->where('hidden', false);
    }

    
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function getTotalAttribute()
    {
        return $this->products->map(fn($item) => $item['total'])->sum();
    }

    public function getGross_totalAttribute()
    {
        return $this->products->map(fn($item) => $item['gross'])->sum();
    }

    
}
