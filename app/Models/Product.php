<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'e_name',
        'slug',
        'price',
        'discount',
        'count',
        'max_sell',
        'viewed',
        'sold',
        'image',
        'description',
        'status',
        'category_id',
        'brand_id',
        'color_id',
        'guaranty_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'color_product');
    }

    public function guaranties(): BelongsToMany
    {
        return $this->belongsToMany(Guaranty::class, 'guaranty_product');
    }

    public function productProperties(): HasMany
    {
        return $this->hasMany(ProductProperty::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function productPrices(): HasMany
    {
        return $this->hasMany(ProductPrice::class);
    }

}
