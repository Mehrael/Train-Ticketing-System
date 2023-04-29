<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [\App\Http\Controllers\Controller::class,'index'])->name('home');
});

Route::get('logout', [\App\Http\Controllers\Controller::class, 'logout']);

Route::get('station', [AdminController::class, 'station']);

Route::post('addStation', [AdminController::class, 'addStation']);

Route::get('trains', [AdminController::class, 'trains']);

Route::post('addTrain', [AdminController::class, 'addTrain']);

Route::get('schedule', [AdminController::class, 'schedule']);

Route::post('addToSchedule', [AdminController::class, 'addToSchedule']);

Route::get('tickets', [AdminController::class, 'tickets']);

Route::post('addTicket', [AdminController::class, 'addTicket']);

Route::get('ViewTrainSchedules', [UserController::class, 'ViewTrainSchedules']);

Route::get('Booking', [UserController::class, 'Booking']);

Route::post('confirmBooking', [UserController::class, 'confirmBooking']);
