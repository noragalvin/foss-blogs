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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'manage'], function() {
    Route::get('/', 'AdminController@index');
    Route::get('/users', 'UserController@index');
    Route::delete('/users/{id}', 'UserController@destroy');
});
