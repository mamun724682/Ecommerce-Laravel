@extends('frontend.layouts.master')

@section('content')
<h1 class="text-center"><u><strong>Order Details</strong></u></h1><br><br>
<div class="ps-cart-listing ps-table--compare">
	<div class="row">
		<div class="col-md-6">
			<table class="table ps-cart__table">
				<h3 class="text-center" style="background: lightgray;">Customer Details</h3>
				<tbody>
					<tr>
						<td>Customer Name</td>
						<td>{{ $order->customer_name }}</td>
					</tr>
					@if ($order->processed_by)
					<tr>
						<td>Processed By</td>
						<td>{{ $order->customer->name }}</td>
					</tr>
					@endif
					<tr>
						<td>Customer Phone</td>
						<td>{{ $order->customer_phone_number }}</td>
					</tr>
					<tr>
						<td>Address</td>
						<td>{{ $order->address }}, {{ $order->city }}, Postal-{{ $order->postal_code }}</td>
					</tr>
					<tr>
						<td>Total Amount</td>
						<td><span class="price">{{ number_format($order->total_amount, 2) }} ৳</span></td>
					</tr>
					<tr>
						<td>Paid Amount</td>
						<td><span class="price">{{ number_format($order->paid_amount, 2) }} ৳</span></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>{{ $order->operational_status }}</td>
					</tr>
					<tr>
						<td>Created At</td>
						<td>{{ $order->created_at }} - {{ $order->created_at->diffForHumans() }}</td>
					</tr>
					<tr>
						<td>Updated At</td>
						<td>{{ $order->updated_at }} - {{ $order->created_at->diffForHumans() }}</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-md-6">
			<h3 class="text-center" style="background: lightgray;">Order Products</h3>
			{{-- {{ dd($order->products) }} --}}
			<table class="table ps-cart__table">
				<thead>
					<tr>
						<th></th>
						<th>All Products</th>
						<th>Quantity</th>
						<th>Unit Price</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($order->products as $product)
					<tr>
						<td>
							<a class="ps-product__preview" href="{{ route('frontend.product.details', $product->product->slug) }}" target="_blank">
								<img class="mr-15" width="100" src="{{ $product->product->getFirstMediaUrl('products') }}" alt="">
							</a>
						</td>
						<td>
							<a class="ps-product__preview" href="{{ route('frontend.product.details', $product->product->slug) }}" target="_blank">
								{{ $product->product->title }}
							</a>
						</td>
						<td>{{ $product->quantity }}</td>
						<td>৳ {{ number_format($product->product->price, 2) }}</td>
					</tr>
					@endforeach		
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection