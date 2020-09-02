@extends('frontend.layouts.master')

@section('content')
<div class="ps-checkout pt-80 pb-80">
	<div class="ps-container">
		@guest
		<div class="ps-shipping">
			<h3>FREE SHIPPING</h3>
			<p>YOUR ORDER QUALIFIES FOR FREE SHIPPING.<br> Please <a href="{{ route('login') }}"> Login</a> or <a href="{{ route('register') }}"> Singup</a> for free shipping on every order, every time.</p>
		</div>
		@endguest

		@auth
		<form class="ps-checkout__form" action="{{ route('order') }}" method="post">
			@csrf
			
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">

					<div class="ps-shipping text-center">
						<h2 style="color: #2AC37D">You are ordering as, {{ auth()->user()->name }}</h2>
					</div>

					<div class="ps-checkout__billing">
						<h3>Billing Detail</h3>
						<div class="form-group form-group--inline">
							<label for="name">Customer Name<span style="color: red;">*</span>
							</label>
							<input name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" type="text" value="{{ auth()->user()->name }}" required>

							@error('customer_name')
							<span class="invalid-feedback" role="alert" style="color: red;">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group form-group--inline">
							<label for="customer_phone_number">Phone Number<span style="color: red;">*</span>
							</label>
							<input name="customer_phone_number" class="form-control @error('customer_phone_number') is-invalid @enderror" type="text" value="{{ auth()->user()->phone_number }}" required>

							@error('customer_phone_number')
							<span class="invalid-feedback" role="alert" style="color: red;">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group form-group--inline">
							<label for="address">Address<span style="color: red;">*</span>
							</label>
							{{-- <input name="address" class="form-control @error('address') is-invalid @enderror" type="text" value="{{ old('address') }}" required> --}}
							<textarea name="address" class="form-control" rows="3" placeholder="Please input your details address." required>{{ old('address') }}</textarea>

							@error('address')
							<span class="invalid-feedback" role="alert" style="color: red;">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group form-group--inline">
							<label for="city">City<span style="color: red;">*</span>
							</label>
							<input name="city" class="form-control @error('city') is-invalid @enderror" type="text" value="{{ old('city') }}" required>

							@error('city')
							<span class="invalid-feedback" role="alert" style="color: red;">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group form-group--inline">
							<label for="postal_code">Postal Code<span style="color: red;">*</span>
							</label>
							<input name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" type="text" value="{{ old('postal_code') }}" required>

							@error('postal_code')
							<span class="invalid-feedback" role="alert" style="color: red;">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
					<div class="ps-checkout__order">
						<header>
							<h3>Your Order</h3>
						</header>
						<div class="content">
							<table class="table ps-checkout__products">
								<thead>
									<tr>
										<th class="text-uppercase">Product</th>
										<th class="text-uppercase">Total</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($cart as $key=> $product)
									<tr>
										<td>{{ $product['title'] }} x{{ $product['quantity'] }}</td>
										<td>{{ number_format($product['total_price'], 2) }}৳</td>
									</tr>
									@endforeach
									<tr>
										<td><strong style="color: #2AC37D">Total</strong></td>
										<td  style="color: #2AC37D">{{ number_format($total, 2) }}৳</td>
									</tr>
								</tbody>
							</table>
						</div>
						<footer>
							<h3>Payment Method</h3>
							<div class="form-group cheque">
								<div class="ps-radio">
									<input class="form-control" type="radio" id="rdo01" name="payment" checked>
									<label for="rdo01">Cheque Payment</label>
									<p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
								</div>
							</div>
							<div class="form-group paypal">
								<div class="ps-radio ps-radio--inline">
									<input class="form-control" type="radio" name="payment" id="rdo02">
									<label for="rdo02">Paypal</label>
								</div>
								<ul class="ps-payment-method">
									<li><a href="#"><img src="frontend/images/payment/1.png" alt=""></a></li>
									<li><a href="#"><img src="frontend/images/payment/2.png" alt=""></a></li>
									<li><a href="#"><img src="frontend/images/payment/3.png" alt=""></a></li>
								</ul>
								<button type="submit" class="ps-btn ps-btn--fullwidth">Place Order<i class="ps-icon-next"></i></button>
							</div>
						</footer>
					</div>					
				</div>
			</div>
		</form>
		@endauth
	</div>
</div>
@endsection