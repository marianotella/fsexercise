<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider. Enjoy building your API!
|
*/

Route::get('/items', 'ItemController@index');
Route::post('/items/store', 'ItemController@store');
Route::post('/items/update/{item}', 'ItemController@update');
Route::delete('/items/destroy/{item}', 'ItemController@destroy');
Route::post('/items/reorder', 'ItemController@reorder');