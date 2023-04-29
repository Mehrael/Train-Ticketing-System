<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function ViewTrainSchedules()
    {
        $schedule = DB::table('trains')
            ->join('schedules', 'trains.id', '=', 'schedules.TrainID')
            ->join('stations as start_station', 'start_station.id', '=', 'schedules.StartStationID')
            ->join('stations as end_station', 'end_station.id', '=', 'schedules.EndStationID')
            ->select('trains.TrainNum', 'start_station.name as start_station_name', 'end_station.name as end_station_name', 'schedules.Date', 'schedules.Time', 'trains.Type')
            ->get();
        return view('system.user.ViewTrainSchedules', compact('schedule'));
    }

    public function Booking()
    {
        $tickets = DB::table('tickets')
            ->join('schedules', 'schedules.id', '=', 'tickets.ScheduleID')
            ->join('trains', 'trains.id', '=', 'schedules.TrainID')
            ->join('stations as start', 'start.id', '=', 'schedules.StartStationID')
            ->join('stations as end', 'end.id', '=', 'schedules.EndStationID')
            ->select('schedules.*', 'trains.*', 'trains.id as TrainID', 'tickets.id as iD', 'tickets.class', 'tickets.price', 'start.name as start_station', 'end.name as end_station')
            ->get();

        $trains = DB::table('tickets')->select('trains.*')
            ->distinct()
            ->join('schedules', 'schedules.id', '=', 'tickets.ScheduleID')
            ->join('trains', 'trains.id', '=', 'schedules.TrainID')
            ->get();

        return view('system.user.Booking', compact('tickets','trains'));
    }

    public function confirmBooking(Request $request)
    {
        $train = $request->TrainID;
        $class = $request->class;
        $NofTickets = $request->NumTickets;
        $userID = Auth::id();

        $ticketDetails = DB::table('tickets')
            ->join('schedules', 'schedules.id', '=', 'tickets.ScheduleID')
            ->join('trains', 'trains.id', '=', 'schedules.TrainID')
            ->join('stations as start', 'start.id', '=', 'schedules.StartStationID')
            ->join('stations as end', 'end.id', '=', 'schedules.EndStationID')
            ->select('tickets.*', 'start.name as start_station', 'end.name as end_station', 'schedules.Date', 'schedules.Time', 'trains.TrainNum', 'trains.Type')
            ->where('trains.id', '=',$train)
            ->where('tickets.class', $class)
            ->first();

        $userDetails = DB::table('users')->select('*')->where('id', '=', $userID)->first();

        $currentDate = now()->format('Y-m-d');
        $currentTime = now()->format('H:i:s');

        $total = $ticketDetails->price * $NofTickets;

        return view('system.user.confirmBooking', compact('ticketDetails', 'userDetails', 'class', 'NofTickets','currentDate','currentTime','total'));
    }
}
