<?php

namespace LibraFireProject\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
    	return view('profile.profile');
    }
}
