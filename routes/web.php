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

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    // Dashboard Routes 
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    // Categories Routes 
    Route::resource('categories', 'CategoriesController');

    // Tags Routes 
    Route::resource('tags', 'TagsController');
    
    // Posts Routes 
    Route::get('/posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::patch('/posts/{post}/restore', 'PostsController@restore')->name('posts.restore');
    Route::delete('/posts/{post}/force-destroy', 'PostsController@forceDestroy')->name('posts.force-destroy');
    Route::resource('posts', 'PostsController');
});
