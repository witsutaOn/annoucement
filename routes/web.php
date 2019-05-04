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
});

Route::get('/test', function () {
    return view('auth.login');
});



Route::get('/dashboard', 'UserController@index')->name('dashboard');

Route::get('/register', 'RegisterController@show')->name('showRegistry');

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/dashboard', 'AuthController@login')->name('loginTest');
    Route::post('/signUp', 'AuthController@signUp')->name('signUp');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('/logout', 'AuthController@logout')->name('logout');
        Route::get('/user', 'AuthController@user');
    });
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/news', 'NewsController');

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegister')->name('register');
Route::post('register', 'Auth\RegisterController@create');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::resource('users', 'UserController');

Route::resource('organize', 'OrganizeController');

Route::resource('/newstype', 'NewsTypeController');


