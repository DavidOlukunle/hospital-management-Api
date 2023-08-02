<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\DoctorAvailability;
use App\Http\Requests\AbsenceRequest;
use App\Http\Resources\AppointmentResource;

class DoctorController extends Controller
{
    public function viewAllAppointment()
    {
        $appointment = Appointment::where('doctor_name',  auth()->user()->name)->get();

        return AppointmentResource::collection($appointment);
    }


    public function acceptAppointment( $id)
    {
       $appointment = Appointment::where('id', $id);
       $appointment->update([
        'status' => 'accepted'
       ]);
       return response()->json(['approved']);
    }


    public function rejectAppointment($id){
        $appointment = Appointment::where('id', $id);
        $appointment->update([
            'status' => 'rejected'
        ]);

        return response()->json(['rejected']);
    }


    public function absenceRequest(AbsenceRequest $request){
        $request->validated($request->all());
        $absenceRequest = DoctorAvailability::create([
            'reasons' => $request->reasons,
            'period_of_leave' => $request->period_of_leave

        ]);
        return response()->json([
            'absenceRequest' => $absenceRequest
        ]);
    }

}
