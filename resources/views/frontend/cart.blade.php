@extends('frontend.layouts.master')

@section('content')
<div class="ps-cart-listing">
	@if (empty($cart))
	<h2 class="text-center" style="color: #50CF96;">Empty cart! Please add some products to cart :)</h2>
	@else

	<table class="table ps-cart__table">
		<thead>
			<tr>
				<th>All Products</th>
				<th>Unit Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cart as $key => $product)
			<tr>
				<td>
					<a class="ps-product__preview" href="{{ route('frontend.product.details', $product['product_slug']) }}" target="_blank">
						<img class="mr-15" width="100" src="{{ $product['image'] }}" alt=""> {{ $product['title'] }}
					</a>
				</td>
				<td>৳ {{ number_format($product['unit_price'], 2) }}</td>
				<td>
					<div class="form-group--number">
						<button class="minus"><span>-</span></button>
						<input class="form-control" type="text" value="{{ $product['quantity'] }}">
						<button class="plus"><span>+</span></button>
					</div>
				</td>
				<td>৳ {{ number_format($product['total_price'], 2) }}</td>
				<td>
					<form action="{{ route('cart.remove') }}" method="post">
						@csrf
						<input type="hidden" name="product_id" value="{{ $key }}">
						
						<div>
							<button class="ps-remove" type="submit"></button>
						</div>
					</form>
				</td>
			</tr>
			@endforeach		
		</tbody>
	</table>

	<div class="ps-cart__actions">
		<div class="ps-cart__promotion">
			<div class="form-group">
				<div class="ps-form--icon"><i class="fa fa-angle-right"></i>
					<input class="form-control" type="text" placeholder="Promo Code">
				</div>
			</div>
			<div class="form-group">
				<button class="ps-btn ps-btn--gray">Continue Shopping</button>
			</div>
		</div>
		<div class="ps-cart__total">
			<h3>Total Price: <span> {{ number_format($total, 2) }} ৳</span></h3>
				<a class="ps-btn" href="checkout.html">Process to checkout<i class="ps-icon-next"></i></a><br><br>
			<a class="ps-btn ps-btn--gray" href="{{ route('cart.clear') }}">Clear Cart</a>
		</div>
	</div>
	@endif
</div>

@endsection