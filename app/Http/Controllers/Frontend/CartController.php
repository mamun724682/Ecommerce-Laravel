<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function addToCart()
    {
    	try {
    		request()->validate([
    			'product_id' => 'required|numeric'
    		]);
    	} catch (ValidationException $e) {
    		return redirect()->back();
    	}

    	$product = Product::findOrFail(request()->product_id);
    	$unit_price = ($product->sale_price != null && $product->sale_price > 0) ? $product->sale_price : $product->price;

    	$cart = session()->has('cart') ? session()->get('cart') : [];

    	if (array_key_exists($product->id, $cart)) {
    		$cart[$product->id]['quantity']++;
    		$cart[$product->id]['total_price'] = $cart[$product->id]['quantity'] * $cart[$product->id]['unit_price'];
    	} else {
    		$cart[$product->id] = [
    			'product_slug' => $product->slug,
    			'title' => $product->title,
    			'image' => $product->getFirstMediaUrl('products'),
    			'quantity' => 1,
    			'unit_price' => $unit_price,
    			'total_price' => $unit_price,
    		];
    	}

    	session(['cart' => $cart]);
    	session()->flash('success', $product->title." added to cart.");

    	return redirect()->back();
    }

    public function showCart()
    {
    	// session()->flush();
    	$cart = session()->has('cart') ? session()->get('cart') : [];
    	$total = array_sum(array_column($cart, 'total_price'));
    	return view('frontend.cart', compact('cart', 'total'));
    }

    public function removeFromCart()
    {
    	try {
    		request()->validate([
    			'product_id' => 'required|numeric'
    		]);
    	} catch (ValidationException $e) {
    		return redirect()->back();
    	}

    	// $product = Product::findOrFail(request()->product_id);
    	$cart = session()->has('cart') ? session()->get('cart') : [];
    	unset($cart[request()->product_id]);
    	session(['cart' => $cart]);

    	return redirect()->back();
    }

    public function clearCart()
    {
    	session(['cart' => []]);
    	return redirect()->back();
    }
}
