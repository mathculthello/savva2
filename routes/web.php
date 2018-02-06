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

Route::redirect('/','/by_category');


/* Выборки */
Route::get('/by_category', 'Controller@by_category');
Route::get('/by_service', 'Controller@by_service');
Route::get('/full_list', 'Controller@full_list');


/* Листинг из гугла */
Route::get('/google', 'Google@list');

/* Добавление новой записи */
Route::get('/add/{url}', 'Controller@add')->where('url','.*')->name('add');
