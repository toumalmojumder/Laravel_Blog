<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){

    Route::get('/post/create', [
        'uses'=> 'PostController@create',
        'as' => 'post.create'
    ]);
    
    Route::get('/post/store', [
        'uses'=> 'PostController@store',
        'as' => 'post.store'
    ]);

    Route::get('/home', [
        'uses'=> 'HomeController@index',
        'as' => 'home'
    ]);

});