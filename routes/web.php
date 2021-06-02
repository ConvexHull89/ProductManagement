<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['middleware'=>'user','auth'] ,function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/cart/{id}', 'HomeController@cart')->name('cart');
Route::patch('/user/order/{id}','HomeController@order')->name('order');
Route::get('/user/invoice','HomeController@invoice')->name('invoice');
});
Route::group(['middleware'=>'admin','auth'] ,function(){
Route::get('/admin/home', 'AdminController@index')->name('admin');
Route::get('/admin/category','AdminController@viewcategory')->name('crecategory');
Route::post('/admin/postcategory','AdminController@createcategory')->name('postcategory');
Route::get('/admin/product','AdminController@viewproduct')->name('creproduct');
Route::post('/admin/postproduct','AdminController@createproduct')->name('createproduct');
Route::get('/admin/editproduct/{id}','AdminController@editproduct')->name('editproduct');
Route::patch('/admin/updateproduct/{id}','AdminController@upproduct')->name('upproduct');
Route::delete('/admin/deleteproduct/{id}','AdminController@destroy')->name('delproduct');
});