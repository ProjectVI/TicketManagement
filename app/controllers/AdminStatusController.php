<?php

class AdminStatusController extends BaseController {

  public function shows()
  {
      $status = Status::all();
	    return View::make('admin/status/index')->with(compact('status'));
  }

  public function create()
  {
      return View::make('admin/status/create');
  }

  public function store()
  {
      $rules = array(
          'name'       => 'required|unique:ticket_status',
      );
      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
          return Redirect::to('admin/status/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          $status = new Status;
          $status->name = Input::get('name');
          $status->flag = 'A';
          $status->save();

          Session::flash('message', 'Successfully created status!');
          return Redirect::to('admin/status');
      }
  }

  public function show($id)
  {
      $status = Status::find($id);
      return View::make('admin/status/show')->with(compact('status'));
  }

  public function edit($id)
  {
      $status = Status::find($id);
      return View::make('admin/status/edit')
        ->with(compact('status'));
  }

  public function update($id)
  {
      $rules = array(
          'name'       => 'unique:ticket_status,name,'.$id,
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('admin/status/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $status = Status::find($id);
          $status->name = Input::get('name');
          $status->save();

          // redirect
          Session::flash('message', 'Successfully updated status!');
          return Redirect::to('admin/status');
      }
  }

  public function ban($id)
  {
      $status = Status::find($id);
      $status->flag = 'N';
      $status->save();

      Session::flash('message', 'Successfully ban status!');
      return Redirect::to('admin/status');
  }

  public function unban($id)
  {
      $status = Status::find($id);
      $status->flag = 'A';
      $status->save();

      Session::flash('message', 'Successfully unban status!');
      return Redirect::to('admin/status');
  }

}
