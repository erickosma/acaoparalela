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


*/



Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('login', 'Api\AuthController@login')->name('login');
    Route::get('logout', 'Api\AuthController@logout')->name('logout');
    Route::post('refresh', 'Api\AuthController@refresh')->name('refresh');
    Route::get('me', 'Api\AuthController@me')->name('me');
    Route::post('register', 'Api\AuthController@register')->name('register');
});

Route::group(['middleware' => ['api', 'auth'], 'prefix' => 'user'], function () {

    Route::put('/{user}', 'Api\UserController@update')->name('api.user.update');
    Route::post('/skill', 'Api\SkillController@update')->name('api.skill.update');

});


Route::group(['middleware' => ['api', 'auth'], 'prefix' => 'voluntary'], function () {

    Route::put('/{user}', 'Api\VoluntaryController@update')->name('api.voluntary.update');

});

