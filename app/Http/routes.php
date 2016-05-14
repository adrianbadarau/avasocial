<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/seedProducts', 'SetupController@seedProducts');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => ['auth']], function () {
    Route::get('settings/profile', 'SettingsController@getProfile');
    Route::post('settings/profile', 'SettingsController@postProfile');
    Route::get('settings/emails', 'SettingsController@getEmails');
    Route::get('settings/billing', 'SettingsController@getBilling');
    Route::get('settings/account', 'SettingsController@getAccount');
    Route::post('settings/account', 'SettingsController@postAccount');
});

Route::group(['middleware' => ['cors']], function () {
    Route::get('social', 'SocialController@getIcons');
});


Route::get('products/seed', 'ProductController@seedProducts');
Route::resource('products', 'ProductController');
