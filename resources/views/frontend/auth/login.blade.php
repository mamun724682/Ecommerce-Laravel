@extends('frontend.layouts.master')

@section('content')
<form class="ps-checkout__form" action="{{ route('login') }}" method="post">
	@csrf
	
	<div class="ps-checkout__billing">
		<h1 class="text-center"><u>Login</u></h1> <br><br>
		<div class="form-group form-group--inline">
			<label for="email">Email Address<span style="color: red;">*</span>
			</label>
			<input name="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" required>

			@error('email')
			<span class="invalid-feedback" role="alert" style="color: red;">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
		<div class="form-group form-group--inline">
			<label for="password">Password<span style="color: red;">*</span>
			</label>
			<input name="password" class="form-control @error('password') is-invalid @enderror" type="password" value="{{ old('password') }}" required>

			@error('password')
			<span class="invalid-feedback" role="alert" style="color: red;">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<hr>
	<div class="text-center">
		<div class="form-group">
			<div class="ps-checkbox">
				<input class="form-control" type="checkbox" id="cb01">
				<label for="cb01">Remembe me</label>
			</div>
		</div>
		<button class="ps-btn">Register<i class="ps-icon-next"></i></button>
	</div>
</form>
@endsection