<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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

        return view('system.user.Booking', compact('tickets', 'trains'));
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
            ->where('trains.id', '=', $train)
            ->where('tickets.class', $class)
            ->first();

        $userDetails = DB::table('users')->select('*')->where('id', '=', $userID)->first();

        $currentDate = now()->format('Y-m-d');
        $currentTime = now()->format('H:i:s');

        $total = $ticketDetails->price * $NofTickets;

        return view('system.user.confirmBooking', compact('ticketDetails', 'userDetails', 'class', 'NofTickets', 'currentDate', 'currentTime', 'total'));
    }

    public function Confirm(Request $request)
    {
        $userData = DB::table('users')->select('*')->where('id', '=', Auth::id())->first();
        if ($userData->phone == null || $userData->photo == null)
            return view('system.user.completeData', compact('userData'));
        else {
            DB::table('bookings')->insert([
               "UserID"=>Auth::id(),
               "TicketID"=>$request->TicketID,
                "NumberOfTickets"=>$request->NTic,
                "BookingDate"=>$request->date,
                "BookingTime"=>$request->time
            ]);

            $ticketData = DB::table('tickets')->select('*')->where('id', '=', $request->TicketID)->first();
            $schedule = DB::table('schedules')->select('*')->where('id', '=', $ticketData->ScheduleID)->first();
            $train = DB::table('trains')->select('*')->where('id', '=', $schedule->TrainID)->first();
            $from = DB::table('stations')->select('*')->where('id', '=', $schedule->StartStationID)->first();
            $to = DB::table('stations')->select('*')->where('id', '=', $schedule->EndStationID)->first();

            $type = "Express";
            if ($train->Type)
                $type = "VIP";

            $class = "1st";
            if ($ticketData->class == 2)
                $class = "2nd";

            $path = 'QRs/'.time().'.svg';

            $qr = QrCode::format('svg')
                ->size(500)->errorCorrection('H')
                ->color(13,66,255)
                ->margin(1)
                ->generate("
                Name: $userData->name,
                Phone: $userData->phone,
                Number of tickets: $request->NTic,
                Train: $train->TrainNum $type $class Class,
                From: $from->name,
                To: $to->name,
                Date: $schedule->Date,
                Train Moving at: $schedule->Time,
                Booked at: $request->date $request->time",
                public_path($path)
                );

            return view('system.user.QR', compact('path'));

        }
    }

    public function UpdateUserData(Request $request)
    {
        $phone = $request->phone;

        $photo = $request->file('photo');
        $img_name = time() . $photo;
        $path = $photo->move('uploads', $img_name);
        $path = '\\' . $path;

        DB::table('users')->where('id', '=', Auth::id())->update([
            "phone" => $phone,
            "photo" => $path
        ]);

        return redirect('Booking');
    }

}
