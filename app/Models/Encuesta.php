<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'support_type',
        'message',
        'organizacion_nombre'
    ];
}
