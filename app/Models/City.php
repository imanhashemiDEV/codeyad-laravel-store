<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'province_id'];


    public function province(): BelongsTo
    {
      return $this->belongsTo(Province::class);
    }
}
