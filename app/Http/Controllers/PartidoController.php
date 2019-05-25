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
    public function gol(Request $request){
        evento::create([
            "tipo" => $request->input("evento"),
            "minuto" => $request->input("num"),
            "jugador1" => $request->input("id1"),
            "equipo" => $request->input("equipo"),
            "partido" =>$request->input("idp"),
        ]);
        $infopartido = partido::where("id",$request->input("idp"))->get();
        if($infopartido[0]["equipolocal"]==$request->input("equipo")){
            $equipo = $infopartido[0]["equipovisitante"];
            return $equipo;
        }elseif ($infopartido[0]["equipovisitante"]==$request->input("equipo")) {
            $equipo = $infopartido[0]["equipolocal"];
            return $equipo;
        }
    }
    public function traerRivales(Request $request,$id){
        $equipoDelJugador = jugadore::where("id",$id)->get(["equipo"]);
        $infopartido = partido::where("id",$request->input("partido"))->get();
        if($infopartido[0]["equipolocal"]==$equipoDelJugador[0]["equipo"]){
            $equipo = $infopartido[0]["equipovisitante"];
        }elseif ($infopartido[0]["equipovisitante"]==$equipoDelJugador[0]["equipo"]) {
            $equipo = $infopartido[0]["equipolocal"];
        }else{
            $equipo = $infopartido[0]["equipolocal"];
        };
        $rivales = jugadore::where("equipo",$equipo)->where("posicion","<",12)->get();
        return $rivales;
    }

    public function faltaTarjetasLesion(Request $request){
        $ultimoEvento = evento::create([
            "tipo" => $request->input("falta"),
            "minuto" => $request->input("min"),
            "jugador1" => $request->input("id1"),
            "jugador1" => $request->input("id2"),
            "partido" =>$request->input("partido"),
        ]);
        if($request->input("amarilla")=="2"){
            evento::create([
                "tipo" => $request->input("amarilla"),
                "minuto" => $request->input("min"),
                "jugador1" => $request->input("id1"),
                "falta" => $ultimoEvento->id,
                "partido" =>$request->input("partido"),
            ]);
        }
        if ($request->input("roja")=="3") {
            evento::create([
                "tipo" => $request->input("roja"),
                "minuto" => $request->input("min"),
                "jugador1" => $request->input("id1"),
                "falta" => $ultimoEvento->id,
                "partido" =>$request->input("partido"),
            ]);
        }
        if($request->input("lesion")=="4"){
            evento::create([
                "tipo" => $request->input("lesion"),
                "minuto" => $request->input("min"),
                "jugador1" => $request->input("id2"),
                "falta" => $ultimoEvento->id,
                "partido" =>$request->input("partido"),
            ]);
        }
        $eventosPartido = evento::where("partido",$request->input("partido"))->get();
        return $eventosPartido;
    }
    public function golesPartidoYaJugado($id){
        $eventosGoles =  evento::where("partido",$id)->where("tipo","2")->get();
        return $eventosGoles;
    }
    public function partidoJugadoJugadores(request $request){
        $lista = $request->input("listajugadores");
        $mida = sizeof($lista);
        for ($i=0; $i < sizeof($lista)-1 ; $i++) {
            $temp = jugadore::where("id",$lista[$i])->get();
            jugadore::where("id",$lista[$i])->update([
                "partidosjugados"=>$temp[0]["partidosjugados"]+1,
            ]);
        }
        return $lista;
    }
}