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

Route::get('/', 'WebController@index')->name('web.index');


Route::group(['middleware' => 'web'], function () {
    Route::get('login', 'WebController@login')->name('web.login');
    Route::get('profile', 'WebController@profile')->name('web.profile');
    Route::get('header', 'WebController@header')->name('web.header');
    Route::get('t', 'WebController@testPass')->name('web.t');
});
