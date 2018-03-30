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

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/test', 'HomeController@test');

Auth::routes();

Route::post('ulogin', 'UloginController@login');

Route::get('/home', 'HomeController@index');

Route::get('/', 'HomeController@index');

Route::get('/select-tariff', 'SelectTariffController@index');
Route::get('/select-value', 'SelectTariffController@getOperatorList');
Route::get('/search-tariff-select-option', 'SelectTariffController@getSearchTariffSelectOption');
Route::get('/skip-user-manual', 'SelectTariffController@skipUserManual');

Route::get('/tariffs', 'TariffController@index');
Route::get('/tariffs/{operator}', 'TariffController@operatorTariffs');
Route::get('/tariffs/compare/{t1}/{t2}', 'TariffController@compare');

Route::get('/guest-book', 'GuestBookController@index');
Route::post('/guest-book-message', 'GuestBookController@create');

Route::get('/spider', 'ParserController@index');

#Locale
Route::get('/locale/{code}', 'LocaleController@setLocale');

# News
Route::get('/news', 'NewsController@index');
Route::get('/news/{slug?}', 'NewsController@oneNews');
Route::get('/filter-news/{typeNews}', 'NewsController@filterNews');
