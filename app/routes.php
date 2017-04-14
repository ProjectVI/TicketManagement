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

Route::get('/', function() {
    return View::make('login');
});
Route::get('logout', array('uses' => 'AccountController@logout'));
Route::get('register', 'AccountController@getRegister');
Route::post('register', 'AccountController@postRegister');
Route::post('login', 'AccountController@postLogin');


Route::group(array('before' => 'auth'), function(){
    Route::get('admin', 'AdminController@index');
    Route::get('logout', 'AccountController@logout');
});

Route::get('/analytics', function()
{
    return View::make('analytics');
});
Route::get('/admin', function()
{
    return View::make('admin');
});

Route::get('/home', function()
{
    return View::make('home');
});

Route::resource('tickets', 'TicketsController');
//Route::get('home', 'TicketsController@subject');
Route::get('/home', function()
{
    $tickets = Ticket::all();
    $subjects = Subject::all();

    return View::make('home')->with('tickets', $tickets);
    return View::make('home')->with('subjects', $subjects);
});

//Route::group(array('before'=>'csrf'),function() {
//    Route::post('login',array('as'=>'post-user-login','uses'=>'HomeController@postLogin'));
//});

//Route::get('home/create', array('uses'=>'TicketController@create'));

//Route::post('contact',function()
//{
//    $data = Input::all();
//    $rules = array(
//        'name' => 'required',
//        'subject' => 'required',
//        'message' => 'required'
//    );
//    $validator = Validator::make($data, $rules);
//    if($validator->fails()) {
//        return
//            Redirect::to('contact')->withErrors($validator)->withInput();
//    }
//    return 'Message has been sent. Thank you!';
//});





