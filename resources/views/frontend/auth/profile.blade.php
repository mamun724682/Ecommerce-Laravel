@extends('frontend.layouts.master')

@section('content')
<h1 class="text-center"><u><strong>My orders</strong></u></h1><br><br>
<div class="ps-cart-listing ps-table--whishlist">
	<table class="table ps-cart__table">
		<thead>
			<tr>
				<th>Customer Name</th>
				<th>Phone Number</th>
				<th>Total Amount</th>
				<th>Paid Amount</th>
				<th>View</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($orders as $order)
			<tr>
				<td><a class="ps-product__preview" href="{{ route('order.details', $order->id) }}"><img class="mr-15" src="images/product/cart-preview/1.jpg" alt=""> {{ $order->customer->name }}</a></td>
				<td>{{ $order->customer_phone_number }}</td>
				<td>{{ $order->total_amount }}</td>
				<td>{{ $order->paid_amount }}</td>
				<td><a class="ps-product-link" href="{{ route('order.details', $order->id) }}">Details</a></td>
				<td>
					<div class="ps-remove"></div>
				</td>
			</tr>
			@empty
			{{-- empty expr --}}
			@endforelse
		</tbody>
	</table>
</div>
@endsection