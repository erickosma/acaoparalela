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


    /*
    |--------------------------------------------------------------------------
    | API routes
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
        Route::group(['prefix' => 'v1'], function () {
            require config('infyom.laravel_generator.path.api_routes');
        });
    });


    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
    Route::get('password/reset', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');

    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

    // Event::fire(new \App\Events\AccesUser('teste'));
//    Event::subscribe(\App\Listeners\LogAccessListeners::class);

  /*  DB::listen(
        function ($sql) {
           // var_dump($sql->sql);
            //var_dump($sql->bindings);

            //  $sql - select * from `ncv_users` where `ncv_users`.`id` = ? limit 1
            //  $bindings - [5]
            //  $time(in milliseconds) - 0.38
        }
    );
*/
});





