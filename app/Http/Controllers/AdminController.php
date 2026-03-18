<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function createDoctor(request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users,email,',
            'password'=>'required|string|min:8|confirmed',
            'role'=> ['string','required', Rule::in(['DOCTOR']),],
            'specialiste'=>'required|string',
            'telephone_pro' =>'required|string',
        ]);
        $doctor = User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'specialiste'=> $request->specialiste,
            'telephone_pro'=>$request->telephone_pro
        ]);
        return response()->json([
            'message'=> 'adding doctor with succesful',
            'user'=> $doctor
        ] , 200);
    }

    public function createSecretary(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users,email,',
            'password'=>'required|string|min:8|confirmed',
            'role'=> ['string','required', Rule::in(['SECRETARY']),],
        ]);
        $secretary = User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
        ]);
        return response()->json([
            'message'=> 'adding secretary with succesful',
            'user'=> $secretary
        ] , 200);
    }

    public function createPatient(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users,email,',
            'password'=>'required|string|min:8|confirmed',
            'role'=> ['string','required', Rule::in(['PATIENT']),],
            'date_naissance'=>'required|date',
            'adresse'=>'required|string',
            'telephone'=>'required|string|max:20',
            'numero_secretaire_sociale'=>'required|string',
            'groupe_sanguin'=>'required|string'
        ]);
        $patient = User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'date_naissance'=>$request->date_naissance,
            'adresse'=>$request->adresse,
            'telephone'=>$request->telephone,
            'numero_secretaire_sociale'=>$request->numero_secretaire_sociale,
            'groupe_sanguin'=>$request->groupe_sanguin,
        ]);
        return response()->json([
            'message'=> 'adding Patient with succesful',
            'user'=> $patient
        ] , 200);
    }
    public function viewGlobalStats()
    {

    }
}
