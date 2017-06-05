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

Route::get('/rooms', 'RoomController@index');

Route::get('/rooms/mostra/{id}', 'RoomController@show')->where('id','[0-9]+');

Route::get('/rooms/add', 'RoomController@add');

Route::post('/rooms/add', 'RoomController@save');

Route::get('/rooms/delete/{id}', 'RoomController@delete')->where('id', '[0-9]+');

Route::get('/rooms/update/{id}', 'RoomController@prepareUpdate')->where('id', '[0-9]+');

Route::post('/rooms/update', 'RoomController@update');