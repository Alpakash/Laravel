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


Route::get('/', 'HomeController@index' );

Route::get('countdown', 'TestController@response');

Route::get('error', 'TestController@error');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('welcome', 'TestController@index');
    });
});

Route::get('profile', 'HomeController@index')->name('home');

Route::get('news', 'HomeController@news');
Route::get('faq', 'HomeController@faq');
Route::get('scores', 'HomeController@scores');
Route::get('admins', 'HomeController@admins');
Route::get('mail', 'HomeController@mail');
Route::get('judge', 'HomeController@judge');

Route::post('register', 'Auth\RegisterController@register');

Route::post('/countdown', 'CountdownController@create');
Route::post('/cdpause', 'CountdownController@pause');
Route::post('/cdpause2', 'CountdownController@pause2');
Route::post('/cdreset', 'CountdownController@reset');
Route::post('/cdresume', 'CountdownController@resume');

