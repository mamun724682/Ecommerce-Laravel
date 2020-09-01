@extends('frontend.layouts.master')

@section('content')
<form class="ps-checkout__form" action="do_action" method="post">
	<div class="ps-checkout__billing">
		<h3>Billing Detail</h3>
		<div class="form-group form-group--inline">
			<label>First Name<span>*</span>
			</label>
			<input class="form-control" type="text">
		</div>
		<div class="form-group form-group--inline">
			<label>Last Name<span>*</span>
			</label>
			<input class="form-control" type="text">
		</div>
		<div class="form-group form-group--inline">
			<label>Company Name<span>*</span>
			</label>
			<input class="form-control" type="text">
		</div>
		<div class="form-group form-group--inline">
			<label>Email Address<span>*</span>
			</label>
			<input class="form-control" type="email">
		</div>
		<div class="form-group form-group--inline">
			<label>Company Name<span>*</span>
			</label>
			<input class="form-control" type="text">
		</div>
		<div class="form-group form-group--inline">
			<label>Phone<span>*</span>
			</label>
			<input class="form-control" type="text">
		</div>
		<div class="form-group form-group--inline">
			<label>Address<span>*</span>
			</label>
			<input class="form-control" type="text">
		</div>
		<div class="form-group">
			<div class="ps-checkbox">
				<input class="form-control" type="checkbox" id="cb01">
				<label for="cb01">Create an account?</label>
			</div>
		</div>
		<h3 class="mt-40"> Addition information</h3>
		<div class="form-group form-group--inline textarea">
			<label>Order Notes</label>
			<textarea class="form-control" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
		</div>
	</div>
	<div class="text-center">
		<button class="ps-btn">Register<i class="ps-icon-next"></i></button>
	</div>
</form>
@endsection