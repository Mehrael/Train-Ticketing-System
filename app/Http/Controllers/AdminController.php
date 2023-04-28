<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $NumOfUsers = DB::table('users')->count();
        return view('system.admin.index',compact('NumOfUsers'));
    }
    public function station()
    {
        $stations = DB::table('stations')->get();
        return view('system.admin.Station', compact('stations'));
    }

    public function addStation(Request $request)
    {
        $station = $request->name;
        DB::table('stations')->insert([
            'name' => $station
        ]);
        return redirect('station');
    }

    public function trains()
    {
        $trains = DB::table('trains')->get();
        return view('system.admin.Trains', compact('trains'));
    }

    public function addTrain(Request $request)
    {
        $trainNum = $request->trainNum;
        $type = $request->type;
        DB::table('trains')->insert([
            'TrainNum' => $trainNum,
            "Type" => $type
        ]);
        return redirect('trains');
    }

    public function schedule()
    {
        $schedule = DB::table('trains')
            ->join('schedules', 'trains.id', '=', 'schedules.TrainID')
            ->join('stations as start_station', 'start_station.id', '=', 'schedules.StartStationID')
            ->join('stations as end_station', 'end_station.id', '=', 'schedules.EndStationID')
            ->select('trains.TrainNum', 'start_station.name as start_station_name', 'end_station.name as end_station_name', 'schedules.Date', 'schedules.Time', 'schedules.id')
            ->get();

        $trains = DB::table('trains')->get();
        $stations = DB::table('stations')->get();
        return view('system.admin.Schedule', compact('schedule', 'trains', 'stations'));
    }

    public function addToSchedule(Request $request)
    {
        $train = $request->TrainID;
        $date = $request->date;
        $time = $request->time;
        $StartID = $request->StartID;
        $EndID = $request->EndID;

        DB::table('schedules')->insert([
            'TrainID' => $train,
            "Date" => $date,
            "Time" => $time,
            "StartStationID" => $StartID,
            "EndStationID" => $EndID
        ]);
        return redirect('schedule');
    }

    public function tickets()
    {
        $schedule = DB::table('trains')
            ->join('schedules', 'trains.id', '=', 'schedules.TrainID')
            ->join('stations as start_station', 'start_station.id', '=', 'schedules.StartStationID')
            ->join('stations as end_station', 'end_station.id', '=', 'schedules.EndStationID')
            ->select('trains.TrainNum', 'start_station.name as start_station_name', 'end_station.name as end_station_name', 'schedules.Date', 'schedules.Time', 'schedules.id')
            ->get();

        $tickets = DB::table('tickets')
            ->join('schedules', 'schedules.id', '=', 'tickets.ScheduleID')
            ->join('trains', 'trains.id', '=', 'schedules.TrainID')
            ->join('stations as start', 'start.id', '=', 'schedules.StartStationID')
            ->join('stations as end', 'end.id', '=', 'schedules.EndStationID')
            ->select('schedules.*', 'trains.*', 'tickets.class', 'tickets.price', 'start.name as start_station', 'end.name as end_station')
            ->get();
        return view('system.admin.Tickets', compact('schedule', 'tickets'));
    }

    public function addTicket(Request $request)
    {
        $schedule = $request->scheduleID;
        $class = $request->class;
        $price = $request->price;

        DB::table('tickets')->insert([
            'ScheduleID' => $schedule,
            "class" => $class,
            "price" => $price,
        ]);
        return redirect('tickets');
    }
}
