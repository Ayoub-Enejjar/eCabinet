<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertProtocol extends Model
{
    protected $fillable = ['name', 'description', 'priority', 'icon', 'is_active'];
}
