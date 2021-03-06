<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jugadore;
use App\equipo;
use App\partido;
use App\evento;
use Response; 

class JugadorController extends Controller
{
    public function obtenerJugadorInfo($id){
        $jugador = jugadore::where('id',$id)->get();
        $equipo = equipo::where('id',$jugador[0]['equipo'])->get();
        $goles = evento::where('tipo',1)->where('jugador1',$id)->get();
        return view("jugador", compact('jugador','equipo','goles'));        
    }

    public function obtenerJugadoresAjax($id1, $id2, $id3, $id4, $id5){
        
        $jugador1 = jugadore::where('id',$id1)->get();
        $jugador2 = jugadore::where('id',$id2)->get();
        $jugador3 = jugadore::where('id',$id3)->get();
        $jugador4 = jugadore::where('id',$id4)->get();
        $jugador5 = jugadore::where('id',$id5)->get();
        
        return Response::json(array(
            '0' => $jugador1,
            '1' => $jugador2,
            '2' => $jugador3,
            '3' => $jugador4,
            '4' => $jugador5,));
    }
}
