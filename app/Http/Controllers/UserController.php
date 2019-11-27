<?php

namespace LibraFireProject\Http\Controllers;

use Illuminate\Http\Request;
use LibraFireProject\Http\Requests\ProfileRequest;

class UserController extends Controller
{
    public function profile()
    {
    	return view('profile.profile');
    }

    public function profileData(ProfileRequest $request)
    {
    	$firstName = $request->input('first-name-profile');
    	$lastName = $request->input('last-name-profile');
    	$email = $request->input('email-profile');

    	//

    }
}
