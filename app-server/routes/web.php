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

Route::get('/', 'CityController@index')->name('city.list');
Route::get('/new', 'PostController@create')->name('post.new');
Route::post('/store', 'PostController@store')->name('post.store');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{id}', 'CityController@show')->name('category.list');
Route::get('/{id}/{category_id}/result', 'PostController@index')->name('post.list');






