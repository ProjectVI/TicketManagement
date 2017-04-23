<?php

class UserController extends BaseController {

  public function showLogin()
  {
      return View::make('auth/login');
  }

  public function doLogin()
  {
    // validate the info, create rules for the inputs
      $rules = array(
          'username' => 'required', // make sure the email is an actual email
          'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
      );

      // run the validation rules on the inputs from the form
      $validator = Validator::make(Input::all(), $rules);

      // if the validator fails, redirect back to the form
      if ($validator->fails()) {
          return Redirect::to('auth/login')
              ->withErrors($validator) // send back all errors to the login form
              ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
      } else {

          // create our user data for the authentication
          $userdata = array(
              'username'  => Input::get('username'),
              'password'  => Input::get('password')
          );

          // attempt to do the login
          if (Auth::attempt($userdata)) {

              if (Auth::user()->flag != 'A') {
                  Auth::logout();
                  return Redirect::to('auth/login');
              }
              return Redirect::to('dashboard/tickets');

          } else {
              return Redirect::to('auth/login');
          }

      }
    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('auth/login');
    }


}
