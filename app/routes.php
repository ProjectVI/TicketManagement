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
		Route::get('analytics', array('uses' => 'AnalyticController@index'));
		Route::get('tickets', array('uses' => 'TicketController@showTickets'));
		Route::post('tickets', array('as' => 'tickets.create','uses' => 'TicketController@storeTicket'));
		Route::post('tickets/search', array('uses' => 'TicketController@searchTickets'));
		Route::get('tickets/{id}', array('as' => 'tickets.show','uses' => 'TicketController@showTicket'));
		Route::get('tickets/{id}/json', array('uses' => 'TicketController@getTicket'));
		Route::get('tickets/{id}/edit', array('as' => 'tickets.edit','uses' => 'TicketController@editTicket'));
		Route::post('tickets/{id}/update', array('as' => 'tickets.update','uses' => 'TicketController@updateTicket'));
		Route::get('tickets/{id}/ban', array('as' => 'tickets.ban','uses' => 'TicketController@banTicket'));
		Route::get('tickets/{id}/unban', array('as' => 'tickets.unban','uses' => 'TicketController@unbanTicket'));
});

Route::group(array('prefix' => 'dashboard'), function()
{
		Route::post('tickets/export/{data}', array('as' => 'tickets.export','uses' => 'TicketController@exportTickets'));
        Route::post('analytics/export/{data}', array('as' => 'analytics.export','uses' => 'AnalyticController@exportReports'));
});

Route::group(array('prefix' => 'admin','before' => 'auth|admin'), function()
{
		Route::group(array('prefix' => 'users'), function()
		{
				Route::get('/', array('uses' => 'AdminUserController@shows'));
				Route::get('/create', array('uses' => 'AdminUserController@create'));
				Route::post('/', array('uses' => 'AdminUserController@store'));
				// Route::post('/search', array('uses' => 'AdminUserController@searchUsers'));
				Route::get('/{id}', array('as' => 'users.show','uses' => 'AdminUserController@show'));
				Route::get('/{id}/edit', array('as' => 'users.edit','uses' => 'AdminUserController@edit'));
				Route::put('/{id}/update', array('as' => 'users.update','uses' => 'AdminUserController@update'));
				Route::get('/{id}/ban', array('as' => 'users.ban','uses' => 'AdminUserController@ban'));
				Route::get('/{id}/unban', array('as' => 'users.unban','uses' => 'AdminUserController@unban'));
		});

		Route::group(array('prefix' => 'channels'), function()
		{
				Route::get('/', array('uses' => 'AdminChannelController@shows'));
				Route::get('/create', array('uses' => 'AdminChannelController@create'));
				Route::post('/', array('uses' => 'AdminChannelController@store'));
				Route::get('/{id}', array('as' => 'channels.show','uses' => 'AdminChannelController@show'));
				Route::get('/{id}/edit', array('as' => 'channels.edit','uses' => 'AdminChannelController@edit'));
				Route::put('/{id}/update', array('as' => 'channels.update','uses' => 'AdminChannelController@update'));
				Route::get('/{id}/ban', array('as' => 'channels.ban','uses' => 'AdminChannelController@ban'));
				Route::get('/{id}/unban', array('as' => 'channels.unban','uses' => 'AdminChannelController@unban'));
		});

		Route::group(array('prefix' => 'subjects'), function()
		{
				Route::get('/', array('uses' => 'AdminSubjectController@shows'));
				Route::get('/create', array('uses' => 'AdminSubjectController@create'));
				Route::post('/', array('uses' => 'AdminSubjectController@store'));
				Route::get('/{id}', array('as' => 'subjects.show','uses' => 'AdminSubjectController@show'));
				Route::get('/{id}/edit', array('as' => 'subjects.edit','uses' => 'AdminSubjectController@edit'));
				Route::put('/{id}/update', array('as' => 'subjects.update','uses' => 'AdminSubjectController@update'));
				Route::get('/{id}/ban', array('as' => 'subjects.ban','uses' => 'AdminSubjectController@ban'));
				Route::get('/{id}/unban', array('as' => 'subjects.unban','uses' => 'AdminSubjectController@unban'));
		});

		Route::group(array('prefix' => 'status'), function()
		{
				Route::get('/', array('uses' => 'AdminStatusController@shows'));
				Route::get('/create', array('uses' => 'AdminStatusController@create'));
				Route::post('/', array('uses' => 'AdminStatusController@store'));
				Route::get('/{id}', array('as' => 'status.show','uses' => 'AdminStatusController@show'));
				Route::get('/{id}/edit', array('as' => 'status.edit','uses' => 'AdminStatusController@edit'));
				Route::put('/{id}/update', array('as' => 'status.update','uses' => 'AdminStatusController@update'));
				Route::get('/{id}/ban', array('as' => 'status.ban','uses' => 'AdminStatusController@ban'));
				Route::get('/{id}/unban', array('as' => 'status.unban','uses' => 'AdminStatusController@unban'));
		});

		Route::group(array('prefix' => 'teams'), function()
		{
				Route::get('/', array('uses' => 'AdminTeamController@shows'));
				Route::get('/create', array('uses' => 'AdminTeamController@create'));
				Route::post('/', array('uses' => 'AdminTeamController@store'));
				Route::get('/{id}', array('as' => 'teams.show','uses' => 'AdminTeamController@show'));
				Route::get('/{id}/edit', array('as' => 'teams.edit','uses' => 'AdminTeamController@edit'));
				Route::put('/{id}/update', array('as' => 'teams.update','uses' => 'AdminTeamController@update'));
				Route::get('/{id}/ban', array('as' => 'teams.ban','uses' => 'AdminTeamController@ban'));
				Route::get('/{id}/unban', array('as' => 'teams.unban','uses' => 'AdminTeamController@unban'));
		});

});
