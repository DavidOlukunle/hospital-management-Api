<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointmentRequest;
use App\Traits\HttpResponses;

class AppointmentController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allAppointment = [
            'id' => 1,
            'name' => 'david',
            'message' => 'doctor needed'
        ];

        return response()->json($allAppointment);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $request->validated($request->all());

        $appointment = Appointment::create([
            'message' => $request->message,
            'phone_number' => $request->phone_number,
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
}
