<?php

namespace LibraFireProject\Http\Controllers;

use View;
use Mail;
use Log;
use Illuminate\Http\Request;
use LibraFireProject\Http\Requests\RegisterRequest;
use LibraFireProject\Http\Requests\LoginRequest;
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

    	$userData = $user->register($firstName, $lastName, $email, $password);

    	session(['user' => $userData]);

    	Log::info('New user successfully registered.');

    	$request->session()->flash('status', 'You have successfully registered.');

    	Mail::to($userData->email)->send(new WelcomeMail($userData->firstName));

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

    public function loginData(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = new User();

        $userData = $user->login($email, $password);

        if( is_array($userData) ){

            if( $userData[0] == 'email' ){
                return redirect()->back()->with('emailError', $userData[1]);
            } else {
                return redirect()->back()->with('passwordError', $userData[1])->with('emailOk', $email);
            }

        }

        if( is_object($userData) ){

            session(['user' => $userData]);

            return redirect()->route('home');

        }

    }

    public function logout(Request $request)
    {
    	$request->session()->forget('user');
		$request->session()->flush();
		return redirect()->route('login');
    }

    public function emails()
    {
    	$info = new User();
    	$info->getAllEmails();
    }
}
