<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorVerification extends Model
{
    use HasFactory;
    protected $fillable = ['years_of_experience', 'cv', 'image', 'speciality', 'phone_number', 'user_id'];
}
