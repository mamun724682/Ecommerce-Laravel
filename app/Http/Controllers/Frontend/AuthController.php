<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
			User::create([
				'name' => request()->name,
				'email' => strtolower(request()->email),
				'phone_number' => request()->phone_number,
				'password' => Hash::make(request()->password),
				'email_verification_token' => uniqid(time().request()->email, true).Str::random(32),
			]);
			session()->flash('success', 'Account registered');
			return redirect()->route('login');

		} catch (Exception $e) {
			session()->flash('error', $e->getmessage());
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
}
