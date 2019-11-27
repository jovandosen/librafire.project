<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', 'AuthController@register')->name('register')->middleware('check.signed');
Route::post('/register', 'AuthController@registerData');

Route::get('/login', 'AuthController@login')->name('login')->middleware('check.signed');
Route::post('/login', 'AuthController@loginData');

Route::get('/profile', 'UserController@profile')->name('profile')->middleware('check.auth');
Route::post('/profile', 'UserController@profileData');

Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/home', 'AuthController@home')->name('home')->middleware('check.auth');

Route::post('/emails', 'AuthController@emails')->name('emails');