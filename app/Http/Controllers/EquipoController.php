<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\equipo;
use App\jugadore;
use App\partido;
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
        $jugadores = jugadore::where('equipo',$id)->orderby('posicion')->get();
        $entrenador = "vacio" ;
        $partido = partido::where('equipolocal', $id)->orWhere('equipovisitante', $id)->orderby('id')->take(1)->get();
        $eventos = DB::table('eventos')->where('partido', $partido[0]['id'])->get();
        if ($partido[0]['equipolocal'] == $id){
            $nombreContrincante = equipo::where('id',$partido[0]['equipovisitante'])->get();
        }
        else {
            $nombreContrincante = equipo::where('id',$partido[0]['equipolocal'])->get('nombre');
        }
        //pasar variable contricante para sacar el nombre
        return view("equipo", compact('equipoSeleccionado','jugadores','partido','eventos','nombreContrincante'))->with('entrenador', $entrenador);        
    }

    public function obtenerEquipoSiendoEntrenador($id){
        $equipoSeleccionado = equipo::where('id',$id)->get();
        $jugadores = jugadore::where('equipo',$id)->orderby('posicion')->get();
        $partido = partido::where('equipolocal', $id)->orWhere('equipovisitante', $id)->orderby('id')->take(1)->get();
        $eventos = DB::table('eventos')->where('partido', $partido[0]['id'])->get();
        $entrenador = $id ;
        if ($partido[0]['equipolocal'] == $id){
            $nombreContrincante = equipo::where('id',$partido[0]['equipovisitante'])->get();
        }
        else {
            $nombreContrincante = equipo::where('id',$partido[0]['equipolocal'])->get('nombre');
        }
        return view("equipo", compact('equipoSeleccionado','nombreContrincante','jugadores','partido','eventos'))->with('entrenador', $entrenador);    
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
        $antiguaPosicion = jugadore::where('id',$id)->get('posicion');
        $antiguaPosicion = $antiguaPosicion[0]['posicion'] ;
        $posicion = $request->input('posicion');
        $id_repetido = $request->input('repetido');

        DB::table('jugadores')
        ->where('id', $id)
        ->update(['posicion' => $posicion]);

        DB::table('jugadores')
        ->where('id', $id_repetido)
        ->update(['posicion' => $antiguaPosicion]);

        return $antiguaPosicion ;

    }

}
