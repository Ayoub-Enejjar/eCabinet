<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePatientRequest;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function register(CreatePatientRequest $request)
    {
        $RegisterData = $request->validated() ;
        $RegisterData['role'] = 'PATIENT' ; 
        $patient = User::create($RegisterData);
        return response()->json([
            'message'=> 'Patient register with succesful',
            'user'=> $patient
        ] , 200);
    }
    public function requestAppointment()
    {

    }
    public function viewMyProgress()
    {

    }
}
