<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/province','API\DistrictController@provinces');
Route::get('/province/{province_code}/amphoe','API\DistrictController@amphoes');
Route::get('/province/{province_code}/amphoe/{amphoe_code}/district','API\DistrictController@districts');
Route::get('/province/{province_code}/amphoe/{amphoe_code}/district/{district_code}','API\DistrictController@detail');



Route::get('organize','OrganizeController@apiGetOrganizes');
Route::get('newstype','NewsTypeController@apiGetNewsType');
Route::get('news','NewsController@apiGetNews');
Route::get('districts','DistrictController@apiGetDistricts');



Route::get('follower/{end_user_id}','API\FollowerController@getFollowOrg');
Route::get('follower/{end_user_id}/{organized_id}','API\FollowerController@followOrg');


Route::get('news/organization/{organized_id}','NewsController@getNewsByOrganizationId');

Route::get('news/follow/{user_id}','NewsController@apiGetNewsFromFollow');
