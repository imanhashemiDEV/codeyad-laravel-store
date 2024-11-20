<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $fillable = [
        'main_price',
        'price',
        'discount',
        'count',
        'max_sell',
        'viewed',
        'sold',
        'status',
        'product_id',
        'color_id',
        'guaranty_id',
    ];

    public function product()
    {
       return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function Guaranty()
    {
        return $this->belongsTo(Guaranty::class);
    }
}
