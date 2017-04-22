<?php

class AdminController extends BaseController {

  public function showUsers()
  {
      $users = User::all();
	    return View::make('admin/users/index')->with(compact('users'));
  }

  public function createUser()
  {
      return View::make('admin/users/create');
  }

  public function storeUser()
  {
      $rules = array(
          'name'       => 'required',
          'email'      => 'required|email',
          'username'   => 'required|unique:users',
          'password'   => 'required|alphaNum|min:3'
      );
      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
          return Redirect::to('admin/users/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          $user = new User;
          $user->name    = Input::get('name');
          $user->email    = Input::get('email');
          $user->username = Input::get('username');
          $user->password = Hash::make(Input::get('password'));
          $user->flag = 'A';
          $user->role()->associate(Role::where('name','=','Admin')->first());
          $user->team()->associate(Team::where('name','=','RST')->first());
          $user->save();

          Session::flash('message', 'Successfully created user!');
          return Redirect::to('admin/users');
      }
  }

  public function showUser($id)
  {
      $user = User::find($id);
      return View::make('admin/users/show')->with(compact('user'));
  }

  public function editUser($id)
  {
      $user = User::find($id);
      return View::make('admin/users/edit')->with(compact('user'));
  }

  public function updateUser($id)
  {
      $rules = array(
          'name'       => 'required',
          'email'      => 'required|email',
          'username'   => 'unique:users,username'.$id,
          'password'   => 'required|alphaNum|min:3'
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('admin/users/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $user = User::find($id);
          $user->name    = Input::get('name');
          $user->email    = Input::get('email');
          $user->password = Hash::make(Input::get('password'));
          $user->save();

          // redirect
          Session::flash('message', 'Successfully updated user!');
          return Redirect::to('admin/users');
      }
  }

}
