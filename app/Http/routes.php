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

Route::get('/','NationPollsController@index');
Route::get('/home','NationPollsController@index');
Route::get('/{id}','NationPollsController@index');
Route::patch('/{id}','NationPollsController@update');
Route::get('/filter/{category}', 'NationPollsController@filterPollsBasedOnCategory');


