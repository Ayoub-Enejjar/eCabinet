<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicLicense extends Model
{
    protected $fillable = ['name', 'expiration_date'];
    protected $casts = ['expiration_date' => 'date'];
}
