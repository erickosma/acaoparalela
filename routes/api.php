<?php

use Illuminate\Http\Request;
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


Route::middleware('auth.jwt')->get('/me', function (Request $request) {
    return $request->user();
});
*/



Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'Api\AuthController@login')->name('login');
    Route::get('logout', 'Api\AuthController@logout')->name('logout');
    Route::post('refresh', 'Api\AuthController@refresh')->name('refresh');
    Route::get('me', 'Api\AuthController@me')->name('me');
    Route::post('register', 'Api\AuthController@register')->name('register');

    /**
     * Profile
     */

    Route::post('user/{user}', 'Api\UserController@update')->name('api.user.update');
});

