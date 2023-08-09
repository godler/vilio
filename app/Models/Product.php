<?php

namespace App\Models;

use Attribute;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'description', 'base_price', 'category_id', 'unit_id', 'index'];

    protected $appends = ['thumb'];

    public function category():BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attachments');
    }

    public function scopeSearch(Builder $query,  string $search):void
    {
        $query->where('name', 'like', '%'.$search.'%');
    }

    public function getThumbAttribute()
    {
        if($this->hasMedia('attachments')){
            return $this->getMedia('attachments')[0]->getUrl('thumb');
        }
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);
    }
}
