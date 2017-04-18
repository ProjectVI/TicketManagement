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

//Route::group(array('before' => 'auth'), function(){
//    Route::get('admin', 'AdminController@index');
////    Route::get('logout', 'AccountController@logout');
//});


Route::get('/', function() {
    return View::make('login');
});
Route::get('logout', array('uses' => 'AccountController@logout'));
Route::get('register', 'AccountController@getRegister');
Route::post('register', 'AccountController@postRegister');
Route::post('login', 'AccountController@postLogin');
Route::get('edituser', 'AccountController@getEditUser');
Route::post('edituser', 'AccountController@postEditUser');

Route::post('ticketcreate','TicketsController@create');
Route::post('ticketsearch','TicketsController@index');



Route::get('/analytics', function()
{
    return View::make('analytics');
});

Route::get('/admin', function()
{
    $users = User::all();
    return View::make('admin')->with('users', $users);
});

Route::get('/home', function()
{

    return View::make('home');
});

Route::get('/channel', function()
{
    $channels = Channel::all();
    return View::make('channel')->with('channels', $channels);
});

Route::get('/status', function()
{
    $statuses = Status::all();
    return View::make('status')->with('statuses', $statuses);
});

Route::get('/subject', function()
{
    $subjects = Subject::all();
    return View::make('subject')->with('subjects', $subjects);
});

Route::get('/team', function()
{
    $teams = Team::all();
    return View::make('team')->with('teams', $teams);
});

Route::resource('tickets', 'TicketsController');

Route::get('/home', function()
{
    //$tickets = Ticket::all();
    //$subjects = Subject::all();
    $tickets = DB::table('tickets')
        ->select(DB::raw('tickets.created_at as created_at,
  ticket_subjects.subject_name as subject,
  tickets.problem as problem,
  ticket_status.status_name as status,
  users.firstname as firstname,
  tickets.fax_id as fax_id,
  tickets.channel_id as channel_id,
  ticket_channels.channel_name as channel'))
        ->leftJoin('ticket_channels', 'tickets.channel_id', '=', 'ticket_channels.channel_id')
        ->leftJoin('ticket_status', 'tickets.status_id', '=', 'ticket_status.status_id')
        ->leftJoin('ticket_subjects', 'tickets.subject_id', '=', 'ticket_subjects.subject_id')
        ->leftJoin('users', 'tickets.created_by', '=', 'users.id')
        ->get();

    //    ->where('status', '<>', 1)
    //    ->groupBy('status')
    //    ->get();


    return View::make('home')->with('tickets', $tickets);
    //return View::make('home')->with('subjects', $subjects);
});





