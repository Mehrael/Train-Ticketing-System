<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function ViewTrainSchedules()
    {
        $schedule = DB::table('trains')
            ->join('schedules', 'trains.id', '=', 'schedules.TrainID')
            ->join('stations as start_station', 'start_station.id', '=', 'schedules.StartStationID')
            ->join('stations as end_station', 'end_station.id', '=', 'schedules.EndStationID')
            ->select('trains.TrainNum', 'start_station.name as start_station_name', 'end_station.name as end_station_name', 'schedules.Date', 'schedules.Time', 'schedules.id')
            ->get();
        return view('system.user.ViewTrainSchedules',compact('schedule'));
    }
}
