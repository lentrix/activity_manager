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

Route::group(['middleware'=>'cors'], function(){
    Route::post('/login', [
        'as' => 'login.login',
        'uses' => 'Api\Auth\LoginController@login'
    ]);

    Route::get('/profile', [
        'as' => 'user.profile',
        'uses' => 'Api\Auth\LoginController@profile'
    ]);

    Route::get('/activities','Api\ActivitiesController@activities');
    Route::get('/attscheds/{activity_id}', 'Api\ActivitiesController@attScheds');

    Route::post('/submit', 'Api\ActivitiesController@submit');
});

