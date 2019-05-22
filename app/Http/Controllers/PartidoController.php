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

        return view("partido",compact('partido'));
    }

    public function obtenerNombreDelEquipo($id,$id2){
        $equipo1 = equipo::where("id",$id)->get();
        $equipo2 = equipo::where("id",$id2)->get();
        $equipos = [];
        array_push($equipos,$equipo1);
        array_push($equipos,$equipo2);
        return $equipos;
    }

    public function infoJugadores($id,$id2){
        $jugadores1 = jugadore::where("equipo",$id)->orderBy('posicion', 'asc')->get();
        $jugadores2 = jugadore::where("equipo",$id2)->orderBy('posicion', 'asc')->get();
        $jugadores = [];
        array_push($jugadores,$jugadores1);
        array_push($jugadores,$jugadores2);
        return $jugadores;
    }

}