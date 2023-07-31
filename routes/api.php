<?php

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorVerificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//public route
Route::post('/register', [AuthController::class, 'Register']);
Route::post('/login', [AuthController::class, 'Login']);
Route::get('/all_users', [AuthController::class, 'index']);
Route::get('/search_doctor', [AppointmentController::class, 'findDoctor']);
Route::get('/allDoctors', [AppointmentController::class, 'allDoctors']);
Route::get('/accept_appointment/{id}', [DoctorController::class, 'acceptAppointment']);
Route::get('/reject_appointment/{id}', [DoctorController::class, 'rejectAppointment']);


//protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::post('/logout', [AuthController::class, 'Logout']);
    Route::post('/doctor_verification', [DoctorVerificationController::class, 'VerifyDoctor']);
    Route::resource('/appointment', '\App\Http\Controllers\AppointmentController' );
    Route::get('/my_appointments', [DoctorController::class, 'viewAllAppointment']);


});






