<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guaranty extends Model
{
    protected $fillable=[
        'name',
    ];

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class,'color_product');
    }
}
