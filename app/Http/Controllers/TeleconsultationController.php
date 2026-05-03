<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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

        // Check if the Daily API key is set
        $apiKey = config('services.daily.api_key');
        if (!$apiKey) {
            return back()->with('error', 'La clé API Daily n\'est pas configurée.');
        }

        $roomName = 'ecabinet-consultation-' . env('APP_ENV', 'local') . '-' . $rendezVous->id;

        // Try to fetch the existing room
        $response = Http::withToken($apiKey)->get('https://api.daily.co/v1/rooms/' . $roomName);

        if ($response->failed()) {
            if ($response->status() === 404) {
                // Room doesn't exist, create it
                $createResponse = Http::withToken($apiKey)->post('https://api.daily.co/v1/rooms', [
                    'name' => $roomName,
                    'properties' => [
                        'exp' => $rendezVous->date_heure->addHours(24)->timestamp, // Set expiration to 24 hours just to be safe
                        'enable_chat' => true,
                        'enable_screenshare' => true,
                    ]
                ]);

                if ($createResponse->failed()) {
                    return back()->with('error', 'Erreur lors de la création de la salle de téléconsultation.');
                }
                
                $roomUrl = $createResponse->json('url');
            } else {
                return back()->with('error', 'Erreur de communication avec le service vidéo.');
            }
        } else {
            $roomUrl = $response->json('url');
        }

        return view('teleconsultation.room', compact('rendezVous', 'user', 'roomUrl'));
    }
}
