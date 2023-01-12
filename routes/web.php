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
Route::get('home', 'HomeController@index')->name('home');

Auth::routes();


//ログアウト中のページ
Route::get('login', 'Auth\LoginController@login');
Route::post('login', 'Auth\LoginController@login');

Route::get('register', 'Auth\RegisterController@register');
Route::post('register', 'Auth\RegisterController@register');


Route::get('added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('top','PostsController@index');

Route::get('profile','UsersController@profile');

Route::get('search','UsersController@index');


//postにアクセスされたら
Route::get('post','PostsController@showTimeLine');


//新規ツイート画面から投稿
Route::post('post/create','PostsController@create');

//編集画面へ飛ぶ
// Route::get('post/{id}/update-form','PostsController@updateForm');

//編集する
Route::post('post/update','PostsController@update');


//ホームからツイート削除
Route::get('post/{id}/delete','PostsController@delete');


//フォロー・フォロワーリストへ飛ぶ
Route::get('follow-list','FollowsController@followlist');
Route::get('follower-list','FollowsController@followerlist');


//ユーザーをフォローする
Route::post('follow/create','FollowsController@follow');

//ユーザーフォローを外す
Route::post('follow/delete','FollowsController@unfollow');

//ユーザー検索画面へ飛ぶ
Route::get('search-page','PostsController@searchPage');

//ユーザー検索をする
Route::post('search','PostsController@search');

//他のユーザーのプロフィールを表示
Route::get('post/{id}/profile','PostsController@profile');

//自分のプロフィールを表示
Route::get('myprofile','PostsController@myProfile');

//自分のプロフィールを編集
Route::post('post/pf-update','PostsController@pfUpdateForm');



Route::get('logout','Auth\LoginController@logout');



