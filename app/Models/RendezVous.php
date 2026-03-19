<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    protected $table = 'rendez_vous';
    protected $fillable = [
        'date_heure', 'statut' , 'motif' ,
        'patient_id' , 'medecin_id'
    ];
    protected $casts = [
        'date_heure' => 'datetime',
    ];
    //relations
    public function patient()
    {
        return $this->belongsTo(User::class , 'patient_id');
    }
    public function medecin()
    {
        return $this->belongsTo(User::class , 'medecin_id');
    }
    public function consultations()
    {
        return $this->hasOne(Consultation::class);
    }
}
