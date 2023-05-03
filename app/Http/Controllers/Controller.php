<?php

namespace App\Http\Controllers;

use http\Client\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $userType = auth()->user()->type;

        if ($userType == 0)
            return view('system.user.index');
        else {
            $NumOfUsers = DB::table('users')->count();
            return view('system.admin.index', compact('NumOfUsers'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
