<?php

namespace App\Http\Controllers;

use App\Models\Desk;
use App\Models\Ticket;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DesksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desks  $desks
     * @return \Illuminate\Http\Response
     */
    public function show(Desk $desks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desks  $desks
     * @return \Illuminate\Http\Response
     */
    public function edit(Desk $desks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desks  $desks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $desks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desks  $desks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desk $desks)
    {
        //
    }

    public function getDesksByTicket($ticket_id)
    {
        $ticket = Ticket::find($ticket_id);
        if($ticket->type == 'D') $ticket->zone = 1;
        elseif($ticket->type == 'MR') $ticket->zone = 2;
        $start_time = Carbon::parse($ticket->datetime);
        $end_time = Carbon::parse($ticket->datetime)->addHours($ticket->duration);
        
        $sod = Carbon::parse($start_time)->startOfDay();
        $eod = Carbon::parse($start_time)->endOfDay();
        // $reservedDesks = Reservation::select('desk_id')
        //     ->whereRaw('(datetime_start >= "'.$start_time.'" and datetime_start <= "'.$end_time.'") 
        //         or (datetime_end >= "'.$start_time.'" and datetime_end <= "'.$end_time.'")')
        //     ->get();
        
        // $desks = Desk::where('zone_id',$ticket->zone)->get();
        // $desks->each(function($desk){
        //     $desk->status = '1'; 
        // });

        // foreach ($reservedDesks as $reservedDesk) 
        // {
        //      foreach ($desks as $desk) {
        //          if ($desk->id == $reservedDesk->desk_id) {
        //                 $desk->status = '0';
        //         }
        //     }
        //  }
        
        $reservationsToday = DB::table('reservations as r')
            ->selectRaw('r.id,d.id as desk_id, d.desk_name, u.name, u.id as user_id, r.datetime_start, r.datetime_end, r.duration, r.created_at, r.updated_at')
            ->leftJoin('desks as d','d.id','=','r.desk_id')
            ->leftJoin('users as u','u.id','=','r.user_id')
            ->whereRaw('r.datetime_start >= "'.$sod.'" AND datetime_start < "'.$eod.'"')
            ->get();
  
        //declare Timepoints
        $timePoints = ['07:00:00','08:00:00','09:00:00','10:00:00','11:00:00',
                '12:00:00','13:00:00','14:00:00','15:00:00','16:00:00',
                '17:00:00','18:00:00','19:00:00',
                ];

        foreach ($timePoints as $tpIndex => $tp) {
            $timePoints[$tpIndex] = $sod->format('d-m-Y '.$tp);
        }

        //declare desks
        $desks = Desk::where('zone_id',$ticket->zone)->get();
        $desks->each(function($desk){
            $desk->status = '1'; 
        });

        //validate desks
        foreach ($desks as $d) {
            foreach ($reservationsToday as $rt) {
                $srt = Carbon::parse($rt->datetime_start);
                $ert = Carbon::parse($rt->datetime_end);
                if ($d->id == $rt->desk_id) {
                    if ($start_time->between($srt,$ert,true)) {
                        $d->status = '0';
                    }
                    if ($end_time->between($srt,$ert,true)) {
                        $d->status = '0';
                    }
                }
                
            }
        }

        if ($ticket->zone == 1) {
             // echo json_encode($desks);
            return view('layouts.hotdesk')->with('desks',$desks)
                    ->with('start_time',Carbon::parse($start_time))
                    ->with('end_time',Carbon::parse($end_time));
        }
        else if ($ticket->zone == 2) {
            return view('layouts.meetingroom')->with('rooms',$desks)
                    ->with('start_time',Carbon::parse($start_time))
                    ->with('end_time',Carbon::parse($end_time));
        }
    }
    public function ticketDebug($ticket_id)
    {
        $ticket = Ticket::find($ticket_id);
        if($ticket->type == 'D') $ticket->zone = 1;
        elseif($ticket->type == 'MR') $ticket->zone = 2;
        $start_time = Carbon::parse($ticket->datetime);
        $end_time = Carbon::parse($ticket->datetime)->addHours($ticket->duration);

        $sod = Carbon::parse($start_time)->startOfDay();
        $eod = Carbon::parse($start_time)->endOfDay();
        
        $reservationsToday = DB::table('reservations as r')
            ->selectRaw('r.id,d.id as desk_id, d.desk_name, u.name, u.id as user_id, r.datetime_start, r.datetime_end, r.duration, r.created_at, r.updated_at')
            ->leftJoin('desks as d','d.id','=','r.desk_id')
            ->leftJoin('users as u','u.id','=','r.user_id')
            ->whereRaw('r.datetime_start >= "'.$sod.'" AND datetime_start < "'.$eod.'"')
            ->get();
  
        //declare Timepoints
        $timePoints = ['07:00:00','08:00:00','09:00:00','10:00:00','11:00:00',
                '12:00:00','13:00:00','14:00:00','15:00:00','16:00:00',
                '17:00:00','18:00:00','19:00:00',
                ];

        foreach ($timePoints as $tpIndex => $tp) {
            $timePoints[$tpIndex] = $sod->format('d-m-Y '.$tp);
        }

        //declare desks
        $desks = Desk::where('zone_id',$ticket->zone)->get();
        $desks->each(function($desk){
            $desk->status = '1'; 
        });

        //validate desks
        foreach ($desks as $d) {
            foreach ($reservationsToday as $rt) {
                $srt = Carbon::parse($rt->datetime_start);
                $ert = Carbon::parse($rt->datetime_end);
                if ($d->id == $rt->desk_id) {
                    if ($start_time->between($srt,$ert,true)) {
                        $d->status = '0';
                    }
                    if ($end_time->between($srt,$ert,true)) {
                        $d->status = '0';
                    }
                }
                
            }
        }
       echo json_encode($desks);
       
       
    }
}
