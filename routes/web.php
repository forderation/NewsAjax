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

Route::get('/', 'PostController@welcome');
Route::get('post', 'PostController@post');
Route::resource('admin/post','PostController');
Route::resource('admin/kategori','KategoriController');
Route::resource('admin/tag','TagController');
Route::resource('admin/pencipta','PenciptaController');
Route::post('admin/changeStatus', array('as'=>'changeStatus','uses'=>'PostController@changeStatus'));
Route::get('detail/{id}', 'PostController@detail');