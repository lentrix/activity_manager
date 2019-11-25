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

Route::get('/', 'SiteController@loginForm')->name('login');
Route::post('/login', 'SiteController@login');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/logout', 'SiteController@logout');
    Route::get('/home', 'SiteController@home')->name('home');

    Route::post('/students/search', 'StudentController@search');
    Route::get('/students/create', 'StudentController@create');
    Route::get('/students/{student}', 'StudentController@view');
    Route::get('/students', 'StudentController@index');
    Route::post('/students', 'StudentController@store');
    Route::post('/students/import', 'StudentController@import');
    Route::get('/students/qrcode/{student}', 'StudentController@qrcode');

    Route::get('/activities', 'ActivityController@index');
    Route::post('/activities', 'ActivityController@store');
    Route::get('/activities/create', 'ActivityController@create');
    Route::get('/activities/{activity}', 'ActivityController@edit');
    Route::patch('/activities/{activity}', 'ActivityController@update')->middleware('pastdue');
    Route::delete('/activities/{activity}', 'ActivityController@delete')->middleware('pastdue');
    Route::post('/activities/{activity}/add-checking', 'ActivityController@addChecking');
    Route::post('/activities/att-sched/delete', 'ActivityController@removeChecking');

    Route::get('/semesters', 'SemesterController@index');
    Route::post('/semesters', 'SemesterController@store');
    Route::get('/semesters/create', 'SemesterController@create');
    Route::get('/semesters/{semester}', 'SemesterController@edit');
    Route::patch('/semesters/{semester}', 'SemesterController@update');
    Route::get('/semesters/{semester}/activate', 'SemesterController@activate');

    Route::get('/qrcodes', 'QrCodeController@index');
    Route::post('/qrcodes', 'QrCodeController@index');

    Route::patch('/change-password', 'SiteController@changePassword');
    Route::get('/change-password', 'SiteController@changePasswordForm');

    Route::post('/att-check/{attCheck}/validate', 'AttCheckController@validateAttCheck');
    Route::get('/att-check/{attCheck}', 'AttCheckController@show');

    Route::get('/att-sched/{attSched}/edit', 'AttSchedController@edit');
    Route::patch('/att-sched/{attSched}', 'AttSchedController@update');
    Route::get('/att-sched/{attSched}', 'AttSchedController@show');
});

