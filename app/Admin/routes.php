<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);

Route::get('/spider/kyivstar',['as' => 'admin.parser.kyivstar','uses' => '\App\Http\Controllers\ParserController@kyivstar']);
Route::get('/spider/lifecell',['as' => 'admin.parser.lifecell','uses' => '\App\Http\Controllers\ParserController@lifecell']);
Route::get('/spider/vodafone',['as' => 'admin.parser.vodafone','uses' => '\App\Http\Controllers\ParserController@vodafone']);
