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

/*Home*/
Route::get('/','GenresController@index');//Logout
Route::get('/index', 'GenresController@index');//Register & Login
Route::get('/genres/{genreName}', 'GenresController@show');

/*Movies*/
Route::resource('movies', 'MoviesController');
/*Route::get('/movies','MoviesController@index');
Route::get('/movies/{movie}','MoviesController@show');
Route::get('/addmovie', 'MoviesController@create');
Route::post('/movies', 'MoviesController@store');
Route::get('/editmovie','MoviesController@edit');

Route::patch('/updatemovie', ['uses' => 'MoviesController@update']);
//Route::put('/movie/{movieid}', 'MoviesController@update');
Route::delete('/deletemovie','MoviesController@destroy');*/

/*Actors*/
Route::get('/actors','ActorsController@index');
Route::get('/actors/{actor}','ActorsController@show');
Route::get('/addactor', 'ActorsController@create');
Route::post('/actors', 'ActorsController@store');

Route::get('/editactor','ActorsController@edit');
Route::patch('/updateactor', 'ActorsController@update');
Route::delete('/deleteactor','ActorsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
