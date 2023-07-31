<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;

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
}
