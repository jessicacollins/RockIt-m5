<?php


Route::get('/', function() {
	return view('home');
});

Route::get('/customer/all', 'CustomerController@all');
Route::get('/customer/test', 'CustomerController@index');

Route::get('/CustomerDetails/{id}', 'CustomerController@details');

Route::get('/item/all', 'ItemController@all');

Route::get('/invoice/all', 'InvoiceController@all');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
