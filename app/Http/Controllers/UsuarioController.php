<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;


class UsuarioController extends Controller
{
    //
    public function obtenerUsuarios(){
        $usuarios = User::where("Tipo",'!=',1)->orWhereNull("Tipo")->get(['id','name','notificacion_tipo','Tipo']);
        return view("administracion", compact('usuarios'));        

    }

    public function modificarTipo($data){
        User::where('id',$data['id'])->update([
            "Tipo"=>$data['tipo'],
        ]);
        return true;
    }
}
