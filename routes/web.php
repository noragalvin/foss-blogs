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

Route::get('/', 'ClientController@index')->name('home');

Route::get('login','LoginController@getLogin')->name('getLogin');
Route::post('login','LoginController@postLogin')->name('postLogin');
Route::get('register', 'LoginController@getRegister')->name('getRegister');
Route::post('register', 'LoginController@postRegister')->name('postRegister');
Route::get('logout', 'LoginController@getLogout')->name('getLogout');


Route::get('profile/{id}', 'ClientController@profile')->name('getProfile');
Route::post('profile/{id}', 'ClientController@updateProfile')->name('postProfile');

Route::get('category/{id}', 'ClientController@postsByCategory')->name('postsByCategory');
Route::get('post/{id}', 'ClientController@singlePost')->name('singlePost');
Route::get('user/{id}/posts', 'ClientController@userPosts')->name('getUserPosts');

Route::resource("comments", "CommentController");


Route::group(['prefix' => 'manage', 'middleware' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::resource("users", "UserController");
    Route::resource("categories", "CategoryController");
    Route::resource("posts", "PostController");
});
