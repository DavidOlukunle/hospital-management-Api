<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UpdateAppointmentPolicy
{
    /**
     * Determine whether the user can view any models.
     */


    /**
     * Determine whether the user can view the model.
     */


    /**
     * Determine whether the user can create models.
     */


    /**
     * Determine whether the user can update the model.
     */
    public function acceptAppointment(User $user, Appointment $appointment)
    {
        //return $user->name == $appointment->doctor_name;
        return $user->role == 'doctor';


        }







    /**
     * Determine whether the user can delete the model.
     */


    /**
     * Determine whether the user can restore the model.
     */

}
