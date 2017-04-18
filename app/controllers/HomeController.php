<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function showWelcome()
    {
    /*
        $subjects = DB::table('ticket_subjects')->select('subject_name as subject')->get();
        $statuses = DB::table('ticket_status')->select('status_name as status')->get();
        $channels = DB::table('ticket_channels')->select('channel_name as channel')->get();
        $users = DB::table('users')->select('firstname as user')->get();
        $teams = DB::table('teams')->select('team_name as team')->get();
    */
        return View::make('hello');
    }




}
