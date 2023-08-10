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

    protected $fillable = ['index', 'customer_id', 'expire_date', 'user_id', 'description', 'hide_prices'];

    protected $casts = [
        'hide_prices' => 'boolean'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(OfferProduct::class, 'offer_id');
    }

    
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    
}
