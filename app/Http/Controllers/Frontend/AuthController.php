<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\UserRegisterNotification;

class AuthController extends Controller
{
	public function showRegisterForm()
	{
		return view('frontend.auth.register');
	}

	public function processRegister()
	{
		$validator = Validator::make(request()->all(), [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'phone_number' => 'required|min:11|max:17|unique:users',
			'password' => 'required|min:5|max:10|confirmed',
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();   		
		}
		
		try {
			$user = User::create([
				'name' => request()->name,
				'email' => strtolower(request()->email),
				'phone_number' => request()->phone_number,
				'password' => Hash::make(request()->password),
				'email_verification_token' => uniqid(time().request()->email, true).Str::random(32),
			]);

			$user->notify(new UserRegisterNotification($user));

			$this->successMessage('Account registered. Please verify your account to continue!');

			return redirect()->route('login');

		} catch (Exception $e) {
			$this->errorMessage($e->getmessage());
			return redirect()->back();
		}
	}

	public function showLoginForm()
	{
		return view('frontend.auth.login');
	}

	public function processLogin()
	{

	}

	public function activate($token = null)
	{
		if ($token == null) {
			return redirect()->back();
		}

		$user = User::where('email_verification_token', $token)->firstOrFail();

		if ($user) {
			$user->update([
				'email_verified_at' => Carbon::now(),
				'email_verification_token' => null
			]);

			$this->successMessage('Account activated, you can login now!');

			return redirect()->route('login');
		}

		$this->errorMessage('Invalid Token');

		return redirect()->route('login');
	}
}
