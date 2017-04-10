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
        return View::make('hello');
    }
    public function getRegister()
    {
        return View::make('register');
    }

    public function getLogin()
    {
        return View::make('login');
    }
    public function postRegister()
    {
        try
        {
            $user = Sentry::createUser(array(
                'firstname' => Input::get('firstname'),
                'surname' => Input::get('surname'),
                'username' => Input::get('username'),
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'role_id' => Input::get('role_id'),
            ));
            echo 'Success!';
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            echo 'User Already Exists';
        }
    }
    public function postLogin()
    {
        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        );
        try{
            $user = Sentry::authenticate($credentials, false);
            if($user)
            {
                return Redirect::to('/');
            }
        }
        catch (\Exception $e)
        {
//            return Redirect::to('/');
            return Redirect::to('login')->withErrors(array('login' => $e->getMessages()));
        }
    }
    public function logout()
    {
        Sentry::logout();
        return Redirect::to('/');
    }


}
