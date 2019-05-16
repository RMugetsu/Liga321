<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;

class UsuarioController extends Controller
{
    //
    public function obtenerUsuarios(){
        $usuarios = User::get(['name','notificacion_tipo','Tipo']);
        return $usuarios;
    }
    public function modificarTipo(Request $request){

    }
}
