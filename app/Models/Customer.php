<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number', 'email', 'notes'];


    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'customer_id');
    }
}
