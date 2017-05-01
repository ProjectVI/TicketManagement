<?php

class AdminSubjectController extends BaseController {

  public function shows()
  {
      $subjects = Subject::all();
	    return View::make('admin/subjects/index')->with(compact('subjects'));
  }

  public function create()
  {
      return View::make('admin/subjects/create');
  }

  public function store()
  {
      $rules = array(
          'name'       => 'required|unique:ticket_subjects',
      );
      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
          return Redirect::to('admin/subjects/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          $subject = new Subject;
          $subject->name = Input::get('name');
          $subject->flag = 'A';
          $subject->save();

          Session::flash('message', 'Successfully created subject!');
          return Redirect::to('admin/subjects');
      }
  }

  public function show($id)
  {
      $subject = Subject::find($id);
      return View::make('admin/subjects/show')->with(compact('subject'));
  }

  public function edit($id)
  {
      $subject = Subject::find($id);
      return View::make('admin/subjects/edit')
        ->with(compact('subject'));
  }

  public function update($id)
  {
      $rules = array(
          'name'       => 'unique:ticket_subjects,name,'.$id,
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('admin/subjects/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $subject = Subject::find($id);
          $subject->name = Input::get('name');
          $subject->save();

          // redirect
          Session::flash('message', 'Successfully updated subject!');
          return Redirect::to('admin/subjects');
      }
  }

  public function ban($id)
  {
      $subject = Subject::find($id);
      $subject->flag = 'N';
      $subject->save();

      Session::flash('message', 'Successfully ban subject!');
      return Redirect::to('admin/subjects');
  }

  public function unban($id)
  {
      $subject = Subject::find($id);
      $subject->flag = 'A';
      $subject->save();

      Session::flash('message', 'Successfully unban subject!');
      return Redirect::to('admin/subjects');
  }

}
