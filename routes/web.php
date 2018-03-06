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

Route::get('/', 'PostController@index')->name('post.home') ;

Route::get('/{id}','PostController@show' )->name('post.show');

Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('/post', 'PostController@store')->name('post.post');

Route::post('/update/{id}', 'PostController@update')->name('post.update');

Route::post('/delete/{id}', 'PostController@destroy')->name('post.delete');
Route::post('/comment/{id}', 'commentController@store')->name('post.comment');


//users
Route::group(['prefix' => 'users'], function() {
    Route::get('/signup', 'UserController@index')->name('user.signup');
    Route::post('/signup', 'UserController@registerUser')->name('user.singupPost');
    Route::get('/logout', 'UserController@logout' )->name('user.logout');
    Route::get('/login', 'UserController@getLogin')->name('user.getlogin');
  
    Route::post('/login', 'UserController@login')->name('user.login');
    Route::get('/Userprofile', 'UserController@Userprofile')->name('user.profile');
    Route::get('/Userprofile/{id}', 'UserController@UserprofileId')->name('user.profilebyId');
    
    
    
    


});



