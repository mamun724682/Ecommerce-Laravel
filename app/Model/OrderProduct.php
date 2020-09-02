<?php

namespace App\Model;

use App\Model\Order;
use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'price',
    ];

    public $timestamps = false;

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}