<?php

namespace LibraFireProject\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
    	return view('register');
    }

    public function registerData(Request $request)
    {
    	$firstName = $request->input('first-name');
    	$lastName = $request->input('last-name');
    	$email = $request->input('email');
    	$password = $request->input('password');

    	$request->validate([
    		'first-name' => 'required|min:3',
    		'last-name' => 'required|min:3',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|min:5'
    	], [
    		'first-name.required' => 'First Name can not be empty.',
    		'first-name.min' => 'First Name must have at least 3 characters.',
    		'last-name.required' => 'Last Name can not be empty.',
    		'last-name.min' => 'Last Name must have at least 3 characters.',
    		'email.required' => 'Email can not be empty.',
    		'email.email' => 'Email address is not valid.',
    		'email.unique' => 'Email already exists.',
    		'password.required' => 'Password can not be empty.',
    		'password.min' => 'Password must have at least 5 characters.'
    	]);

    }

    public function login()
    {
    	return view('login');
    }
}
