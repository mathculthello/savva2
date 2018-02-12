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


/* Mails */
Route::get('/newsletter','\Savva\Mail\Newsletter@build');


/* Выборки */
Route::get('/', 'UrlController@index');
//Route::get('/by_category', 'UrlController@by_category');
//Route::get('/by_service', 'UrlController@by_service');


/* Добавление новой записи */
Route::post('/new/', 'UrlController@add')->where('url','.*')->name('add');
Route::delete('/{url}', 'UrlController@delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
