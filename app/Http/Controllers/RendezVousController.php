<?php

namespace App\Http\Controllers;

use App\Http\Requests\RendezVousRequest;
use App\Models\RendezVous;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmed;   


class RendezVousController extends Controller
{

    public function confirmer($id)
    {
        $rendezVous = RendezVous::findOrFail($id);

        $rendezVous->update([
            'statut' => 'CONFIRMED'
        ]);
        try {
            Mail::to($rendezVous->patient->email)->send(new AppointmentConfirmed($rendezVous));
        } catch (\Exception $e) {
            \Log::error("Erreur d'envoi d'email : " . $e->getMessage());
        }

        return back()->with('success' , 'rendez vous confirmed');
    }

    public function annuler($id)
    {
        $rendezVous = RendezVous::findOrFail($id);
        $rendezVous->update([
            'statut' => 'CANCELLED'
        ]);

        return back()->with('success' , 'rendez vous annuler');

    }
}

