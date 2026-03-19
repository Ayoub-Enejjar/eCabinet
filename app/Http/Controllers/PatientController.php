<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePatientRequest;
use App\Http\Requests\RendezVousRequest;
use App\Models\User;
use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{

    public function register(CreatePatientRequest $request)
    {
        $patientData = $request->validated();
        $patientData['password'] = Hash::make($patientData['password']);

        if (array_key_exists('numero_secretaire_sociale', $patientData)) {
            $patientData['numero_securite_sociale'] = $patientData['numero_secretaire_sociale'];
            unset($patientData['numero_secretaire_sociale']);
        }

        $patientData['role'] = 'PATIENT';
        $patient = User::create($patientData);

        return response()->json([
            'message' => 'adding Patient with succesful',
            'user' => $patient,
        ], 200);
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

