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

/*Home*/
Route::get('/','GenresController@index');//Logout
Route::get('/index', 'GenresController@index');//Register & Login
Route::get('/genres/{genreName}', 'GenresController@show');

/*Movies*/
Route::resource('movies', 'MoviesController');
Route::post('/movies/orderby','MoviesController@order');

/*Actors*/
Route::resource('actors', 'ActorsController');

/*Auth*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
