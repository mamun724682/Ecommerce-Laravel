<?php

namespace App\Model;

use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $gurded = [];

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
