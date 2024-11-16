<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guaranty extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'name',
    ];

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class,'color_product');
    }
}
