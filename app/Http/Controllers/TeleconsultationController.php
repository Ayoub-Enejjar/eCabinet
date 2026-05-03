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

        return view('teleconsultation.room', [
            'rendezVous' => $rendezVous,
            'user' => $user,
            'jwt' => $this->generateJaasJwt($user, $rendezVous)
        ]);
    }

    private function generateJaasJwt($user, $rendezVous)
    {
        $appId = config('services.jaas.app_id');
        $keyId = config('services.jaas.key_id');
        $privateKey = config('services.jaas.private_key');

        if (!$appId || !$keyId || !$privateKey) {
            return null;
        }

        $header = json_encode([
            'alg' => 'RS256',
            'typ' => 'JWT',
            'kid' => $appId . '/' . $keyId
        ]);

        $payload = json_encode([
            'aud' => 'jitsi',
            'iss' => 'chat',
            'iat' => time(),
            'exp' => time() + 3600, // 1 hour
            'nbf' => time() - 10,
            'sub' => $appId,
            'context' => [
                'user' => [
                    'name' => ($user->role === 'DOCTOR' ? 'Dr. ' : '') . $user->name,
                    'email' => $user->email,
                    'avatar' => '',
                    'id' => (string) $user->id,
                    'moderator' => $user->role === 'DOCTOR'
                ],
                'features' => [
                    'livestreaming' => false,
                    'recording' => true,
                    'transcription' => false,
                    'outbound-call' => false
                ]
            ],
            'room' => '*'
        ]);

        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        $signature = '';
        openssl_sign($base64UrlHeader . "." . $base64UrlPayload, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }
}
