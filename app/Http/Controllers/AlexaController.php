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

    public function InformacionJugador($nombre){
        $var = explode(" ",$nombre);
        $nombre_jugador = ucfirst($var[0]);
        $apellido = ucfirst($var[1]);

        $jugador = jugadore::where('nombre','LIKE', '%'.$nombre_jugador.'%')->where('apellido','LIKE', '%'.$apellido.'%')->get();
        return json_encode($jugador[0]);
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

        return json_encode($equipo[0]);
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
        return json_encode($equipo[0]);
    }

}