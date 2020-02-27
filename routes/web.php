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



Auth::routes();

############# ADMİN DASHBOARD ROUTES ##################

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function () {

    ########### Admin Operations Route ##############
    Route::get('/auth/login','LoginController@showLoginForm')->name('login');
    Route::post('/auth/login','LoginController@login');
    Route::post('/auth/logout','LoginController@logout')->name('logout');

    Route::get('/admin/create','AdminController@create')->name('create');
    Route::post('/admin/create','AdminController@store');

    Route::get('/admin/{id}/edit','AdminController@edit')->name('edit');
    Route::post('/admin/{id}/edit','AdminController@update');

    Route::get('/admin/destroy/{id}','AdminController@destroy')->name('destroy');

    ##################### User Operations Route ###################
    Route::get('/user','UserController@index')->name('users');

    Route::get('/user/create','UserController@create')->name('user.create');
    Route::post('/user/create','UserController@store');

    Route::get('/user/{id}/edit','UserController@edit')->name('user.edit');
    Route::post('/user/{id}/edit','UserController@update');

    Route::get('/user/destroy/{id}','UserController@destroy')->name('user.destroy');

    Route::get('/user/loginAsUser/{id}','UserController@loginAsUser')->name('loginAsUser');

    Route::get('/','AdminController@index');
    Route::get('/admin','AdminController@index')->name('dashboard');

    });

############# USER WEB ROUTES ##################

Route::name('user.')->namespace('User')->group(function () {

    Route::get('/auth/login','LoginController@showLoginForm')->name('login');
    Route::post('/auth/login','LoginController@login');
    Route::post('/auth/logout','LoginController@logout')->name('logout');

    Route::get('/auth/register','UserController@create')->name('register');
    Route::post('/auth/register','UserController@store');

    Route::get('/user/{id}/edit','UserController@edit')->name('edit');
    Route::post('/user/{id}/edit','UserController@update');

    Route::get('/user','UserController@index')->name('profile');

    });


Route::get('/','HomeController@index')->name('home');