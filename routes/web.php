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

Route::get('/admin/users/{id}', 'AdminPageController@show')->middleware('admin');
Route::resource('/admin/users', 'AdminPageController')->middleware('admin');
Route::patch('/admin/users/{id}/edit', 'AdminPageController@update')->middleware('admin');

//Route::get('/users', 'AdminPageController@index');
//Route::get('/users/{id}', 'AdminPageController@show');
//Route::get('/users/{id}/edit', 'AdminPageController@edit')->name('users.edit');
//Route::patch('/users/{id}/edit', 'AdminPageController@update');



Route::get('api/tweets', 'PostController@tweets');
Route::get('api/userstweets', 'PostController@userstweets');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('tweet/save', 'PostController@store');
Route::get('users/{user}', 'UserController@show')->name('user.show');
Route::get('users/{user}/follow', 'UserController@follow')->name('user.follow');
Route::get('users/{user}/unfollow', 'UserController@unfollow')->name('user.unfollow');

Route::get('posts', 'PostController@index')->name('posts.index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

