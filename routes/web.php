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
Route::get('/', 'HomeController@index');

Auth::routes();

//Route::get('/', 'PostController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('posts', 'PostController');
Route::resource('galleries', 'GalleryController');
Route::resource('companies', 'CompanyController');
Route::post('gallery/store', 'GalleryController@store')->name('store');
Route::get('imageshow/{id}', 'GalleryController@showImage')->name('showImage');

