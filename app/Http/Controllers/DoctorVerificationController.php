<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DoctorVerification;
use App\Http\Requests\DoctorVerificationRequest;
use App\traits\HttpResponses;

class DoctorVerificationController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'hello doctors'
        ]);
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
    public function VerifyDoctor(DoctorVerificationRequest $request)
    {

        $request->validated($request->all());

       $user = DoctorVerification::create([
        'years_of_experience' => $request->years_of_experience,
        'cv' => $request->cv,
        'speciality' => $request->speciality,
        'phone_number' => $request->phone_number,
        'image' => $request->image,
        'user_id' => auth()->user()->id,
        'status' => 'processing',



    ]);
    return $this->success([
        'user' => $user
    ]);



    }

    /**
     * Display the specified resource.
     */
    public function show(DoctorVerification $doctorVerification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorVerification $doctorVerification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DoctorVerification $doctorVerification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorVerification $doctorVerification)
    {
        //
    }
}
