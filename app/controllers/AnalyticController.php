<?php

class AnalyticController extends BaseController {

  public function index() {
      // (1) Today's Ticket(s)
      $sql1 = Ticket::whereRaw('DATE(created_at) = CURDATE()')->count();

      // (2) Overall Pending Ticket(s)
      $sql2 = Ticket::where('status_id','=','2')->count();

      // (3) Today's Team Performance
      $sql3 = DB::select(DB::raw("
                SELECT teams.name AS teamname,COUNT(tickets.id) AS count
                FROM tickets
                  INNER JOIN users
                    ON tickets.created_by = users.id
                  INNER JOIN teams
                    ON users.team_id = teams.id
                WHERE DATE(tickets.created_at) <= CURDATE()
                GROUP BY teams.name;"));

      $chart3=array();
      foreach ($sql3 as $result) {
          $chart3[$result->teamname]=(int)$result->count;
      }

      // (4) Today's Staff Performance
      $sql4 = DB::select(DB::raw("
                SELECT users.username as staffname,
                  ROUND((count(tickets.id)/(SELECT count(tickets.id) AS count 
                  FROM tickets
                  WHERE DATE(created_at) = CURDATE()) )*100,2) AS perf
                FROM tickets
                  INNER JOIN users
                    ON tickets.created_by = users.id
                WHERE DATE(tickets.created_at) = CURDATE()
                GROUP BY users.name;"));

      $chart4=array();
      foreach ($sql4 as $result) {
          $chart4[$result->staffname]=(int)$result->perf;
      }

      // (5) Today's Ticket Per Subject
      $sql5 = DB::select(DB::raw("
                SELECT ticket_subjects.name AS subjectname,COUNT(tickets.id) AS count
                FROM tickets
                  INNER JOIN ticket_subjects
                    ON tickets.subject_id = ticket_subjects.id
                WHERE DATE(tickets.created_at) <= CURDATE()
                GROUP BY ticket_subjects.name;"));
      $chart5=array();
      foreach ($sql5 as $result) {
          $chart5[$result->subjectname]=(int)$result->count;
      }

      // (6) Today's Ticket Per Channel
      $sql6 = DB::select(DB::raw("
                SELECT users.username AS staffname,
                  ROUND((count(tickets.id)/(SELECT count(tickets.id) AS COUNT FROM tickets
                  WHERE DATE(created_at) = CURDATE()) )*100,2) AS perf
                FROM tickets
                  INNER JOIN users
                    ON tickets.created_by = users.id
                WHERE DATE(tickets.created_at) <= CURDATE()
                GROUP BY users.name;"));
      $chart6=array();
      foreach ($sql6 as $result) {
          $chart6[$result->staffname]=(int)$result->perf;
      }

      // (8) Overall Close Ticket(s) by RST
      $sql8 = Ticket::where('status_id','=','3')->count();

      // (9) Overall Close Ticket(s) by AR
      $sql9 = Ticket::where('status_id','=','4')->count();

      $reports = Ticket::with(['created_by', 'updated_by'])
          ->orderBy('created_at', 'desc')
          ->where('flag','!=','N')->get();

      return View::make('dashboard/analytics')
          ->with(compact('sql1'))
          ->with(compact('sql2'))
          ->with(compact('reports'))
          ->with(compact('chart3'))
          ->with(compact('chart4'))
          ->with(compact('chart5'))
          ->with(compact('chart6'))
          ->with(compact('sql8'))
          ->with(compact('sql9'));
  }
    public function exportReports($data)
    {
        /*
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
        */
    }
}
