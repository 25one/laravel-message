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
| Front
|--------------------------------------------------------------------------|
*/
Route::prefix('')->namespace('Front')->group(function () {
	Route::name('home')->get('/', 'ShopController@index');
	Route::name('product')->get('/product/{id}', 'ShopController@product');

    Route::middleware('auth')->group(function () {  //!!!ONLY AUTH-USERS
		Route::name('cart')->get('/cart', 'ShopController@cart');
		Route::name('tocart')->post('/tocart', 'ShopController@tocart');
		Route::name('clearall')->post('/clearall', 'ShopController@clearall');
		Route::name('clearone')->post('/clearone', 'ShopController@clearone');
    });

	Route::name('mailer')->post('/mailer', 'ShopController@mailer');
});

/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------|
*/
Route::prefix('')->middleware('admin')->namespace('Back')->group(function () {
   Route::name('dashboard')->get('/dashboard', 'AdminController@index');
   Route::resource('products', 'AdminController'); //!!!products
   Route::name('upload')->post('/products/create', 'AdminController@upload'); //!!!upload
});


