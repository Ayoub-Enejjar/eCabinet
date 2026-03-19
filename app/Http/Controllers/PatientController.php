<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePatientRequest;
use App\Http\Requests\RendezVousRequest;
use App\Models\User;
use App\Models\Patient;
use App\Models\RendezVous;
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
    
    public function requestAppointment(RendezVousRequest $request)
    {
        $RendezVousData = $request->validated();
        $RendezVousData['statut'] = 'PENDING';
        $rendezVous = RendezVous::create( $RendezVousData);

        return response()->json([
            'message' => 'Rendez-vous created successfully',
            'data' => $rendezVous
        ], 201);
    }
    public function viewMyProgress()
    {

    }
}

