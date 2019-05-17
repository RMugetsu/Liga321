<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;

class UsuarioController extends Controller
{
    //
    public function obtenerUsuarios(){
        $usuarios = User::where("Tipo",'!=',1)->orWhereNull("Tipo")->get(['name','notificacion_tipo','Tipo']);
        return $usuarios;
        return view("administracion", compact('equipoSeleccionado','jugadores'));        

    }
    public function modificarTipo(Request $request){

    }
}
