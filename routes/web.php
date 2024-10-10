<?php

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\BookingMeetingRoomController;

Route::get('/', [BookingMeetingRoomController::class, 'showBookingMeetingRooms'])->name('homepage');

Route::get('/admins', function () {
    return view('adminLogin');
})->name('admin-login');
Route::post('/admins/login', [Auth::class, 'login']);
Route::get('/admins/logout', [Auth::class, 'logout']);

Route::middleware(['admin'])->group(function () {

    Route::get('/booking', [BookingMeetingRoomController::class, 'index']);
    Route::post('/booking/approve/{bookingId}', [BookingMeetingRoomController::class, 'adminApprove']);
    Route::delete('/booking/{bookingId}', [BookingMeetingRoomController::class, 'adminDestroy']);
    Route::get('/booking/export/excel', [BookingMeetingRoomController::class, 'exportBookingMeetingRoom']);
});

Route::get('/login', function () {
    return view('userLogin');
})->name('user-login');
Route::get('/logout', [UserController::class, 'logout']);
Route::middleware(['user'])->group(function () {

    Route::get('/calendar', [BookingMeetingRoomController::class, 'calendar'])->name('calendar');
    Route::get('/days/{day}/{month}', [BookingMeetingRoomController::class, 'showRoomAndTime']);
    Route::post('/booking', [BookingMeetingRoomController::class, 'bookingRoom']);
});

//guest
Route::get('/guests', [GuestController::class, 'index']);
Route::get('/guests/request', [GuestController::class, 'getCode']);
Route::get('/guests/login', [GuestController::class, 'loginWithGenerateCode']);
