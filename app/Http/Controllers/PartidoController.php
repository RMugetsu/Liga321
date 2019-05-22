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

    public function obtenerNombreDelEquipo($id){
        $equipo = equipo::where("id",$id)->get();
        return $equipo;
    }

    public function infoJugadores($id){
        $jugadores = jugadore::where("equipo",$id)->orderBy('posicion', 'asc')->get();
        
        return $jugadores;
    }

}