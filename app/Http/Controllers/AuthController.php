<?php

namespace LibraFireProject\Http\Controllers;

use Illuminate\Http\Request;
use LibraFireProject\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register()
    {
    	return view('register');
    }

    public function registerData(RegisterRequest $request)
    {
    	$firstName = $request->input('first-name');
    	$lastName = $request->input('last-name');
    	$email = $request->input('email');
    	$password = $request->input('password');

    	// 

    }

    public function login()
    {
    	return view('login');
    }
}
