<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    protected $table = 'ordonnances';
    protected $fillable = [
        'contenu_medicaments' , 'chemin_pdf',
        'consultation_id'
    ];
    
    protected $casts = [
        'contenu_medicaments' => 'array',
    ];

    //relations
    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }
    //methods
    public function generatePDF()
    {

    }
    public function download()
    {

    }
}
