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


// Route::resource('product', 'ProductController');
// Login
Route::get('/', 'AdminController@view_login');
Route::post('/login', 'AdminController@login');
Route::get('/logout', 'AdminController@logout');
Route::get('/registrasiForm', 'AdminController@registrasiForm');
Route::post('/registrasi', 'AdminController@registrasi');
Route::get('/dashboard', 'ProductController@index')->middleware('auth');

Route::get('/product/bought/{id}', 'ProductController@bought');
Route::get('/product/unbought/{id}', 'ProductController@unbought');

Route::get('/product', 'ProductController@index');
Route::get('/product/create', 'ProductController@create');
Route::post('/product/store', 'ProductController@store');
Route::get('/product/edit/{id}', 'ProductController@edit');
Route::post('/product/update', 'ProductController@update');
Route::get('/product/destroy/{id}', 'ProductController@destroy');
Route::get('/product/graph', 'ProductController@grafik');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
