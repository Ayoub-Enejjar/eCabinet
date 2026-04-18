<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePatientRequest;
use App\Models\RendezVous;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecretaireController extends Controller
{

    public function manageAppointments()
    {

    }
    public function dashboard(){
    return view('secretary.dashboard', [
        'patientsCount' => User::where('role','PATIENT')->count(),
        'rendezVousCount' => RendezVous::count(),
        'pendingCount' => RendezVous::where('statut','PENDING')->count(),
        'confirmedCount' => RendezVous::where('statut','CONFIRMED')->count(),
        'todayRdv' => RendezVous::whereDate('date_heure', today())->count(),
        'tomorrowRdv' => RendezVous::whereDate('date_heure', now()->addDay())->count(),
        'cancelledCount' => RendezVous::where('statut','CANCELLED')->count(),
        'todayAppointments' => RendezVous::with(['patient','medecin'])
            ->whereDate('date_heure', today())
            ->get(),
    ]);
    }
    public function settigns(){
        return view('secretary.settings');
    }
    public function settings()
    {
        $user = Auth::user();
        return view('secretary.settings', compact('user'));
    }
    public function patients()
    {
        $patients = User::where('role', 'PATIENT')->latest()->paginate(10);
        return view('secretary.patients', compact('patients'));
    }
    public function rendezVous(){
        $rendezVous = RendezVous::latest()->paginate(10);
        return view('secretary.rendezVous' , compact('rendezVous'));
    }
    public function rvAnnulle(){
        $rendezVous = RendezVous::where('statut' , 'CANCELLED')->latest()->paginate(10);
        return view('secretary.rvAnnulle' , compact('rendezVous'));
    }

    //managePatients
    public function destroy($id)
    {
    $patient = User::findOrFail($id);

    $patient->delete();

    if (request()->expectsJson()) {
        return response()->json([
            'message' => 'Patient deleted successfully'
        ], 200);
    }

    return back()->with('success', 'Patient deleted successfully.');
    }
}
