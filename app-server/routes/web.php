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


Auth::routes();

Route::get('/city_add', 'PostController@city_add')->name('city.add');
Route::post('/city_store', 'PostController@city_store')->name('city.store');

Route::get('/', 'PostController@index')->name('city.list');
Route::get('/new', 'PostController@create')->name('post.new');
Route::post('/store', 'PostController@store')->name('post.store');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{city_id}', 'PostController@category')->name('category.list');
Route::get('{city_id}/result/{category_id}', 'PostController@result')->name('post.list');






