<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showHome()
    {
    	$products = Product::select(['id', 'title', 'slug', 'price', 'sale_price'])->where('active', 1)->simplePaginate(8);

    	return view('frontend.home', compact('products'));
    }
}
