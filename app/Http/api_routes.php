<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/





//Route::resource('professionals', 'UserProfessionalAPIController');



Route::resource('userOngs', 'UserOngAPIController');

//Route::resource('userConfigs', 'UserConfigAPIController');

//Route::resource('userConfigs', 'UserConfigAPIController');

Route::resource('enderecos', 'EnderecoAPIController');

Route::resource('telefones', 'TelefoneAPIController');

Route::resource('userAreaAtuacaos', 'UserAreaAtuacaoAPIController');

Route::resource('sysAreaAtuacaos', 'SysAreaAtuacaoAPIController');

Route::resource('sysAreaAtuacaoManuals', 'sysAreaAtuacaoManualAPIController');

//Route::resource('userImgs', 'userImgAPIController');



Route::resource('ajudas', 'AjudaAPIController');