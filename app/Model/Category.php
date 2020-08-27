<?php

namespace App\Model;

use App\Model\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $gurded = [];

    // public static function boot()
    // {
    //     parent::boot();
    //     static::creating(function($category) {

    //         $slug = \Str::slug($category->title);
    //         $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
    //         $category->slug = $count ? "{$slug}-{$count}" : $slug;

    //     });
    // }

    public function parent_category()
    {
    	return $this->belongsTo(_CLASS_);
    }

    public function child_category()
    {
    	return $this->hasMany(_CLASS_);
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
