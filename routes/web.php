<?php

Route::get('/','PostController@getPosts');

Route::get('/post','PostController@getPosts');

Auth::routes();

Route::get('/home','HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']],function(){
    Route::resource('/adminhome', 'PostController');
    Route::resource('/category', 'CategoryController');
});



