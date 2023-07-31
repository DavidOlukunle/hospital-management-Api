<?php

namespace App\Http\Resources;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->user_id,
            'years_of_experience' => (string)$this->years_of_experience,
            'speciality' => (string)$this->speciality,
            'phone_number' => (string)$this->phone_number,

            'relationship' => [
                'doctor_name' => $this->user->name
            ]
        ];
    }
}
