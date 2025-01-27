<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'province_id',
        'city_id',
        'name',
        'mobile',
        'address'
    ];

    public function user(): BelongsTo
    {
       return $this->belongsTo(User::class);
    }

    public function province(): BelongsTo
    {
       return $this->belongsTo(Province::class);
    }

    public function city(): BelongsTo
    {
       return $this->belongsTo(City::class);
    }
}
