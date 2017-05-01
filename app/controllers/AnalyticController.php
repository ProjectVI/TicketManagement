<?php

class AnalyticController extends BaseController {

  public function index() {
      $a1 = Ticket::whereRaw('DATE(created_at) = CURDATE()')->count();
      $a2 = Ticket::where('status_id','=','2')->count();
      $a3 = 'ice';
      $a4 = 'ice';
      $a5 = 'ice';
      $a6 = 'ice';
      return View::make('dashboard/analytics')
            ->with(compact('a1'))
            ->with(compact('a2'))
            ->with(compact('a3'))
            ->with(compact('a4'))
            ->with(compact('a5'))
            ->with(compact('a6'));
  }
}
