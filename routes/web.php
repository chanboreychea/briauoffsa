<?php

use App\Enum\Department;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\BookingMeetingRoomController;

Route::get('/', [BookingMeetingRoomController::class, 'showBookingMeetingRooms'])->name('homepage');

Route::get('/admins', function () {
    return view('adminLogin');
})->name('admin-login');
Route::post('/admins/login', [authController::class, 'login']);
Route::get('/admins/logout', [authController::class, 'logout']);

Route::middleware(['admin'])->group(function () {

    Route::get('/booking', [BookingMeetingRoomController::class, 'index']);
    Route::post('/booking/approve/{bookingId}', [BookingMeetingRoomController::class, 'adminApprove']);
    Route::delete('/booking/{bookingId}', [BookingMeetingRoomController::class, 'adminDestroy']);
    Route::get('/booking/export/excel', [BookingMeetingRoomController::class, 'exportBookingMeetingRoom']);

    // Route::resource('/users', UserController::class);
});


Route::get('/login', function () {
    return view('userLogin');
})->name('user-login');
// Route::post('/users/login', [UserController::class, 'login']);
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

// Route::get('/d', function () {
//     $directedBy = [];
//     $interOfficeOrDepartmental = [];
//     $departments = Department::DEPARTMENTS;
//     $directedBy[] = "ប្រធានអង្គភាព";
//     $directedBy[] = "អនុប្រធានអង្គភាព";
//     $interOfficeOrDepartmental[] = null;
//     foreach ($departments as $key => $department) {
//         $directedBy[] = "ប្រធាននាយកដ្ឋាន " . $key;
//         $directedBy[] = "អនុប្រធាននាយកដ្ឋាន " . $key;
//         foreach ($department as $key => $office) {
//             $directedBy[] = "ប្រធានការិយាល័យ " . $office;
//             $directedBy[] = "អនុប្រធានការិយាល័យ " . $office;
//             $interOfficeOrDepartmental[] = $office;
//         }
//     }
//     dd($interOfficeOrDepartmental);
// });
