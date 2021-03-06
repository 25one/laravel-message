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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------|
*/
// Home
Route::prefix('')->namespace('Front')->group(function () {
   Route::name('home')->get('/', 'MessageController@index');
   //Route::resource('newmessages', 'MessageController')->middleware('auth');
   Route::resource('newmessages', 'MessageController');
});

/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------|
*/
Route::prefix('')->middleware('auth')->namespace('Back')->group(function () {
//Route::prefix('')->namespace('Back')->group(function () {
   //Route::name('dashboard')->get('/dashboard', 'AdminController@index')->middleware('admin');
	Route::name('dashboard')->get('/dashboard', 'AdminController@index');
    //Route::resource('cards', 'AdminController')->middleware('admin');
    Route::resource('messages', 'AdminController');
});
