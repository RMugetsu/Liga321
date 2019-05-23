<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Exception;
use App\equipo;
use App\jugadore;
use App\partido;


class AlexaController extends Controller
{
    //espacios en ruta: %20

    public function InformacionJugador($nombre, $apellido){
        $jugador = jugadore::where('nombre',$nombre)->where('apellido',$apellido)->get();
        return $jugador;
    }

    public function InformacionPartido($equipo){
        $espacio = strpos($equipo, " ");
        if ($espacio == false ){
            $equipo = ucfirst($equipo);
        }
        else {
            $equipo[$espacio+1] = ucfirst($equipo[$espacio+1]);
            $equipo = ucfirst($equipo);
        }
        $equipo = equipo::where('nombre', 'LIKE', '%'.$equipo.'%')->get('id');
        $id_partido = partido::where('equipolocal', $equipo[0]['id'])->orWhere('equipovisitante', $equipo[0]['id'])->orderby('id','DESC')->take(1)->get();
        $partido = DB::table('eventos')->where('partido', $id_partido[0]['id'])->get();

        return $equipo;
        //$products = Product::where('name_en', 'LIKE', $search)->get();
    }

    public function InformacionEquipo($equipo){
        $espacio = strpos($equipo, " ");
        if ($espacio == false ){
            $equipo = ucfirst($equipo);
        }
        else {
            $equipo[$espacio+1] = ucfirst($equipo[$espacio+1]);
            $equipo = ucfirst($equipo);
        }

        $equipo = equipo::where('nombre','LIKE', '%'.$equipo.'%')->get();
        return $equipo;
    }

}