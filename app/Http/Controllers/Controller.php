<?php

namespace App\Http\Controllers;

use http\Client\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $userType = auth()->user()->type;

        if ($userType == 0)
            return view('system.user.index');
        else
            return view('system.admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
