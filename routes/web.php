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

Route::get('/addproduct', 'ProductController@add');
Route::post('/addproduct', 'ProductController@addpost');

//storage
Route::get('/addstorage', 'StorageController@add');
Route::get('/checkproduct', 'StorageController@check');
Route::get('/updatekho', 'StorageController@update');

//ajax-demo
Route::get('/demoajax', 'StorageController@ajaxdemo');
Route::get('/ajax', 'StorageController@ajax');

//ban hang
Route::get('/order-add', 'OrderController@orderadd');
Route::post('/addorder', 'OrderController@addnew');
Route::get('/checkproduct', 'OrderController@checkproduct');