<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    //
    protected $fillable = ['tipo','minuto','jugador1','jugador2','equipo','falta','partido'];
}
