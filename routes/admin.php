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

Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    // Dashboard Routes 
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Categories Routes 
    Route::resource('categories', 'CategoriesController');

    // Tags Routes 
    Route::resource('tags', 'TagsController');

    // Settings Routes 
    Route::get('settings/show', 'SettingsController@index')->name('settings.index');
    Route::patch('settings/update', 'SettingsController@update')->name('settings.update');
    
    // Users Routes 
    Route::get('users/profile', 'ProfilesController@index')->name('users.profile');
    Route::patch('users/profile', 'ProfilesController@update')->name('users.save-profile');
    Route::patch('/users/{user}/make-as-admin', 'UsersController@makeAsAdmin')->name('users.make-as-admin');
    Route::patch('/users/{user}/revoke-permissions', 'UsersController@revokePermissions')->name('users.revoke-permissions');
    Route::resource('users', 'UsersController');
    
    // Posts Routes 
    Route::get('/posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::patch('/posts/{post}/restore', 'PostsController@restore')->name('posts.restore');
    Route::delete('/posts/{post}/force-destroy', 'PostsController@forceDestroy')->name('posts.force-destroy');
    Route::resource('posts', 'PostsController');
});
