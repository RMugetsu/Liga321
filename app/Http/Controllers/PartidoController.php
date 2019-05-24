<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use App\equipo;
use App\partido;
use App\jugadore;
use App\evento;
use App\tiposdeevento;



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

    public function obtenerEventos(){
        $eventos = tiposDeEvento::get();
        return $eventos;
    }
    public function suplentes($id){
        $equipo = jugadore::where("id",$id)->get(["equipo"]);
        $suplentes =  jugadore::where("equipo",$equipo[0]["equipo"])->where("posicion",">",11)->get();
        return $suplentes;
    }
    public function intercambioJugadores(Request $request){
        jugadore::where('id',$request->input("id1"))->update([
            "posicion"=>$request->input("posc2"),
        ]);
        jugadore::where('id',$request->input("id2"))->update([
            "posicion"=>$request->input("posc1"),
        ]);
        evento::create([
            "tipo" => $request->input("evento"),
            "minuto" => $request->input("num"),
            "jugador1" => $request->input("id1"),
            "jugador2" => $request->input("id2"),
            "partido" =>$request->input("idp"),
        ]);
        $entra = jugadore::where("id",$request->input("id2"))->get();
        return $entra;
    }
}