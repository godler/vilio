<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number', 'email', 'notes', 'is_company', 'tax_number'];

    protected $casts = [
        'is_company' => 'boolean',
    ];

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'customer_id');
    }

    public function scopeSearch(Builder $query, string $search)
    {
        $query->where('name', 'like', '%'.$search.'%')
        ->orWhere('name', 'like', '%'.$search.'%')
        ->orWhere('phone_number', 'like', '%'.$search.'%');
    }

    
}
