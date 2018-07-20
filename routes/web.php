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
Route::get('/newsletter','\App\Mail\Newsletter@build');
Route::get('/recent','UrlController@recent');

Route::resource('urls','UrlController');

Route::get('/book',function(){
  return view('pages.book');
});

Route::get('/',function(){
  return view('pages.index');
});

Route::get('/books',function(){
  return view('pages.books');
});



Route::get('/savva',function(){
  return view('pages.savva');
});

/* Выборки */
Route::get('/base', 'UrlController@index');
Route::redirect('/by_tag', '/');
Route::get('/by_site', 'UrlController@by_service')->name('by_site');
Route::get('/full', 'UrlController@index')->name('full_list');

/* Compatibility */

//Route::redirect('/full_list', '/');
//Route::redirect('/by_category', '/');




/* Добавление новой записи */
Route::post('/new/', 'UrlController@add')->where('url','.*')->name('add');
Route::delete('/{url}', 'UrlController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
