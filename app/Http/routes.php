<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('auth/login/facebook','Auth\FacebookAuthController@redirectToProvider');
Route::get('auth/facebookauthcallback','Auth\FacebookAuthController@handleProviderCallback');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



Route::get('admin/users','Admin\UsersController@index');
Route::get('admin/users/edit/{id}','Admin\UsersController@edit');
Route::get('admin/users/delete/{id}','Admin\UsersController@delete');
Route::get('admin/users/view/{id}','Admin\UsersController@view');
Route::post('admin/users/update/{id}','Admin\UsersController@save');

Route::get('/admin/stores/{id}/categories', 'Admin\CategoriesController@get_store_categories');
Route::get('/admin/categories/{id}/offers', 'Admin\OffersController@get_category_offers');
Route::resource('/admin/stores', 'Admin\StoresController');
Route::resource('/admin/categories', 'Admin\CategoriesController');
Route::resource('/admin/offers', 'Admin\OffersController');
Route::get('/admin/home', 'Admin\HomeController@index');




Route::get('user/account','User\UsersController@index');
Route::patch('user/account','User\UsersController@update');


Route::get('user/payment_settings','User\UsersController@payment_settings');
Route::patch('user/payment_settings','User\UsersController@add_payment_settings');
Route::get('user/password','User\UsersController@password');
Route::patch('user/password','User\UsersController@update_password');


Route::get('/stores/{id}', 'HomeController@store');
Route::get('all_stores', 'HomeController@stores');


