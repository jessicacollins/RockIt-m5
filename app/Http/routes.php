<?php


Route::get('/', function() {
	return view('home');
});

Route::get('/customer/all', 'CustomerController@all');
Route::get('/customer/test', 'CustomerController@index');
Route::get('/customer/{id}', 'CustomerController@index');

Route::get('/customer/{id}/newInvoice', 'InvoiceController@newInvoice');

Route::get('/item/all', 'ItemController@all');

Route::get('/invoice/', 'InvoiceController@all');
Route::get('/invoice/{invoice_id}', 'InvoiceController@details');
Route::post('/invoice/{invoice_id}/addItem/', 'InvoiceController@addItem');
Route::get('/invoice/{id},{invoice_id}/removeItem', 'InvoiceController@removeItem');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
