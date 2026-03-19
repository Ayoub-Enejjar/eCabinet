<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDoctorRequest;
use App\Http\Requests\CreatePatientRequest;
use App\Http\Requests\CreateSecretaryRequest;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function createDoctor(CreateDoctorRequest $request)
    {
        $DoctorData =$request->validated();
        $DoctorData['role'] = 'DOCTOR';
        $doctor = User::create($DoctorData);
        return response()->json([
            'message'=> 'adding doctor with succesful',
            'user'=> $doctor
        ] , 200);
    }

    public function createSecretary(CreateSecretaryRequest $request)
    {
        $SecretaryData = $request->validated() ;
        $SecretaryData['role'] = 'SECRETARY' ;
        $secretary = User::create($SecretaryData);
        return response()->json([
            'message'=> 'adding secretary with succesful',
            'user'=> $secretary
        ] , 200);
    }

    public function createPatient(CreatePatientRequest $request)
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $PatientData = $request->validated() ;
        $PatientData['role'] = 'PATIENT' ;
        $patient = User::create($PatientData);
=======
>>>>>>> aa3fafb4 (Add the UI interfaces for login/sign up/forget)
=======
        $PatientData = $request->validated() ;
        $PatientData['role'] = 'PATIENT' ;
        $patient = User::create($PatientData);
>>>>>>> f6a70a56c184f5ce02c0e7265771fbf4ac5ff294
        return response()->json([
            'message'=> 'adding Patient with succesful',
            'user'=> $patient
        ] , 200);
    }

    public function viewGlobalStats()
    {
<<<<<<< HEAD
<<<<<<< HEAD
    //
=======
=======
>>>>>>> f6a70a56c184f5ce02c0e7265771fbf4ac5ff294
        return response()->json([
            'doctors_count' => User::where('role', 'DOCTOR')->count(),
            'secretaries_count' => User::where('role', 'SECRETARY')->count(),
            'patients_count' => User::where('role', 'PATIENT')->count(),
            'appointments_count' => \App\Models\RendezVous::count(),
        ], 200);
<<<<<<< HEAD
>>>>>>> aa3fafb4 (Add the UI interfaces for login/sign up/forget)
=======
>>>>>>> f6a70a56c184f5ce02c0e7265771fbf4ac5ff294
    }
}
