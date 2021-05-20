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

Route::get('/', 'PostController@index')->name('city.list');
Route::get('/new', 'PostController@create')->name('post.new');
Route::post('/store', 'PostController@store')->name('post.store');
Route::get('/admin', 'PostController@admin')->name('admin');
Route::get('/admin/edit/{post_id}', 'PostController@admin_edit')->name('admin.edit');
Route::post('/admin/update/{post_id}', 'PostController@admin_update')->name('admin.update');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/edit/{post_id}', 'PostController@edit')->name('post.edit');
Route::post('/update/{post_id}', 'PostController@update')->name('post.update');

Route::get('/mypage/{user_id}', 'PostController@getuser')->name('mypage');
Route::get('/{city_id}', 'PostController@category')->name('category.list');
Route::get('{city_id}/result/{category_id}', 'PostController@result')->name('post.list');



// パスワードリセットのためのemail入力
Route::get('password/reset',  'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// トークンURLが書かれたメール送信
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// トークンURLから新規パスワード入力画面
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// 実際のパスワード上書き処理
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



