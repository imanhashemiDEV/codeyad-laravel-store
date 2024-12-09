<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $fillable=[
        'product_id',
        'name'
    ];

    public function product(): BelongsTo
    {
      return $this->belongsTo(Product::class);
    }
}
