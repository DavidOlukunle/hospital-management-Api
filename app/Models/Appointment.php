<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\DoctorVerification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'name', 'email', 'phone_number', 'doctor_name', 'user_id'];

    public function Doctor() {
        return $this->belongsTo(DoctorVerification::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
