<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeleconsultationController extends Controller
{
    /**
     * Join the teleconsultation room.
     */
    public function join($id)
    {
        $rendezVous = RendezVous::with(['patient', 'medecin'])->findOrFail($id);
        $user = Auth::user();

        // Check if the current user is authorized to join this appointment
        if ($user->role === 'DOCTOR' && $rendezVous->medecin_id !== $user->id) {
            abort(403, 'Unauthorized access to this consultation.');
        }

        if ($user->role === 'PATIENT' && $rendezVous->patient_id !== $user->id) {
            abort(403, 'Unauthorized access to this consultation.');
        }

        if ($user->role !== 'DOCTOR' && $user->role !== 'PATIENT') {
            abort(403, 'Unauthorized access to this consultation.');
        }

        // Check if the appointment is confirmed
        if ($rendezVous->statut !== 'CONFIRMED') {
            return back()->with('error', 'Vous ne pouvez pas rejoindre une consultation non confirmée.');
        }

        // Check if it's actually a video call
        if ($rendezVous->type !== 'video') {
            return back()->with('error', 'Ce rendez-vous n\'est pas une consultation vidéo.');
        }

        // We can add a time check here, e.g., allow joining 15 mins before
        // For now, let's allow it as long as it's the correct day for simplicity, or just allow it.

        return view('teleconsultation.room', compact('rendezVous', 'user'));
    }
}
