<?php

namespace App\Model;

use App\User;
use App\Model\OrderProduct;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $gurded = [];

    public function customer()
    {
    	return $this->belongsTo(User::class);
    }

    public function processor()
    {
    	return $this->hasOne(User::class, 'processed_by');
    }

    public function products()
    {
    	return $this->hasMany(OrderProduct::class);
    }
}
