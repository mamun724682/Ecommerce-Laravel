<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Order;
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
        $notification = $this->toastr('success', $product->title." added to cart.");

    	return redirect()->back()->with($notification);
    }

    public function showCart()
    {
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

    public function checkout()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];
        $total = array_sum(array_column($cart, 'total_price'));

        if (count($cart) <= 0) {
            $notification = $this->toastr('warning', 'Please add products to cart!');
            return redirect('/')->with($notification);
        }

        return view('frontend.checkout', compact('cart', 'total'));
    }

    public function processOrder()
    {
        request()->validate([
            'customer_name' => 'required',
            'customer_phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        $cart = session()->has('cart') ? session()->get('cart') : [];
        $total = array_sum(array_column($cart, 'total_price'));

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'customer_name' => request()->customer_name,
            'customer_phone_number' => request()->customer_phone_number,
            'address' => request()->address,
            'city' => request()->city,
            'postal_code' => request()->postal_code,
            'total_amount' => $total,
            'paid_amount' => $total,
            'payment_details' => 'Cash on Delivery',
        ]);

        foreach ($cart as $product_id => $product) {
            $order->products()->create([
                'product_id' => $product_id,
                'quantity' => $product['quantity'],
                'price' => $product['total_price'],
            ]);
        }

        session()->forget(['cart', 'total']);

        $notification = $this->toastr('success', 'Order Created!');

        return redirect()->route('order.details', $order->id)->with($notification);
    }

    public function showOrder($id)
    {
        $order = Order::with(['products','products.product'])->where('user_id', auth()->user()->id)->findOrFail($id);

        return view('frontend.orderDetails', compact('order'));
    }
}
