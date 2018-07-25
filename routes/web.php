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

Route::get('/', 'FrontendController@index')->name('home');

Route::get('/home', 'FrontendController@index')->name('home');

Route::get('/posts/{slug}', 'FrontendController@singlePost')->name('posts.single');

Route::get('/categories/{category}', 'FrontendController@categoryPosts')->name('category.posts');

Route::get('/tags/{tag}', 'FrontendController@tagPosts')->name('tag.posts');

Route::get('/search/result', 'FrontendController@search')->name('search.result');

Auth::routes();


Route::middleware('auth')->group(function () {
   
});
