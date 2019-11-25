<?php

namespace LibraFireProject\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
    	return view('register');
    }

    public function login()
    {
    	return view('login');
    }
}
