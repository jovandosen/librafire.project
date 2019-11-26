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

Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@registerData');

Route::get('/login', 'AuthController@login')->name('login');

Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/home', 'AuthController@home')->name('home');

Route::post('/emails', 'AuthController@emails')->name('emails');