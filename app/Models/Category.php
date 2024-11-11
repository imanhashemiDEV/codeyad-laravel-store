<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
        'parent_id'
    ];

    public function parentCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id','id')->withDefault(['name' => 'دسته بندی اصلی']);
    }

    public function childCategory(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(self::class, 'parent_id','id');
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    public static function getCategories()
    {
       $array=[];
       $categories = self::query()->with('childCategory')->where('parent_id',null)->get();
       foreach ($categories as $category1) {
           $array[$category1->id] = $category1->name;
           foreach ($category1->childCategory as $category2) {
               $array[$category2->id] = ' - ' .$category2->name;
           }
       }

       return $array;
    }

    protected static function boot()
    {
        parent::boot();
        self::deleting(function ($category) {
            foreach ($category->childCategory()->withTrashed()->get() as $child) {
                $child->delete();
            }
        });

        self::restoring(function ($category) {
            foreach ($category->childCategory()->withTrashed()->get() as $child) {
                $child->restore();
            }
        });
    }


}
