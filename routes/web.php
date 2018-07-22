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
    Route::get('/dashboard', 'HomeController@index')->name('home');

    // Categories Routes 
    Route::resource('categories', 'CategoriesController');
    
    // Posts Routes 
    Route::resource('posts', 'PostsController');
});
