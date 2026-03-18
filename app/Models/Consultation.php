<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $table = 'consultations';
    protected $fillable = [
        'compte_rendu' , 'notes_privees' ,  'poids' , 'temperature' , 'rythme_cardiaque' , 'tension' ,
        'rendez_vouses_id'
    ];
    //relations
    public function rendezVous()
    {
        return $this->belongsTo(RendezVous::class);
    }
    public function ordonnance()
    {
        return $this->hasOne(Ordonnance::class);
    }
    //methode
    public function genererRapport()
    {
        
    }
}
