<?php


Route::get('/', "BusinessController@home") ->name("home");
Route::get('/about', "BusinessController@about") ->name('about');
Route::get('/contact', "BusinessController@contact") ->name('contact');
Route::get('/blog', "BusinessController@blog") ->name('blog');
Route::get('/admin/blog', 'BlogController@index')->name('admin.blog');
Route::get('/admin/create', 'BlogController@create')->name('admin.create');
Route::post('/admin/store', 'BlogController@store') -> name('admin.store');
Route::get('/admin/edit/{id}', 'BlogController@edit')->name('admin.edit');
Route::get('/admin/show/{id}', 'BlogController@show')->name('admin.view');
Route::get('/admin/delete/{id}', 'BlogController@delete')->name('admin.delete');

