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

Route::get('/','MainController@home');
Route::get('/hello1', function () {
    return "Hola mundo";
});
Route::get('/hello2', "MainController@hello2");
Route::get('/hello3', "MainController@hello3");

//Route::get('/home', "MainController@home");
Route::get('/home', "BusinessController@home") ->name("home");
Route::get('/about', "BusinessController@about") ->name('about');
Route::get('/contact', "BusinessController@contact") ->name('contact');

Route::get('/blog', "BusinessController@blog") ->name('blog');
//Route::get('/blog/index', "BlogController@index") ->name('index');

Route::get('/admin/blog', 'BlogController@index')->name('admin.blog');
Route::get('/admin/create', 'BlogController@create')->name('admin.create');
Route::post('/admin/store', 'BlogController@store') -> name('admin.store');
Route::get('/admin/edit/{id}', 'BlogController@edit')->name('admin.edit');
Route::get('/admin/show/{id}', 'BlogController@show')->name('admin.view');
Route::get('/admin/delete/{id}', 'BlogController@delete')->name('admin.delete');





Route::get('/services', "MainController@services");
Route::get('/products', "MainController@products");
Route::get('/products/detail/{id}', "MainController@products_details");
Route::get('/faq', "MainController@faq");
Route::get('/contacts', "MainController@contacts");
