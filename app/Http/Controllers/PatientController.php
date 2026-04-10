<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePatientRequest;
use App\Http\Requests\RendezVousRequest;
use App\Models\User;
use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{

    public function register(CreatePatientRequest $request)
    {
        $patientData = $request->validated();
        $patientData['password'] = Hash::make($patientData['password']);
        $patientData['role'] = 'PATIENT';

        $patient = User::create($patientData);
        $user_role = Auth::user()->role ;
        if($user_role == "ADMIN"){
        $controller = new AdminController();
        return $controller->patients();
        }else if($user_role == "SECRETARY"){

        }else{
            //return view('welcome');
        }
    }

    public function requestAppointment(RendezVousRequest $request)
    {
        $user_id = Auth::user()->id ;
        $RendezVousData = $request->validated();
        $RendezVousData['statut'] = 'PENDING';
        $RendezVousData['patient_id'] = $user_id;
        $rendezVous = RendezVous::create($RendezVousData);

        return response()->json([
            'message' => 'Rendez-vous created successfully',
            'data'    => $rendezVous
        ], 201);
    }

    public function viewMyProgress()
    {

    }
}
