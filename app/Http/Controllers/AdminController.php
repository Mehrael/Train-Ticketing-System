<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function station()
    {
        $stations = DB::table('stations')->get();
        return view('system.admin.Station',compact('stations'));
    }

    public function addStation(Request $request)
    {
        $station = $request->name;
        DB::table('stations')->insert([
            'name' => $station
        ]);
        return redirect('station');
    }


}
