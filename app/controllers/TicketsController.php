<?php

class TicketsController extends BaseController {

	/**
	 * Display a listing of tickets
	 *
	 * @return Response
	 */
	public function index()
	{
		//$tickets = Ticket::all();
        $tickets = Ticket::table('tickets')
            ->join('ticket_subjects', 'tickets.subject_id', '=', 'ticket_subjects.subject_id')
            ->join('ticket_channels', 'tickets.channel_id', '=', 'ticket_channels.channel_id')
            ->join('ticket_status', 'tickets.status_id', '=', 'ticket_status.status_id')
            ->join('users', 'tickets.created_by', '=', 'users.id')
            ->select('tickets.*', 'ticket_subjects.subject_name', 'users.firstname' ,'ticket_status.status_name' ,'ticket_channels.channel_name')
            ->get();
		return View::make('home', compact('tickets'));


	}

	/**
	 * Show the form for creating a new ticket
	 *
	 * @return Response
	 */
	public function create()
	{
	    echo "test";
		//return View::make('tickets.create');

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

		//Ticket::create($data);

		//return Redirect::route('tickets.index');
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

		return View::make('home', compact('ticket'));
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
