<?php

class AdminChannelController extends BaseController {

  public function shows()
  {
      $channels = Channel::all();
	    return View::make('admin/channels/index')->with(compact('channels'));
  }

  public function create()
  {
      return View::make('admin/channels/create');
  }

  public function store()
  {
      $rules = array(
          'name'       => 'required|unique:ticket_channels',
      );
      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
          return Redirect::to('admin/channels/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          $channel = new Channel;
          $channel->name = Input::get('name');
          $channel->flag = 'A';
          $channel->save();

          Session::flash('message', 'Successfully created channel!');
          return Redirect::to('admin/channels');
      }
  }

  public function show($id)
  {
      $channel = Channel::find($id);
      return View::make('admin/channels/show')->with(compact('channel'));
  }

  public function edit($id)
  {
      $channel = Channel::find($id);
      return View::make('admin/channels/edit')
        ->with(compact('channel'));
  }

  public function update($id)
  {
      $rules = array(
          'name'       => 'unique:ticket_channels,name,'.$id,
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('admin/channels/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $channel = Channel::find($id);
          $channel->name = Input::get('name');
          $channel->save();

          // redirect
          Session::flash('message', 'Successfully updated channel!');
          return Redirect::to('admin/channels');
      }
  }

  public function ban($id)
  {
      $channel = Channel::find($id);
      $channel->flag = 'N';
      $channel->save();

      Session::flash('message', 'Successfully ban channel!');
      return Redirect::to('admin/channels');
  }

  public function unban($id)
  {
      $channel = Channel::find($id);
      $channel->flag = 'A';
      $channel->save();

      Session::flash('message', 'Successfully unban channel!');
      return Redirect::to('admin/channels');
  }

}
