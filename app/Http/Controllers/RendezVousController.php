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

