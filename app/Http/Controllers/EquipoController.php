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
        $jugadores = jugadore::where('equipo',$id)->get();
        $entrenador = "vacio" ;
        return view("equipo", compact('equipoSeleccionado','jugadores'))->with('entrenador', $entrenador);        
    }

    public function obtenerEquipoSiendoEntrenador($id){
        $equipoSeleccionado = equipo::where('id',$id)->get();
        $jugadores = jugadore::where('equipo',$id)->get();
        $entrenador = $id ;
        return view("equipo", compact('equipoSeleccionado','jugadores'))->with('entrenador', $entrenador);    
    }

    public function obtenerUsuario($id){
        $tipo_usuario = auth()->user()->tipo;
        if ($tipo_usuario==4){
            $equipo = auth()->user()->equipo;
            if ($equipo == $id){
                return self::obtenerEquipoSiendoEntrenador($id);        
            }
        }
        else {
            return self::obtenerEquipoInfo($id);        
        }
    }

}
