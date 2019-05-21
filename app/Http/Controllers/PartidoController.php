<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use App\equipo;
use App\partido;
use App\jugadore;



class PartidoController extends Controller
{
    public function obtenerInfoPartido($id){
        $partido = partido::where("id",'=',$id)->get();
        $equipos = equipo::get(['id','nombre']);

        return view("partido",compact('partido','equipos'));
    }

    public function infoJugadores($id){
        $jugadores = jugadore::where("Equipo","=",$id)->get();
        
        return $jugadores;
    }

}