<?php
namespace App\Traits;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\DoctorVerification;

trait FilterSearch {
  protected function acceptAppointment($id){
    $appointment = Appointment::where('id', $id);
    $appointment->update([
        'status' => 'approved'
    ]);
  }

}
