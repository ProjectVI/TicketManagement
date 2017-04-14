<?php

class TicketsController extends \BaseController {

	/**
	 * Display a listing of tickets
	 *
	 * @return Response
	 */
	public function index()
	{
		//$tickets = Ticket::all();
        $tickets = DB::table('tickets')
            ->join('ticket_subject', 'tickets.subject_id', '=', 'ticket_subject.subject_id')
            ->join('ticket_channels', 'tickets.channel_id', '=', 'ticket_channels.channel_id')
            ->join('ticket_status', 'tickets.status_id', '=', 'ticket_status.status_id')
            ->join('users', 'tickets.created_by', '=', 'users.user_id')
            ->select('tickets.*', 'ticket_subject.subject_name', 'users.firstname' ,'ticket_status.status_name' ,'ticket_channels.channel_name')
            ->get();
		return View::make('tickets.index', compact('tickets'));
	}

	/**
	 * Show the form for creating a new ticket
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tickets.create');
        //try
        //{
//            $user = Sentry::createUser(array(
//                'firstname' => Input::get('firstname'),
//                'surname' => Input::get('surname'),
//                'username' => Input::get('username'),
//                'email' => Input::get('email'),
//                'password' => Input::get('password'),
//                'role_id' => Input::get('role_id'),
//                'team_id' => Input::get('team_id'),
//            ));
        /*
        $ticket= Input::all();
        $ticket = new Ticket;
        $ticket->domain = Input::get('domain');
        $ticket->organization = Input::get('organization');
        $ticket->problem = Input::get('problem');
        $ticket->answer = Input::get('answer');
        $ticket->remark = Input::get('remark');
        $ticket->contact_name = Input::get('contact_name');
        $ticket->contact_phone = Input::get('contact_phone');
        $ticket->contact_email = Input::get('contact_email');
        $ticket->fax_id = Input::get('faxid');
        */
        /*
        $ticket->email_id = Input::get('email_id');
        $ticket->chat_id = Input::get('chat_id');

        $ticket->created_at = Input::get('created_at');
        $ticket->updated_at = Input::get('updated_at');
        $ticket->created_by = Input::get('created_by');
        $ticket->updated_by = Input::get('updated_by');
        */
        /*
        $ticket->created_by = 'Ammii';
        $ticket->updated_by = 'Ammii';
        $ticket->flag = 'A';
        $ticket->channel_id = '1';
        $ticket->subject_id = '1';
        $ticket->status_id = '1';
        $ticket->save();
        echo 'Success!';

        return Redirect::back();
        */
        //}
        //catch (Exception $e)
        //{
        //    echo 'Error';
        //}
	}

	/**
	 * Store a newly created ticket in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Ticket::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Ticket::create($data);

		return Redirect::route('tickets.index');
	}

	/**
	 * Display the specified ticket.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ticket = Ticket::findOrFail($id);

		return View::make('tickets.show', compact('ticket'));
	}

	/**
	 * Show the form for editing the specified ticket.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ticket = Ticket::find($id);

		return View::make('tickets.edit', compact('ticket'));
	}

	/**
	 * Update the specified ticket in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$ticket = Ticket::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Ticket::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$ticket->update($data);

		return Redirect::route('tickets.index');
	}

	/**
	 * Remove the specified ticket from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Ticket::destroy($id);

		return Redirect::route('tickets.index');
	}

    public function subject(subject $subject)
    {

        $data = $subject->lists('name', 'id');
        return view('pages.subject')->with('subjects', $data);
    }
}
