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

Route::group(['prefix' => 'manage'], function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::resource("users", "UserController");

});
