<?php
class AccountController extends BaseController {

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
                'team_id' => Input::get('team_id'),
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

        try
        {
            // Login credentials
            $credentials = array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
            );

            // Authenticate the user
            $user = Sentry::authenticate($credentials, false);
            return Redirect::to('home');
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Login field is required.';
            return Redirect::to('login');
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            echo 'Wrong password, try again.';
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            echo 'User is not activated.';
        }

// The following is only required if the throttling is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            echo 'User is suspended.';
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            echo 'User is banned.';
        }

    }

    public function logout()
    {
        Sentry::logout();

        return Redirect::to('/');
    }
    public function getRegister()
    {
        return View::make('register');
    }

    public function getLogin()
    {
        return View::make('login');
    }
}