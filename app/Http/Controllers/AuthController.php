<?php

namespace LibraFireProject\Http\Controllers;

use View;
use Mail;
use Illuminate\Http\Request;
use LibraFireProject\Http\Requests\RegisterRequest;
use LibraFireProject\User;
use LibraFireProject\Mail\WelcomeMail;

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

    	$user = new User();

    	$user->register($firstName, $lastName, $email, $password);

    	Mail::to($email)->send(new WelcomeMail($firstName));

    	return redirect()->route('home');
    }

    public function home()
    {
    	return View::make('profile.home');
    }

    public function login()
    {
    	return view('login');
    }

    public function emails()
    {
    	$info = new User();
    	$info->getAllEmails();
    }
}
