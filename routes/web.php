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

Route::get('/euser','userController@euser')->name('euser');
Route::post('/euser','userController@euser_post')->name('euser');


Route::get('/product','userController@product')->name('product');
Route::post('/product','userController@product_post')->name('product');

Route::get('/time_unit','userController@time_unit')->name('time_unit');
Route::post('/time_unit','userController@time_unit_post')->name('time_unit');


Route::get('/sub_sum','userController@sub_sum')->name('sub_sum');
Route::post('/sub_sum','userController@sub_sum_post')->name('sub_sum');Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

