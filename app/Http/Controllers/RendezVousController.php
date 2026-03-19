<?php

namespace App\Http\Controllers;

use App\Http\Requests\RendezVousRequest;
use App\Models\RendezVous;

class RendezVousController extends Controller
{
    
    public function confirmer($id)
    {
        $rendezVous = RendezVous::findOrFail($id);

        $rendezVous->update([
            'statut' => 'CONFIRMED'
        ]);

        return response()->json([
            'message' => 'Rendez-vous confirmed',
            'data' => $rendezVous
        ]);
    }

    public function annuler($id)
    {
        $rendezVous = RendezVous::findOrFail($id);

        $rendezVous->update([
            'statut' => 'CANCELLED'
        ]);

        return response()->json([
            'message' => 'Rendez-vous cancelled',
        ]);
    }
}

