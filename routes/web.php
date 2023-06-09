<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    return view('404');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Controller::class, 'index'])->name('home');
});

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('logout', [\App\Http\Controllers\Controller::class, 'logout']);

Route::get('station', [AdminController::class, 'station']);

Route::post('addStation', [AdminController::class, 'addStation']);

Route::get('trains', [AdminController::class, 'trains']);

Route::post('addTrain', [AdminController::class, 'addTrain']);

Route::get('schedule', [AdminController::class, 'schedule']);

Route::post('addToSchedule', [AdminController::class, 'addToSchedule']);

Route::get('tickets', [AdminController::class, 'tickets']);

Route::get('bookings', [AdminController::class, 'bookings']);

Route::post('addTicket', [AdminController::class, 'addTicket']);

Route::get('ViewTrainSchedules', [UserController::class, 'ViewTrainSchedules']);

Route::get('Booking', [UserController::class, 'Booking']);

Route::post('confirmBooking', [UserController::class, 'confirmBooking']);

Route::post('Confirm', [UserController::class, 'Confirm']);

Route::post('UpdateUserData', [UserController::class, 'UpdateUserData']);
