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

Route::middleware('check.signed')->group(function(){

	Route::get('/register', 'AuthController@register')->name('register');

	Route::get('/login', 'AuthController@login')->name('login');

});

Route::post('/register', 'AuthController@registerData');

Route::post('/login', 'AuthController@loginData');

Route::middleware('check.auth')->group(function(){

	Route::get('/profile', 'UserController@profile')->name('profile');

	Route::get('/home', 'AuthController@home')->name('home');

	Route::get('/password', 'UserController@password')->name('password');

	Route::get('/item', 'UserController@item')->name('item');

	Route::get('/item/list', 'UserController@itemList')->name('item.list');

});

Route::patch('/profile', 'UserController@profileData');

Route::patch('/password', 'UserController@passwordData');

Route::post('/item', 'UserController@itemData');

Route::get('/logout', 'AuthController@logout')->name('logout');

Route::post('/emails', 'AuthController@emails')->name('emails');

Route::get('/item/delete/{id}', 'UserController@deleteItem')->name('item.delete');