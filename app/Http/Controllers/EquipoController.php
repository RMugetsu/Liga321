<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\equipo;

class EquipoController extends Controller
{
    public function equiposNombres(Request $request){
        $nombres = equipo::get(['id','Nombre']);
        return $nombres;
    }
}
