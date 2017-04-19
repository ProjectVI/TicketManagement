<?php

class TicketController extends BaseController {

  public function showTickets()
  {
      return View::make('dashboard/tickets');
  }

}
