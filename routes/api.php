<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth:api'], function () {
    Route::put('user/{id}', 'UserController@update');
    Route::get('users', 'UserController@retreave');
    Route::get('user/{id}', 'UserController@retreaveById');
    Route::delete('user/{id}', 'UserController@delete');
    Route::post('logout', 'AuthController@logout');
});

Route::post('user', 'UserController@create');
Route::post('login', 'AuthController@login');
