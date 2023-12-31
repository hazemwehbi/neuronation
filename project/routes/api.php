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
Route::group([ 'prefix' => 'v1' ], function(){

	Route::post('register', 'API\AuthController@register')->name('user.register');
	Route::post('login', 'API\AuthController@login')->name('user.login');
    Route::post('logout', 'API\AuthController@logout')->name('user.logout');

	Route::group(['middleware' => 'auth:api', 'prefix' => 'users' ], function () {
		Route::get('/{user_id}/get-user-sessions', 'API\UserController@getUserSessionsByUserId')->name('user.fetch.sessions');
		Route::get('/{user_id}/get-user-exercises', 'API\UserController@getUserExercisesByUserId')->name('user.fetch.exercise');
	});
});
