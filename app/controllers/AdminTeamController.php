<?php

class AdminTeamController extends BaseController {

  public function shows()
  {
      $teams = Team::all();
	    return View::make('admin/teams/index')->with(compact('teams'));
  }

  public function create()
  {
      return View::make('admin/teams/create');
  }

  public function store()
  {
      $rules = array(
          'name'       => 'required|unique:teams',
      );
      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
          return Redirect::to('admin/teams/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          $team = new Team;
          $team->name = Input::get('name');
          $team->flag = 'A';
          $team->save();

          Session::flash('message', 'Successfully created team!');
          return Redirect::to('admin/teams');
      }
  }

  public function show($id)
  {
      $team = Team::find($id);
      return View::make('admin/teams/show')->with(compact('team'));
  }

  public function edit($id)
  {
      $team = Team::find($id);
      return View::make('admin/teams/edit')
        ->with(compact('team'));
  }

  public function update($id)
  {
      $rules = array(
          'name'       => 'unique:teams,name,'.$id,
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('admin/teams/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $team = Team::find($id);
          $team->name = Input::get('name');
          $team->save();

          // redirect
          Session::flash('message', 'Successfully updated team!');
          return Redirect::to('admin/teams');
      }
  }

  public function ban($id)
  {
      $team = Team::find($id);
      $team->flag = 'N';
      $team->save();

      Session::flash('message', 'Successfully ban team!');
      return Redirect::to('admin/teams');
  }

  public function unban($id)
  {
      $team = Team::find($id);
      $team->flag = 'A';
      $team->save();

      Session::flash('message', 'Successfully unban team!');
      return Redirect::to('admin/teams');
  }

}
