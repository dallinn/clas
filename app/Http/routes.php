<?php
Route::auth();

Route::get('/', 'PostController@getIndex');
Route::get('all', 'PostController@getAll');
Route::get('all/{category}', 'PostController@getByCategory')->where('category', '[A-Za-z]+');

Route::get('listing/{id}', 'PostController@getById')->where('id', '[0-9]+');

Route::group(['middleware' => 'auth'], function () {
	Route::get('create', 'PostController@getCreate');
	Route::get('mylistings', 'PostController@getMyListings');
	Route::post('create', 'PostController@create')->name('post.create');
	Route::get('mylistings/{id}/edit', 'PostController@edit')->where('id', '[0-9]+')->name('posts.edit');
	Route::post('mylistings/{id}/edit', 'PostController@update')->where('id', '[0-9]+');
	Route::get('mylistings/{id}/delete', 'PostController@delete')->where('id', '[0-9]+')->name('posts.delete');
});
