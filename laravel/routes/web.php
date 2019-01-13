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

    Route::get('/category/create', [
        'uses'=> 'CategoriesController@create',
        'as' => 'category.create'
    ]);
    
    Route::get('/category/store', [
        'uses'=> 'CategoriesController@store',
        'as' => 'category.store'
    ]);
    Route::get('/categories', [
        'uses'=> 'CategoriesController@index',
        'as' => 'categories'
    ]);
    Route::get('/category/edit/{id}', [
        'uses'=> 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);
    Route::get('/category/delete/{id}', [
        'uses'=> 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);
    Route::get('/category/update/{id}', [
        'uses'=> 'CategoriesController@update',
        'as' => 'category.update'
    ]);


});