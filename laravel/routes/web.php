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

    Route::post('/post/store', [
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
    Route::get('/post', [
        'uses'=> 'PostController@index',
        'as' => 'posts'
    ]);

    Route::get('/post/delete/{id}', [
        'uses'=> 'PostController@destroy',
        'as' => 'post.delete'
    ]);
    Route::get('/post/trashed', [
        'uses'=> 'PostController@trashed',
        'as' => 'post.trashed'
    ]);
    Route::get('/post/kill/{id}', [
        'uses'=> 'PostController@kill',
        'as' => 'post.kill'
    ]);
    Route::get('/post/restore/{id}', [
        'uses'=> 'PostController@restore',
        'as' => 'post.restore'
    ]);
    Route::get('/post/edit/{id}', [
        'uses'=> 'PostController@edit',
        'as' => 'post.edit'
    ]);
    Route::post('/post/update/{id}', [
        'uses'=> 'PostController@update',
        'as' => 'post.update'
    ]);
    Route::get('/tags', [
        'uses'=> 'TagsController@index',
        'as' => 'tags'
    ]);
    Route::get('/tag/edit/{id}', [
        'uses'=> 'TagsController@edit',
        'as' => 'tag.edit'
    ]);
    Route::get('/tag/create', [
        'uses'=> 'TagsController@create',
        'as' => 'tag.create'
    ]);
    Route::post('/tag/update/{id}', [
        'uses'=> 'TagsController@update',
        'as' => 'tag.update'
    ]);
    Route::get('/tag/delete/{id}', [
        'uses'=> 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);
    Route::post('/tag/store', [
        'uses'=> 'TagsController@store',
        'as' => 'tag.store'
    ]);



});
