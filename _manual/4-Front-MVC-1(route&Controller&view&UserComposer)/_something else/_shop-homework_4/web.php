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

//Route::get('/home', 'HomeController@index')->name('homelogin');


/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------|
*/
Route::prefix('')->namespace('Front')->group(function () {

	Route::name('home')->get('/', 'ShopController@index');
	Route::name('product')->get('/product/{id}', 'ShopController@product');
	
    Route::middleware('auth')->group(function () {  //!!!ONLY AUTH-USERS
	   Route::name('cart')->get('/cart', 'ShopController@cart');
	   Route::name('tocart')->post('/tocart', 'ShopController@tocart');
	   Route::name('clearall')->post('/clearall', 'ShopController@clearall');
	   //Route::name('removeone')->post('/removeone', 'ShopController@removeone');
	   Route::name('removeone')->get('/removeone/{id}', 'ShopController@removeone'); //for Policy - removeone/5 (id=5 (for example) - not his)
	   Route::name('messages')->get('/messages', 'MessageController@index');	   
    });

	Route::name('subscribe')->post('/subscribe', 'ShopController@subscribe'); //subscribe

});

/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------|
*/
Route::prefix('')->namespace('Back')->group(function () {

   Route::middleware('admin')->group(function () {
      //Route::name('dashboard')->get('/dashboard', 'AdminController@index')->middleware('admin');
	  Route::name('dashboard')->get('/dashboard', 'AdminController@index');
      Route::resource('products', 'AdminController');	
      Route::name('upload')->post('/products/create', 'AdminController@upload');           
   });   

});


