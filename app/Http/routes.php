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

//Route::get('/', 'WelcomeController@index');
Route::get('/', [
	'as' =>'index',
	'uses' => 'IndexController@index'
	]);

Route::get('home', [
	'as' => 'home',
	'uses' => 'PortalController@index'
	]);

Route::get('about', [
	'as' => 'about',
	'uses' => 'AboutUsController@about'
	]);

Route::get('service/vpn', [
	'as' => 'vpnService',
	'uses' => 'AboutUsController@vpnService'
	]);

Route::get('service/shadowsocks', [
	'as' => 'ssService',
	'uses' => 'AboutUsController@ssService'
	]);

Route::controllers([
	'user' => 'Auth\AuthController',
	'user/password' => 'Auth\PasswordController',
]);

Route::get('home/pay', [
	'as' => 'payment',
	'uses' => 'PaymentController@index'
]);

Route::post('home/pay', [
	'uses' => 'PaymentController@postBuy'
]);

// Route::group(['domain' => 'portal.twovpn.com'], function()
// {

// 	Route::get('/', [
// 	'as' => 'home',
// 	'uses' => 'PortalController@index'
// 	]);

// });