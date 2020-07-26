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

use Illuminate\Support\Facades\Route;

Route::get('/', 'Web\WebController@index')->name('web.index');


Route::group(['middleware' => 'web'], function () {
    Route::get('login', 'Web\WebController@login')->name('web.login');
    Route::get('header', 'Web\WebController@header')->name('web.header');
});

Route::group(['middleware' => ['web','auth']], function () {
    Route::get('perfil', 'Web\ProfileController@index')->name('web.profile');
    Route::get('perfil/ong', 'Web\ProfileController@profileOng')->name('web.profile.ong');
    Route::get('perfil/voluntario', 'Web\ProfileController@profileVoluntary')->name('web.profile.vol');
    Route::get('perfil/voluntario/{user}/edit', 'Web\ProfileController@profileVoluntaryEdit')->name('web.profile.vol.edit');
});
