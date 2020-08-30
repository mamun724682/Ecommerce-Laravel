<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function showDetails($slug)
    {
    	$product = Product::where('slug', $slug)->where('active', 1)->first();
    	if ($product == null) {
    		return redirect()->route('frontend.home');
    	}

    	return view('frontend.product.details', compact('product'));
    }
}
