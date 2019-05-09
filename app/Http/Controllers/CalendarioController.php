<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Exception;

class CalendarioController extends Controller
{
    public function generarLiga()
    {
        $equipos = DB::table('equipos')->get();

        $datos = json_decode($equipos,true);
        return view("calendario", array('data'=>$datos));
    }
}