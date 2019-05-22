<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\equipo;
use App\jugadore;
use DB;

class EquipoController extends Controller
{
    public function equiposNombres(Request $request){
        $nombres = equipo::get(['id','nombre']);
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
            else {
                return self::obtenerEquipoInfo($id);        
            }
        }
        else {
            return self::obtenerEquipoInfo($id);        
        }
       
    }

    public function guardarAlineacion(request $request, $id){
        $alineacion = $request->input('alineacion');
        DB::table('equipos')
        ->where('id', $id)
        ->update(['alineacion' => $alineacion]);
    }

    public function cambiarPosicionJugador(request $request, $id){
        $posicion = $request->input('posicion');
        DB::table('jugadores')
        ->where('id', $id)
        ->update(['posicion' => $posicion]);
    }

}
