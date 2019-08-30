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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sobre', function () {
    return view('about');
})->name('about');



Route::get('/categorias', 'CategoryController@index')->name('list_categories');
Route::get('/categorias/adicionar', 'CategoryController@create')->name('addCategory');
Route::post('/categorias/adicionar', 'CategoryController@store')->name('createCategory');
Route::delete('/categorias/{id}', 'CategoryController@destroy')->name('removeCategory');

Route::get('/produtos', 'ProductController@index')->name('list_products');
Route::get('/produtos/adicionar', 'ProductController@create')->name('addProduct');
Route::post('/produtos/adicionar', 'ProductController@store')->name('createProduct');
Route::delete('/produtos/{id}', 'ProductController@destroy')->name('removeProduct');