<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\DoctorVerification;
use App\Http\Resources\DoctorResource;
use App\Http\Requests\StoreAppointmentRequest;
use App\Traits\FilterSearch;

class AppointmentController extends Controller
{
    use HttpResponses;


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $request->validated($request->all());

        $appointment = Appointment::create([
            'message' => $request->message,
            'phone_number' => $request->phone_number,
            'doctor_name' =>$request->doctor_name,
            'user_id' => auth()->user()->id
        ]);

        return $this->success([
            'appointment' => $appointment,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return response([
          'appointment' =>  Appointment::Find($appointment)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
       $appointment->delete();

       return response()->json([
        'message' => 'successfully deleted'
       ]);
    }

    // users can find a doctor  and view their profile for necessary appointment information
    public function findDoctor(Request $request)
    {
        $query = DoctorVerification::query();

        if ($request->has('speciality')) {
            $query->where('speciality', 'LIKE', '%' . $request->input('speciality') . '%');
        }


        if ($request->has('years_of_experience')) {
            $query->where('years_of_experience', 'LIKE', '%' . $request->input('years_of_experience') . '%');
        }

        $doctors = $query->where('status', 'processing')->get();

            return response()->json($doctors);

     }


    // users can view all doctors

    public function allDoctors()
    {
        return DoctorResource::collection(
            DoctorVerification::all()->where('status', 'processing')
        );


    }
}
