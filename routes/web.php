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


Route::group(['middleware' => 'auth'], function(){
	Route::get('/','EnvironmentController@index');
});

Route::group(['middleware' => 'auth','prefix'=> '/environment'], function() {
	Route::get('/', 'EnvironmentController@index');

	Route::get('mostra/{id}', 'EnvironmentController@show')->where('id','[0-9]+');

	Route::get('add', 'EnvironmentController@add');	

	Route::post('add', 'EnvironmentController@save');

	Route::get('delete/{id}', 'EnvironmentController@delete')->where('id', '[0-9]+');

	Route::get('update/{id}', 'EnvironmentController@prepareUpdate')->where('id', '[0-9]+');

	Route::post('update', 'EnvironmentController@update');

});

Route::group(['middleware' => 'auth', 'prefix' => '/payment'], function() {

	Route::get('/', 'PaymentController@index');

	Route::get('/submit/{id}', 'PaymentController@submit');
	
});

Route::group(['middleware' => 'auth', 'prefix' => '/room'], function() {

	Route::get('/', 'RoomController@index');

	Route::post('/', 'RoomController@add');

});

Route::group(['middleware' => 'auth', 'prefix' => '/add'], function() {
	Route::get('/', 'IndexController@index');
});

Auth::routes();
