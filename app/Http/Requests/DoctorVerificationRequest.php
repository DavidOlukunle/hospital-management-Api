<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorVerificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'years_of_experience' => ['required', 'string'],
            'cv' => ['required', 'file'],
            'speciality' =>['required'],
            'image' =>['required', 'image'],
            'phone_number' =>['required', 'string']

        ];
    }
}
