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

// Routes for authentication
Route::auth();

// Route to show login buttons and home welcome screen
Route::get('/', function () { return view('welcome'); })->middleware('guest');

// Home controller routes
Route::get('/profile/{user}', 'HomeController@index')->name('profile');
Route::get('players', 'UsersController@index')->middleware('auth');
Route::get('/stats/{user}', 'HomeController@stats');
Route::get('/games2', 'HomeController@games2');

// Route to delete temp user via delete method
Route::delete('/temp_users/{user}', 'Temp_userController@destroy');

// Routes for Users CRUD
Route::resource('users', 'UsersController');

// Games routes
Route::get('games', 'GamesController@index')->middleware('auth');

// Routes for Battles CRUD
Route::resource('battles', 'BattlesController')->except(['store', 'create', 'edit', 'destroy'])->middleware('auth');
Route::get('battles/{id}/create', 'BattlesController@create'); // Route to create battle form
Route::get('battles/game/2003', 'HomeController@got'); // GOT 2003 is release_date
Route::get('battles/game/2005', 'HomeController@wow'); // WOW 2005 is release_date
Route::get('battles/game/2000', 'HomeController@lotr'); // LOTR 2000 is release_date

Route::post('battles/{id}', 'BattlesController@store'); // Post route to store battle scores
