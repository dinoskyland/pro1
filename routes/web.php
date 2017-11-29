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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userLogin','HomeController@userOut')->name('userLogin');
Route::post('/userLogin','HomeController@userLogin')->name('userLogin');
Route::post('/login', 'HomeController@login')->name('login');

Route::redirect('/me','/home');

Route::get('/user','userController@show')->name('user');

Route::get('/userList','userController@userList')->name('userList');
