<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Exception;
use App\equipo;

class CalendarioController extends Controller
{

    public function recogerDatos(){
        $partidos = DB::table('partidos')->get();
        return view("calendario", compact('partidos'));
    }

}