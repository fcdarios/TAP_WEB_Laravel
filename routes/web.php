<?php

Route::get('/', "BusinessController@home") ->name("home");
Route::get('/about', "BusinessController@about") ->name('about');
Route::get('/contact', "BusinessController@contact") ->name('contact');
Route::get('/blog', "BusinessController@blog") ->name('blog');
Route::get('/admin/blog', 'BlogController@index')->name('admin.blog');
Route::get('/admin/create', 'BlogController@create')->name('admin.create');
Route::post('/admin/store', 'BlogController@store') -> name('admin.store');
Route::get('/admin/edit/{id}', 'BlogController@edit')->name('admin.edit');
Route::put('/admin/update/{id}', 'BlogController@update')->name('admin.update');
Route::get('/admin/show/{id}', 'BlogController@show')->name('admin.view');
Route::delete('/admin/delete/{id}', 'BlogController@destroy')->name('admin.destroy');

Route::get('/unauthorized', function (){
    return view('unauthorized');
}) -> name('unauthorized');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function (){
    return view('business-casual/home');
}) -> name('home');


