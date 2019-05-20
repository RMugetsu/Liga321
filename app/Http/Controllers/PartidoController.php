<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use App\equipo;
use App\partido;



class PartidoController extends Controller
{
    public function obtenerInfoPartido($id){
        $partido = partido::where("id",'=',$id)->get();
        $equipos = equipo::get(['id','Nombre']);

        return view("partido",compact('partido','equipos'));
    }

    public function infoJugadores($id1, $id2){
        $jugadores1 = jugadore::where("Equipo","=")
    }

}