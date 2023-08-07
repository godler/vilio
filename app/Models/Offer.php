<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['index', 'customer_id', 'expire_date', 'user_id', 'description'];

    public function products(): HasMany
    {
        return $this->hasMany(OfferProduct::class, 'offer_id');
    }
}
