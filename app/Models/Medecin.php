<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('doctor', function ($builder) {
            $builder->where('role', 'DOCTOR');
        });
    }
    //relations
    public function RendezVous()
    {
        return $this->hasMany('rendez_vouses' , 'medecin_id');
    }
    //methods
    public function viewSchedule()
    {

    }
    public function viewPatientProgress($patient_id)
    {

    }
}

