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


Route::get('/', 'ProductController@index');
Route::get('/dashboard', 'ProductController@index');

Route::get('/product', 'ProductController@index');
Route::get('/product/create', 'ProductController@create');
Route::post('/product/store', 'ProductController@store');
Route::get('/product/edit/{id}', 'ProductController@edit');
Route::post('/product/update', 'ProductController@update');
Route::get('/product/destroy/{id}', 'ProductController@destroy');

// Login
Route::get('/login', 'ProductController@login');
