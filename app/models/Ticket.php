<?php

class Ticket extends Eloquent{

	protected $table = 'tickets';

  public function channel()
	{
	    return $this->belongsTo('Channel');
	}

	public function subject()
	{
	    return $this->belongsTo('Subject');
	}

  public function status()
	{
	    return $this->belongsTo('Status');
	}

  public function created_by()
	{
	    return $this->belongsTo('User','created_by');
	}

	public function updated_by()
	{
	    return $this->belongsTo('User','updated_by');
	}
}
