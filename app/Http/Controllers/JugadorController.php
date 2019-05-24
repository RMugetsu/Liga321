<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jugadore;

class JugadorController extends Controller
{
    public function obtenerJugadorInfo($id){
        $jugador = jugadore::where('id',$id)->get();
        return view("jugador", compact('jugador'));        
    }

    public function obtenerJugadorAjax($id){
        $jugador = jugadore::where('id',$id)->get();
        return $jugador;        
    }
}
