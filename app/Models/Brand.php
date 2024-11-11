<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
    ];

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
       return $this->hasMany(Product::class);
    }
}
