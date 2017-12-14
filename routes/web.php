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

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/userLogin','HomeController@userOut')->name('userLogin');
Route::post('/userLogin','HomeController@userLogin')->name('userLogin');
Route::post('/login', 'HomeController@login')->name('login');

Route::redirect('/me','/home');








Route::get('/euser','userController@euser')->name('euser');
Route::post('/euser','userController@euser_post')->name('euser');


Route::get('/adminLTE','userController@adminLTE')->name('adminLTE');
//Route::post('/adminLTE','userController@adminLTE_post')->name('adminLTE');



Route::get('/product','userController@product')->name('product');
Route::post('/product','userController@product_post')->name('product');


Route::get('/package','userController@package')->name('package');
Route::post('/package','userController@package_post')->name('package');

Route::get('/rate_plan','userController@rate_plan')->name('rate_plan');
Route::post('/rate_plan','userController@rate_plan_post')->name('rate_plan');

Route::get('/time_unit','userController@time_unit')->name('time_unit');
Route::post('/time_unit','userController@time_unit_post')->name('time_unit');

Route::get('/payment_type','userController@payment')->name('payment_type');
Route::post('/payment_type','userController@payment_post')->name('payment_type');

Route::get('/sub_sum1','userController@sub_sum')->name('sub_sum1');
Route::post('/sub_sum1','userController@sub_sum_post')->name('sub_sum1');

Route::get('/sub_update','userController@sub_update')->name('sub_update');
Route::post('/sub_update','userController@sub_update_post')->name('sub_update');

Route::get('/sub_active','userController@sub_active')->name('sub_active');
Route::post('/sub_active','userController@sub_active_post')->name('sub_active');

Route::get('/sub_suspend','userController@sub_suspend')->name('sub_suspend');
Route::post('/sub_suspend','userController@sub_suspend_post')->name('sub_suspend');

Route::get('/sub_delete','userController@sub_delete')->name('sub_delete');
Route::post('/sub_delete','userController@sub_delete_post')->name('sub_delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

