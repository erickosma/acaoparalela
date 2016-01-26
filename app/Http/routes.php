<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');


    // Event::fire(new \App\Events\AccesUser('teste'));
    Event::subscribe(\App\Listeners\LogAccessListeners::class);

    DB::listen(
        function ($sql) {
            dd($sql);
            //  $sql - select * from `ncv_users` where `ncv_users`.`id` = ? limit 1
            //  $bindings - [5]
            //  $time(in milliseconds) - 0.38
        }
    );
});



