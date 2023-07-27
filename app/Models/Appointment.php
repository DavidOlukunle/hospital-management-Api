<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'name', 'email', 'phone_number', 'user_id'];

    public function Doctor() {
        return $this->belongsTo(Doctor::class);
    }
}
