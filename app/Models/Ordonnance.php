<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    protected $table = 'ordonnances';
    protected $fillable = [
        'contenu_medicaments' , 'chemin_pdf',
        'consultations_id'
    ];
    //relations
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
    //methods
    public function generatePDF()
    {

    }
    public function download()
    {

    }
}
