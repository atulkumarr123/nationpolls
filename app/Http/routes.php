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
//Route::get('polls/onlyatulcancreate', 'NationNationPollsController@create');
//Route::get('polls/{id}','NationNationPollsController@show');
Route::post('polls','NationPollsController@store');
Route::post('polls/{id}','NationPollsController@update');
Route::get('search', 'NationPollsControllerForCustomOperations@search');
Route::patch('/{id}','NationPollsController@updatePolledData');
Route::get('/filter/{category}', 'NationPollsControllerForCustomOperations@filterPollsBasedOnCategory');
Route::get('/countries', 'NationPollsController@countries');
Route::get('polls/create', ['middleware'=>'auth:create', 'uses'=>'NationPollsController@create']);
Route::get('polls/{id}',['middleware'=>'auth:show', 'uses'=>'NationPollsController@show']);
Route::get('polls/{id}/edit',['middleware'=>'auth:edit', 'uses'=>'NationPollsController@edit']);
Route::get('polls/{id}/delete',['middleware'=>'auth:delete', 'uses'=>'NationPollsController@destroy']);


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout');
//// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
//password reset dummy page (work needs to be done)
Route::controllers([
    'password' => 'Auth\PasswordController',
]);







