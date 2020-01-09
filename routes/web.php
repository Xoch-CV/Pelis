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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/index', function () {
    return view('index');
});*/

Route::get('/','GenresController@index');

Route::get('/index', 'GenresController@index');
Route::get('/genres/{genreName}', 'GenresController@show');

Route::get('/movies','MoviesController@index');
Route::get('/movies/{movie}','MoviesController@show');

Route::get('/actors','ActorsController@index');
Route::get('/actors/{actor}','ActorsController@show');
Route::get('/addactor', 'ActorsController@create');
Route::post('/actors', 'ActorsController@store');

Route::get('/editactor','ActorsController@edit');
Route::patch('/updateactor', 'ActorsController@update');
Route::delete('/deleteactor','ActorsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
