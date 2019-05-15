<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\equipo;
use App\jugadore;

class EquipoController extends Controller
{
    public function equiposNombres(Request $request){
        $nombres = equipo::get(['id','Nombre']);
        return $nombres;
    }
    public function obtenerEquipo($id){
        $equipoSeleccionado = equipo::where('id',$id)->get();
        return $equipoSeleccionado;
    }
    public function obtenerEquipoInfo($id){
        $equipoSeleccionado = equipo::where('id',$id)->get();
        $jugadores = jugadore::where('Equipo',$id)->get();
        return view("equipo", compact('equipoSeleccionado','jugadores'));        
    }


}
