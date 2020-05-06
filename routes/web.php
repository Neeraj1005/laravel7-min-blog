<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Below Routes are created manually by me*/

Route::group(['middleware' => 'admin'], function () {
    Route::prefix('admin')->namespace('Admin')->group(function () {
        Route::resource('users', 'AdminController');
        Route::resource('posts', 'AdminPostController');
        Route::resource('category', 'AdminCategoryController');
    });
});
