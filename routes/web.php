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

Route::get('/', 'Dashboard@index')->name('dashboard');

Auth::routes(['verify' => true]);

Route::name('admin.')->group(function ()
{
	Route::group(['prefix' => 'admin'], function ()
	{
		Route::resource('products', 'Admin\ProductController')->middleware('verified');
		Route::resource('orders', 'Admin\OrderController')->middleware('verified');
	});
});

Route::group(['prefix' => 'admin'], function ()
{
	Route::get('/delete/{id}', 'Admin\ProductController@destroy')->name('admin.products.delete');
	Route::post('/update/{id}', 'Admin\ProductController@update')->name('admin.products.update');
});

Route::group(['prefix' => 'carts'], function ()
{
	Route::get('/', 'CartController@index')->name('cart');
	Route::get('/add/{id}', 'CartController@add')->name('cart.add');
	Route::get('/update', 'CartController@update')->name('cart.update');	
	Route::get('/remove', 'CartController@destroy')->name('cart.remove');	
	// Route::get('/update/{id}/{qty}', 'CartController@update')->name('cart.update');	
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/detail/{id}', 'Dashboard@show')->name('detail');
Route::post('/detail/{id}', 'ProductReviewsController@store')->name('detail.review');

Route::group(['prefix' => 'products'], function ()
{
	Route::get('/', 'Dashboard@products')->name('products');
});

Route::group(['prefix' => 'ajax'], function ()
{
	Route::get('/ajax-product', 'AjaxRequest@product_sort_by')->name('ajax.products.sort');
	Route::get('/ajax-product-user', 'AjaxRequest@product_user_sort_by')->name('ajax.products.user.sort');
	Route::get('/ajax-product-review', 'AjaxRequest@product_review')->name('ajax.products.review');
});



