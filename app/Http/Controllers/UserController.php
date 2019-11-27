<?php

namespace LibraFireProject\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
    	return view('profile.profile');
    }

    public function profileData(Request $request)
    {
    	$firstName = $request->input('first-name-profile');
    	$lastName = $request->input('last-name-profile');
    	$email = $request->input('email-profile');

    	var_dump($firstName);
    	var_dump($lastName);
    	var_dump($email);
    }
}
