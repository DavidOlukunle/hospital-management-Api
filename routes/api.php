<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorVerificationController;

use App\Models\Appointment;

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
//public routes
Route::get('/appointment/{appointment}', [AppointmentController::class, 'show']);

Route::post('/register', [AuthController::class, 'Register']);
Route::post('/login', [AuthController::class, 'Login']);
Route::get('/all_users', [AuthController::class, 'index']);


Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/logout', [AuthController::class, 'Logout']);
    Route::post('/doctor_verification', [DoctorVerificationController::class, 'VerifyDoctor']);
    // Route::post('/appointment', [AppointmentController::class, 'store']);
    // Route::get('/appointment/{appointment}', [AppointmentController::class, 'show']);
    // Route::delete('/apointment/{appointment}', [AppointmentController::class, 'destroy']);
  // Route::resource('/appointment', '\App\Http\Controllers\AppointmentController' );


});






