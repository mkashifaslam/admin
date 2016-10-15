<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//video Resources
/********************* video ***********************************************/
Route::get('video','\App\Http\Controllers\VideoController@index');
Route::get('video/upload','\App\Http\Controllers\VideoController@upload');
Route::post('video/uploadVideo','\App\Http\Controllers\VideoController@uploadVideo');
Route::post('video/{id}/update','\App\Http\Controllers\VideoController@update');
Route::get('video/{id}/delete','\App\Http\Controllers\VideoController@destroy');
Route::get('video/{id}/deleteMsg','\App\Http\Controllers\VideoController@DeleteMsg');
/********************* video ***********************************************/
