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


/* Mails */
// Route::get('/mail','\Savva\Mail\Newsletter@build');


/* Выборки */
Route::get('/by_category', 'Controller@by_category');
Route::get('/by_service', 'Controller@by_service');
Route::get('/full_list', 'Controller@full_list');


/* Добавление новой записи */
Route::post('/add/{url}', 'Controller@add')->where('url','.*')->name('add');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
