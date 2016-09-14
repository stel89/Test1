<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/', 'PhoneController');
Route::post('/{id}/edit', 'PhoneController@edit');
Route::delete('/{id}', 'PhoneController@destroy');
Route::put('/{id}', 'PhoneController@update');


Route::auth();

Route::get('/home', 'HomeController@index');
