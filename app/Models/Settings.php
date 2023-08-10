<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'tax_number',
        'address',
        'city',
        'post_code',
        'country',
        'offer_mask',
    ];
}
