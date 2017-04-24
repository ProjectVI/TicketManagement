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
		return Redirect::to('dashboard/tickets');
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
		Route::post('tickets/search', array('uses' => 'TicketController@searchTickets'));
		Route::post('tickets', array('as' => 'tickets.create','uses' => 'TicketController@storeTicket'));
		Route::get('tickets/{id}', array('as' => 'tickets.show','uses' => 'TicketController@showTicket'));
		Route::get('tickets/{id}/edit', array('as' => 'tickets.edit','uses' => 'TicketController@editTicket'));
		Route::put('tickets/{id}/update', array('as' => 'tickets.update','uses' => 'TicketController@updateTicket'));
		Route::get('tickets/{id}/ban', array('as' => 'tickets.ban','uses' => 'TicketController@banTicket'));
		Route::get('tickets/{id}/unban', array('as' => 'tickets.unban','uses' => 'TicketController@unbanTicket'));
});

Route::group(array('prefix' => 'admin','before' => 'auth|admin'), function()
{
		Route::get('users', array('uses' => 'AdminController@showUsers'));
		Route::get('users/create', array('uses' => 'AdminController@createUser'));
		Route::post('users', array('uses' => 'AdminController@storeUser'));
		Route::post('users/search', array('uses' => 'AdminController@searchUsers'));
		Route::get('users/{id}', array('uses' => 'AdminController@showUser'));
		Route::get('users/{id}/edit', array('as' => 'users.edit','uses' => 'AdminController@editUser'));
		Route::put('users/{id}/update', array('as' => 'users.update','uses' => 'AdminController@updateUser'));
		Route::get('users/{id}/ban', array('as' => 'users.ban','uses' => 'AdminController@banUser'));
		Route::get('users/{id}/unban', array('as' => 'users.unban','uses' => 'AdminController@unbanUser'));
});
