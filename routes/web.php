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
    return view('test');
});

//

Route::get('/dashboard', 'UserController@index')->name('dashboard');
//Route::post('login', 'UserController@login');
//Route::post('register', 'UserController@register');
//Route::group(['middleware' => 'auth:api'], function(){
//    Route::post('details', 'UserController@details');
//});
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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
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

Route::get('/create/news/type', 'NewsController@createNewsType')->name('createNewsType');

Route::post('/create/news/type', 'NewsController@storeNewsType');



//Route::get('/province','API\DistrictController@provinces');
//Route::get('/province/{province_code}/amphoe','API\DistrictController@amphoes');
//Route::get('/province/{province_code}/amphoe/{amphoe_code}/district','API\DistrictController@districts');
//Route::get('/province/{province_code}/amphoe/{amphoe_code}/district/{district_code}','API\DistrictController@detail');

//Route::get('/district', function () {
//    return view("district/index");
//});