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
Route::get('/home', 'HomeController@index' );

Route::get('countdown', 'TestController@response');

Route::get('error', 'TestController@error');

Route::get('profile', 'HomeController@index')->name('home');

Route::get('news', 'HomeController@news');
Route::get('faq', 'HomeController@faq');
Route::get('scores', 'HomeController@scores');
Route::get('admins', 'HomeController@admins');
Route::get('mail', 'HomeController@mail');
Route::get('judge', 'HomeController@judge');
Route::get('projects', 'ProjectsController@index');


Route::post('register', 'Auth\RegisterController@register');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/error', 'TestController@error');

Auth::routes();

Auth::routes(['verify' => true]);


// Check if any user is loged in
Route::group(['middleware' => 'auth'], function(){
    // Access for only the admin
    Route::group(['middleware' => ['admin']], function(){
        // admin dashboard
        Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/admin/add', 'AdminController@create');

        // admin users
        Route::get('/admin/deelnemers/', 'AdminUserController@index');
        Route::get('/admin/deelnemers/{id}', 'AdminUserController@details');
        Route::get('/admin/deelnemers/{id}/edit', 'AdminUserController@edit');

        Route::post('/admin/deelnemers/{id}/edit', 'AdminUserController@store');
        Route::post('/admin/add', 'AdminController@store');

        // admin judges
    });
});


Route::get('/welcome', 'TestController@index');
Route::get('/profile', 'AccountController@profile')->name('home');
Route::get('/judge', 'AccountController@judge');

Route::post('/register', 'Auth\RegisterController@register');

Route::resource('/judge','JudgeController');
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

Route::resource('/score', 'ScoreInputController', [
    'except' => ['edit', 'show', 'store']
]);

// Als je route sparkpost bezoekt wordt er een mail gestuurd met
// de layout uit views/emails/test.blade.php
/*Route::get('/sparkpost', function () {
    Mail::send('emails.test', [], function ($message) {
        $message
            ->from('info@bounces.veggiecoder.com', 'Kakashi')
            ->to('nguyen.netwerk@gmail.com', 'Akashhhh')
            ->subject('From SparkPost with ❤');
    });

    return redirect('/');
});*/

