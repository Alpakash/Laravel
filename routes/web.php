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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index' );
Route::get('/news', 'HomeController@news');
Route::get('/faq', 'HomeController@faq');
Route::get('/scores', 'HomeController@scores');


Route::get('/error', 'TestController@error');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('welcome', 'TestController@index');
    });
});

Route::get('/profile', 'AccountController@profile')->name('home');
Route::get('/judge', 'AccountController@judge');

Route::post('/register', 'Auth\RegisterController@register');

Route::get('/tableSize', 'TempController@tableSize');
Route::get('/tournamentPoints', 'TempController@tournamentPoints');
Route::get('/points', 'TempController@points');
Route::get('/tablesPreliminaryRoundRandom', 'TempController@tablesPreliminaryRoundRandom');
Route::get('/tablesPreliminaryRoundFromPoints', 'TempController@tablesPreliminaryRoundFromPoints');
Route::get('/tablesKnockout', 'TempController@tablesKnockout');

// Routes voor de countdown timer create, pause, resume and reset
Route::post('/countdown', 'CountdownController@create');
Route::post('/cdpause', 'CountdownController@pause');
Route::post('/cdpause2', 'CountdownController@pause2');
Route::post('/cdresume', 'CountdownController@resume');
Route::post('/cdreset', 'CountdownController@reset');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('welcome', 'TestController@index');
    });
});


// Als je route sparkpost bezoekt wordt er een mail gestuurd met
// de layout uit views/emails/test.blade.php
Route::get('/sparkpost', function () {
    Mail::send('emails.test', [], function ($message) {
      $message
        ->from('info@bounces.veggiecoder.com', 'Kakashi')
        ->to('akash.soedamah@gmail.com', 'Akashhhh')
        ->subject('From SparkPost with ❤');
    });

    return redirect('/');
  });