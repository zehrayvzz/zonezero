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
Route::namespace('Api')->group(function () {
    Route::post('auth/login', 'ApiController@login');
    Route::post('auth/register', 'ApiController@register');

    Route::group(['middleware' => 'auth.jwt'], function () {
        Route::post('auth/logout', 'ApiController@logout');

        Route::get('user/me', 'ApiController@me');
        Route::put('user/me', 'ApiController@update');

    });
});

