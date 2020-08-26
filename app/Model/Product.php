<?php

namespace App\Model;

use App\Model\Category;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
	use InteractsWithMedia;

    protected $gurded = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
    	parent::boot();
        static::creating(function($product) {
        	$product->slug = Str::slug($product->title);
        });
    }

    public function category()
    {
    	return $this->hasOne(Category::class);
    }
}
