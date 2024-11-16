<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
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
