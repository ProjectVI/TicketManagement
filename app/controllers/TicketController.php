<?php

class TicketController extends BaseController {

  public function showTickets()
  {
      $channels = Channel::where('flag','!=','N')->get();
      $selectChannels = array();

      foreach($channels as $channel) {
        $selectChannels[$channel->id] = $channel->name;
      }

      $subjects = Subject::where('flag','!=','N')->get();
      $selectSubjects = array();

      foreach($subjects as $subject) {
        $selectSubjects[$subject->id] = $subject->name;
      }

      $status = Status::where('flag','!=','N')->get();
      $selectStatus = array();

      foreach($status as $status_one) {
        $selectStatus[$status_one->id] = $status_one->name;
      }

      $teams = Team::where('flag','!=','N')->get();
      $selectTeams = array();

      foreach($teams as $team) {
        $selectTeams[$team->id] = $team->name;
      }

      $tickets = Ticket::with(['created_by', 'updated_by'])
                ->orderBy('created_at', 'desc')
                ->where('flag','!=','N')->get();
      return View::make('dashboard/tickets')
            ->with(compact('tickets'))
            ->with('channels',$selectChannels)
            ->with('status',$selectStatus)
            ->with('subjects',$selectSubjects)
            ->with('teams',$selectTeams);
  }

  public function searchTickets()
  {
      $tickets = Ticket::with(['created_by', 'updated_by'])
                ->orderBy('created_at', 'desc')
                ->where('flag','!=','N');
      $subject_data = Input::get('subject');
      if ($subject_data != '') {
        $tickets = Ticket::where('subject_id','=',$subject_data+1);
        // $tickets = Ticket::where('subject_id','=',$subject_data);
      }
      $domain = Input::get('domain');
      if ($domain != '') {
        $tickets = $tickets->where('domain','LIKE','%'.$domain.'%');
      }
      $problem = Input::get('problem');
      if ($problem != '') {
        $tickets = $tickets->where('problem','LIKE','%'.$problem.'%');
      }
      $channel_data = Input::get('channel');
      if ($channel_data != '') {
        // $tickets = $tickets->where('channel_id','=',$channel_data);
        $tickets = $tickets->where('channel_id','=',$channel_data+1);
      }
      $channel_info = Input::get('channel_info');
      if ($channel_info != '') {
        $tickets = $tickets->where('channel_info','=',$channel_info);
      }
      $status_data = Input::get('status');
      if ($status_data != '') {
        // $tickets = $tickets->where('status_id','=',$status_data);
        $tickets = $tickets->where('status_id','=',$status_data+1);
      }
      $fax_id = Input::get('fax_id');
      if ($fax_id != '') {
        $tickets = $tickets->where('fax_id','=',$fax_id);
      }
      $user = Input::get('user');
      if ($user != '') {
        $user_id = User::where('username','LIKE','%'.$user.'%')->lists('id');
        $tickets = $tickets->whereIn('created_by',$user_id);
      }
      $team = Input::get('team');
      if ($team != '') {
        // $user_id = User::where('team_id','=',$team)->lists('id');
        $user_id = User::where('team_id','=',$team+1)->lists('id');
        $tickets = $tickets->whereIn('created_by',$user_id);
      }
      $organization = Input::get('organization');
      if ($organization != '') {
        $tickets = $tickets->where('organization','LIKE','%'.$organization.'%');
      }
      $created_from = Input::get('created_from');
      if ($created_from != '') {
        $tickets = $tickets->where('created_at','>=',$created_from);
      }
      $created_to = Input::get('created_to');
      if ($created_to != '') {
        $tickets = $tickets->where('created_at','=<',$created_to);
      }

      $tickets = $tickets->get();

      $channels = Channel::all();
      $selectChannels = array();

      foreach($channels as $channel) {
        $selectChannels[$channel->id] = $channel->name;
      }

      $subjects = Subject::all();
      $selectSubjects = array();

      foreach($subjects as $subject) {
        $selectSubjects[$subject->id] = $subject->name;
      }

      $status = Status::all();
      $selectStatus = array();

      foreach($status as $status_one) {
        $selectStatus[$status_one->id] = $status_one->name;
      }

      $teams = Team::all();
      $selectTeams = array();

      foreach($teams as $team) {
        $selectTeams[$team->id] = $team->name;
      }

      return View::make('dashboard/tickets')
            ->with('tickets',$tickets)
            ->with('channels',$selectChannels)
            ->with('status',$selectStatus)
            ->with('subjects',$selectSubjects)
            ->with('teams',$selectTeams);

  }

  public function storeTicket()
  {
      $rules = array(
          'subject'       => 'required',
          'channel'      => 'required',
          'domain'   => 'required',
          'status'   => 'required',
          'problem'   => 'required',
          'organization'   => 'required',
      );
      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
          return Redirect::to('dashboard/tickets')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          $ticket = new Ticket;
          $ticket->subject()->associate(Subject::where('id','=',Input::get('subject'))->first());
          $ticket->channel()->associate(Channel::where('id','=',Input::get('channel'))->first());
          $ticket->channel_info = Input::get('channel_info');
          $ticket->domain = Input::get('domain');
          $ticket->status()->associate(Status::where('id','=',Input::get('status'))->first());
          $ticket->fax_id = Input::get('fax_id');
          $ticket->problem = Input::get('problem');
          $ticket->contact_name = Input::get('contact_name');
          $ticket->organization = Input::get('organization');
          $ticket->contact_phone = Input::get('contact_phone');
          $ticket->contact_email = Input::get('contact_email');
          $ticket->answer = Input::get('answer');
          $ticket->remark = Input::get('remark');
          $ticket->flag = 'A';
          $ticket->created_by()->associate(User::where('id','=',Auth::user()->id)->first());
          $ticket->updated_by()->associate(User::where('id','=',Auth::user()->id)->first());
          $ticket->save();

          Session::flash('message', 'Successfully created ticket!');
          return Redirect::to('dashboard/tickets');
      }
  }

  public function getTicket($id)
  {
      $ticket = Ticket::find($id);
      return json_encode($ticket);
  }

  public function showTicket($id)
  {

  }

  public function editTicket($id)
  {

  }

  public function updateTicket($id)
  {
      $rules = array(
          'subject'       => 'required',
          'channel'      => 'required',
          'domain'   => 'required',
          'status'   => 'required',
          'problem'   => 'required',
          'organization'   => 'required',
      );
      $validator = Validator::make(Input::all(), $rules);

      if ($validator->fails()) {
          return Redirect::to('dashboard/tickets')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          $ticket = Ticket::find($id);
          $ticket->subject()->associate(Subject::where('id','=',Input::get('subject'))->first());
          $ticket->channel()->associate(Channel::where('id','=',Input::get('channel'))->first());
          $ticket->channel_info = Input::get('channel_info');
          $ticket->domain = Input::get('domain');
          $ticket->status()->associate(Status::where('id','=',Input::get('status'))->first());
          $ticket->fax_id = Input::get('fax_id');
          $ticket->problem = Input::get('problem');
          $ticket->contact_name = Input::get('contact_name');
          $ticket->organization = Input::get('organization');
          $ticket->contact_phone = Input::get('contact_phone');
          $ticket->contact_email = Input::get('contact_email');
          $ticket->answer = Input::get('answer');
          $ticket->remark = Input::get('remark');
          $ticket->updated_by()->associate(User::where('id','=',Auth::user()->id)->first());
          $ticket->save();

          Session::flash('message', 'Successfully updated ticket!');
          return Redirect::to('dashboard/tickets');
      }
  }

  public function banTicket($id)
  {
      $ticket = Ticket::find($id);
      $ticket->flag = 'N';
      $ticket->save();

      Session::flash('message', 'Successfully ban ticket!');
      return Redirect::to('dashboard/tickets');
  }

  public function unbanTicket($id)
  {
      $ticket = Ticket::find($id);
      $ticket->flag = 'A';
      $ticket->save();

      Session::flash('message', 'Successfully unban ticket!');
      return Redirect::to('dashboard/tickets');
  }

  public function exportTickets($data)
  {
      $data = json_decode($data,true);
      Excel::create('Tickets', function($excel) use($data) {
        $excel->sheet('Sheet1', function($sheet) use($data) {
            $sheet->fromArray($data);
            $sheet->cell('J1', function($cell) {
                $cell->setValue('channel_name');
            });
            $sheet->cell('A1', function($cell) {
                $cell->setValue('id');
            });
        });
      })->export('csv');
  }
}
