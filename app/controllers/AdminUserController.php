<?php

class AdminUserController extends BaseController {

  public function shows()
  {
      $users = User::all();
	    return View::make('admin/users/index')->with(compact('users'));
  }

  public function search()
  {
      $keyword = Input::get('keyword');
      $users = User::where('name', 'LIKE' , '%'.$keyword.'%')->get();
	    return View::make('admin/users/index')->with(compact('users'));
  }

  public function create()
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

  public function store()
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

  public function show($id)
  {
      $user = User::find($id);
      return View::make('admin/users/show')->with(compact('user'));
  }

  public function edit($id)
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

  public function update($id)
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

  public function ban($id)
  {
      $user = User::find($id);
      $user->flag = 'N';
      $user->save();

      Session::flash('message', 'Successfully ban user!');
      return Redirect::to('admin/users');
  }

  public function unban($id)
  {
      $user = User::find($id);
      $user->flag = 'A';
      $user->save();

      Session::flash('message', 'Successfully unban user!');
      return Redirect::to('admin/users');
  }

}
