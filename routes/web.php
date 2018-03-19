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
Route::get('/filter', 'ProductController@getbyPrice')->name('product.price');



Route::get('/cart', 'ProductController@getcart')->name('shop.getcart');
Route::post('/cart', 'ProductController@addTocart')->name('shop.cart');
Route::delete('/cart/delete/{id}', 'ProductController@removeCart')->name('shop.delete');
Route::post('/cartDecrease', 'ProductController@removeOnecart')->name('shop.cartDecrease');
Route::post('/saveForLater/{id}', 'ProductController@saveForLater')->name('shop.saveForLater');
Route::post('/sendTocart/{id}', 'ProductController@sendTocart')->name('shop.sendTocart');
Route::post('RemovesaveForLater/{id}', 'ProductController@RemovesaveForLater')->name('shop.RemovesaveForLater');


Route::get('/sort/fixedPrice', 'ProductController@getbyFixedPrice')->name('product.priceFixed') ;
Route::get('/sort/fixedPrice2', 'ProductController@getbyFixedPrice2')->name('product.priceFixed2') ;
Route::get('/sort/fixedPrice3', 'ProductController@getbyFixedPrice3')->name('product.priceFixed3') ;
Route::get('/sort/fixedPrice4', 'ProductController@getbyFixedPrice4')->name('product.priceFixed4') ;


//check out
Route::get('/checkout', 'CheckoutController@index')->name('product.checkout');
Route::post('/checkout/post',  'CheckoutController@store')->name('product.checkoutPost'); 


//thankyou
Route::get('/thankyou', 'CheckoutController@thankyou')->name('product.thankyou');

//search
Route::get('/search/product', 'SearchController@search')->name('product.search');
Route::get('/cat/men/{cat}', 'CategoryController@catMen')->name('category.men');
Route::get('/cat/women/{cat}', 'CategoryController@catWomen')->name('category.women');
Route::get('/cat/electronics/{cat}', 'CategoryController@catElec')->name('category.electronics');
Route::get('/cat/kids/{cat}', 'CategoryController@catKids')->name('category.kids');
Route::get('/cat/toys/{cat}', 'CategoryController@catToys')->name('category.toys');
Route::get('/cat/phones/{cat}', 'CategoryController@catPhone')->name('category.phones');
Route::get('/cat/video/{cat}', 'CategoryController@catVideo')->name('category.video');


//findby slug
Route::get('/{slug}', 'ProductController@show')->name('product.show');



Route::group(['prefix'=> 'users'], function(){
    Route::get('/signup', 'UserController@getSignup')->name('user.getSignup');
    Route::get('/login', 'UserController@getLogin')->name('user.getLogin');
    Route::post('/signup', 'UserController@signup')->name('user.signup');
    Route::post('/login', 'UserController@login')->name('user.login');
    Route::get('/logout', 'UserController@logout')->name('user.logout');
    Route::get('/profile/{slug}', 'UserController@profile')->name('user.profile');
    
 
 
});







