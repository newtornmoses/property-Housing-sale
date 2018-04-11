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

Route::get('/', 'PropertyController@index')->name('property.home') ;
Route::get('/properties', 'PropertyController@getProperties')->name('property.fetch') ;

//email
Route::post('/emailSubscription', 'EmailController@store')->name('user.subscrption');

Route::get('/property/{property_slug}', 'PropertyController@show')->name('property.view');
Route::get('/property/single_property/{id}', 'PropertyController@showJson')->name('property.viewid');

Route::post('/property/upload', 'PropertyController@store')->name('property.store');
Route::post('/property/upload/php', 'PropertyController@store2')->name('property.store2');

Route::post('/property/update/{id}', 'PropertyController@update')->name('property.update');
Route::post('/property/delete/{id}', 'PropertyController@destroy')->name('property.delete');

Route::get('/user/fetch/{id}', 'MessageController@index')->name('user.fetch');
Route::get('/user/message/{property_slug}/uploader', 'MessageController@create')->name('user.message')->middleware('auth');


Route::post('/user/message/{id}', 'MessageController@store')->name('user.messageSend');
Route::put('/user/message/delete/{id}', 'MessageController@delete')->name('user.messageDelete');
Route::patch('/user/message/update/{id}', 'MessageController@update')->name('user.editMessage');
  





Route::get('/jsonprofile/{slug}', 'UserController@jsonprofile')->name('user.jsonProfile');

Route::group(['prefix'=> 'users'], function(){
    Route::get('/signup', 'UserController@getSignup')->name('user.getSignup');
    Route::get('/login', 'UserController@getLogin')->name('login');
    Route::post('/signup', 'UserController@signup')->name('user.signup');
    Route::post('/login', 'UserController@login')->name('user.login');
    Route::get('/logout', 'UserController@logout')->name('user.logout');
    Route::get('/profile/{slug}', 'UserController@profile')->name('user.profile')->middleware('auth');

});







