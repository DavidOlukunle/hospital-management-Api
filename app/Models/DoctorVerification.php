<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorVerification extends Model
{
    use HasFactory;
    protected $fillable = ['years_of_experience', 'cv', 'image', 'speciality', 'phone_number', 'user_id'];

   public function scopeFilter($query, $filters)
   {
    if($filters['search'] ?? false)
    {
        $query->where('speciality', 'like', '%'.request('search').'%')
        ->orWhere('years_of_experience', 'like', '%'.request('search').'%');
    }
   }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
