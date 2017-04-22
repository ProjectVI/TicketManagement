<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
		return View::make('hello');
});

Route::group(array('prefix' => 'auth'), function()
{
		Route::get('login', array('uses' => 'UserController@showLogin'));
		Route::post('login', array('uses' => 'UserController@doLogin'));
		Route::get('logout', array('uses' => 'UserController@doLogout'));
});

Route::group(array('prefix' => 'dashboard','before' => 'auth'), function()
{
		Route::get('tickets', array('uses' => 'TicketController@showTickets'));
});

Route::group(array('prefix' => 'admin','before' => 'auth|admin'), function()
{
		Route::get('users', array('uses' => 'AdminController@showUsers'));
		Route::get('users/create', array('uses' => 'AdminController@createUser'));
		Route::post('users', array('uses' => 'AdminController@storeUser'));
		Route::get('users/{id}', array('uses' => 'AdminController@showUser'));
		Route::get('users/{id}/edit', array('uses' => 'AdminController@editUser'));
		Route::put('users/update/{id}', array('as' => 'users.update','uses' => 'AdminController@updateUser'));
});
