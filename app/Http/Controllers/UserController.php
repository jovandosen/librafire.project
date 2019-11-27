<?php

namespace LibraFireProject\Http\Controllers;

use LibraFireProject\User;
use Illuminate\Http\Request;
use LibraFireProject\Http\Requests\ProfileRequest;
use LibraFireProject\Http\Requests\PasswordRequest;

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

    	$userDetails = session('user');

    	$id = $userDetails->id;

    	$user = new User();

    	$userUpdated = $user->update($firstName, $lastName, $email, $id);

    	session(['user' => $userUpdated]);

    	$request->session()->flash('updated', 'You have successfully updated profile data.');

    	return redirect()->route('profile');
    }

    public function password()
    {
    	return view('profile.password');
    }

    public function passwordData(PasswordRequest $request)
    {
        $currentPassword = $request->input('current-password');
        $newPassword = $request->input('new-password');
        $newPasswordRepeat = $request->input('new-password-repeat');

        //

    }
}
