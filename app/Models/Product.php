<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'description', 'base_price', 'category_id', 'unit_id', 'index'];


    public function category():BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attachments');
    }
}
