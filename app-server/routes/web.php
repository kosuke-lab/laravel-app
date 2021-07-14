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

//トップページ（市区町村選択一覧表示）
Route::get('/', 'PostController@index')->name('city.list');

//サービス紹介アバウトページ
Route::get('/about', 'PostController@about')->name('about');

//サービス紹介アバウトページ
Route::get('/service', 'PostController@service')->name('service');

//新規投稿フォーム作成
Route::get('/new', 'PostController@create')->name('post.new');

//新規投稿フォームデータ保存
Route::post('/store', 'PostController@store')->name('post.store');

// 管理者ページ表示
Route::get('/admin', 'PostController@admin')->name('admin');

// 管理者投稿編集フォーム作成
Route::get('/admin/edit/{post_id}', 'PostController@admin_edit')->name('admin.edit');

// 管理者投稿編集フォーム保存
Route::post('/admin/update/{post_id}', 'PostController@admin_update')->name('admin.update');

// ログイン時のhome
Route::get('/home', 'HomeController@index')->name('home');

// SNSログイン時のリダイレクト先
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');

// SNSログイン時のコールバックURL
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//一般ユーザー編集フォーム
Route::get('/edit/{post_id}', 'PostController@edit')->name('post.edit');

//一般ユーザー編集保存
Route::post('/update/{post_id}', 'PostController@update')->name('post.update');

//マイページ投稿一覧表示
Route::get('/mypage/{user_id}', 'PostController@getuser')->name('mypage');

//マイページお気に入り表示
Route::get('/mypage/{user_id}/favorite', 'PostController@favorite')->name('favorite');

//市区町村選択後、カテゴリー表示
Route::get('/{city_id}', 'PostController@category')->name('category.list');

//市区町村*カテゴリーのランダム結果
Route::post('/result', 'PostController@result')->name('post.list');

// パスワードリセットのためのemail入力
Route::get('password/reset',  'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

// トークンURLが書かれたメール送信
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

// トークンURLから新規パスワード入力画面
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

// 実際のパスワード上書き処理
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



