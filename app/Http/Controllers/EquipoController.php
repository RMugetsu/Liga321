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
        $id_partido = partido::where('equipolocal', $id)->orWhere('equipovisitante', $id)->orderby('id','DESC')->take(1)->get();
        $partido = DB::table('eventos')->where('partido', $id_partido[0]['id'])->get();
        return $partido;
        return view("equipo", compact('equipoSeleccionado','jugadores','partido'))->with('entrenador', $entrenador);        
    }

    public function obtenerEquipoSiendoEntrenador($id){
        $equipoSeleccionado = equipo::where('id',$id)->get();
        $jugadores = jugadore::where('equipo',$id)->orderby('posicion')->get();
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
