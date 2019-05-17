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
        $entrenador = "vacio" ;
        return view("equipo", compact('equipoSeleccionado','jugadores','entrenador'));        
    }

    public function obtenerEquipoSiendoEntrenador($id){
        $equipoSeleccionado = equipo::where('id',$id)->get();
        $jugadores = jugadore::where('Equipo',$id)->get();
        $entrenador = $id ;
        return view("equipo", compact('equipoSeleccionado','jugadores'))->with('entrenador', $entrenador);    
    }

    public function obtenerUsuario($id){
        $Tipo_usuario = auth()->user()->Tipo;
        if ($Tipo_usuario==4){
            $Equipo = auth()->user()->Equipo;
            if ($Equipo == $id){
                return self::obtenerEquipoSiendoEntrenador($id);        
            }
        }
        else {
            return self::obtenerEquipoInfo($id);        
        }
    }

}
