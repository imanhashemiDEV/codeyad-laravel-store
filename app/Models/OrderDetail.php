<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'guaranty_id',
        'color_id',
        'main_price',
        'price',
        'discount',
        'count',
        'status'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function guaranty(): BelongsTo
    {
        return $this->belongsTo(Guaranty::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }


}
