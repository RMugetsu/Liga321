<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use App\equipo;
use App\partido;



class PartidoController extends Controller
{
    public function obtenerInfoPartido($id){
        $partidos = partido::where("id",'=',$id)->get();
        return view("partido",compact('partidos'));
    }

}