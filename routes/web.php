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

Route::get('/', function () {
    return redirect('/rooms');
});

Route::group(['middleware' => 'auth','prefix'=> '/rooms'], function() {
	Route::get('/', 'RoomController@index');

	Route::get('mostra/{id}', 'RoomController@show')->where('id','[0-9]+');

	Route::get('add', 'RoomController@add');	

	Route::post('add', 'RoomController@save');

	Route::get('delete/{id}', 'RoomController@delete')->where('id', '[0-9]+');

	Route::get('update/{id}', 'RoomController@prepareUpdate')->where('id', '[0-9]+');

	Route::post('update', 'RoomController@update');

});

Route::group(['middleware' => 'auth', 'prefix' => '/payment'], function() {

	Route::get('/', 'PaymentController@index');

	Route::post('/submit', 'PaymentController@submit');
	
});


Auth::routes();
