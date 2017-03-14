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
    return view('welcome');
});

Auth::routes();

Route::post('ulogin', 'UloginController@login');

Route::get('/home', 'HomeController@index');

Route::get('/', 'HomeController@index');

Route::get('/select-tariff', 'SelectTariffController@index');
Route::post('/select-value', 'SelectTariffController@getSubcat');

Route::get('/tariffs', 'TariffController@index');

Route::get('/guest-book', 'GuestBookController@index');
Route::post('/guest-book-message', 'GuestBookController@create');

#Locale
Route::get('/locale/{code}', 'LocaleController@setLocale');

# News
Route::get('/news', 'NewsController@index');
Route::get('/news/{slug?}', 'NewsController@oneNews');
Route::get('/filter-news/{typeNews}', 'NewsController@filterNews');
