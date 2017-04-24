<?php

class AdminController extends BaseController {

  public function showUsers()
  {
      $users = User::all();
	    return View::make('admin/users/index')->with(compact('users'));
  }

  public function searchUsers()
  {
      $keyword = Input::get('keyword');
      $users = User::where('name', 'LIKE' , '%'.$keyword.'%')->get();
	    return View::make('admin/users/index')->with(compact('users'));
  }

  public function createUser()
  {
      $roles = Role::all();
      $selectRoles = array();

      foreach($roles as $role) {
        $selectRoles[$role->id] = $role->name;
      }

      $teams = Team::all();
      $selectTeams = array();

      foreach($teams as $team) {
        $selectTeams[$team->id] = $team->name;
      }
      
      return View::make('admin/users/create')
      ->with('roles',$selectRoles)
      ->with('teams',$selectTeams);
  }

  public function storeUser()
  {
      $rules = array(
          'name'       => 'required',
          'email'      => 'required|email',
          'username'   => 'required|unique:users',
          'password'   => 'required|alphaNum|min:3',
          'role'       => 'required',
          'team'       => 'required',
      );
      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
          return Redirect::to('admin/users/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          $user = new User;
          $user->name     = Input::get('name');
          $user->email    = Input::get('email');
          $user->username = Input::get('username');
          $user->password = Hash::make(Input::get('password'));
          $user->flag = 'A';
          $user->role()->associate(Role::where('id','=',Input::get('role'))->first());
          $user->team()->associate(Team::where('id','=',Input::get('team'))->first());
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
      $roles = Role::all();
      $selectRoles = array();

      foreach($roles as $role) {
        $selectRoles[$role->id] = $role->name;
      }

      $teams = Team::all();
      $selectTeams = array();

      foreach($teams as $team) {
        $selectTeams[$team->id] = $team->name;
      }

      $user = User::find($id);
      return View::make('admin/users/edit')
        ->with(compact('user'))
        ->with('roles',$selectRoles)
        ->with('teams',$selectTeams);
  }

  public function updateUser($id)
  {
      $rules = array(
          'name'       => 'required',
          'email'      => 'required|email',
          'username'   => 'unique:users,username,'.$id,
          'password'   => 'required|alphaNum|min:3',
          'role'       => 'required',
          'team'       => 'required',
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
          $user->role()->associate(Role::where('id','=',Input::get('role'))->first());
          $user->team()->associate(Team::where('id','=',Input::get('team'))->first());
          $user->save();

          // redirect
          Session::flash('message', 'Successfully updated user!');
          return Redirect::to('admin/users');
      }
  }

  public function banUser($id)
  {
      $user = User::find($id);
      $user->flag = 'N';
      $user->save();

      Session::flash('message', 'Successfully ban user!');
      return Redirect::to('admin/users');
  }

  public function unbanUser($id)
  {
      $user = User::find($id);
      $user->flag = 'A';
      $user->save();

      Session::flash('message', 'Successfully unban user!');
      return Redirect::to('admin/users');
  }

}
