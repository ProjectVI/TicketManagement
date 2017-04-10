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

//Route::get('/', function()
//{
//	return View::make('hello');
//});

//Route::get('login', function() {
//    return View::make('login');
//});
////POST route
//Route::post('login', 'AccountController@login');
//
//Route::get('logout', array('uses' => 'AccountController@logout'));

Route::get('register', 'HomeController@getRegister');
Route::get('login', 'HomeController@getLogin');
Route::post('login', 'HomeController@postLogin');
Route::post('register', 'HomeController@postRegister');
Route::group(array('before' => 'auth'), function(){
    Route::get('admin', 'AdminController@index');
    Route::get('logout', 'HomeController@logout');
});

Route::get('/', function()
{
    return View::make('home');
});
Route::get('/analytics', function()
{
    return View::make('analytics');
});
Route::get('/admin', function()
{
    return View::make('admin');
});


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