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

Route::get('/', 'ProductController@index')->name('shop.home') ;

Route::get('/{slug}', 'ProductController@show')->name('product.show') ;



Route::get('/sort/fixedPrice', 'ProductController@getbyFixedPrice')->name('product.priceFixed') ;
Route::get('/sort/fixedPrice2', 'ProductController@getbyFixedPrice2')->name('product.priceFixed2') ;
Route::get('/sort/fixedPrice3', 'ProductController@getbyFixedPrice3')->name('product.priceFixed3') ;
Route::get('/sort/fixedPrice4', 'ProductController@getbyFixedPrice4')->name('product.priceFixed4') ;


Route::post('/sort/manualFilter', 'ProductController@getbyPrice')->name('product.price') ;





