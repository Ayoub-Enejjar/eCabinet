<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RendezVous;
use App\Models\Consultation;
use App\Models\Ordonnance;
use Auth;

class DoctorController extends Controller
{
    public function dashboard()
    {
        return view('doctor.dashboard');
    }

    public function schedule()
    {
        return view('doctor.schedule');
    }

    public function patients()
    {
        return view('doctor.patients');
    }

    public function patientRecord($id)
    {
        return view('doctor.console');
    }

    public function patientAnalyses($id)
    {
        return view('doctor.analyses');
    }

    public function patientReports($id)
    {
        return view('doctor.reports');
    }

    public function inventory()
    {
        return view('doctor.inventory');
    }

    public function profile()
    {
        return view('doctor.profile');
    }

    public function settings()
    {
        return view('doctor.settings');
    }

    public function completeConsultation(Request $request, $rendezvous_id)
    {
        // To be implemented
        return back()->with('success', 'Consultation complete.');
    }
}
