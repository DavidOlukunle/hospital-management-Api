<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'name', 'email', 'phone_number', 'doctor_name', 'user_id'];

    public function Doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
