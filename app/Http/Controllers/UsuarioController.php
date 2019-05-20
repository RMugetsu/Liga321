<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\equipo;


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

    public function perfilUsuario($id){
        $id_equipo = auth()->user()->Equipo ;
        $equipo = Equipo::where("id",'=',$id_equipo)->get(['Nombre','id']);
        return view("usuario", compact('equipo'));        

    }
    
    public function modificarContraseña($id){
        $contraseña = $request->input('password');
        DB::table('users')
            ->where('id', $id)
            ->update(['password' => Hash::make($contraseña)]);
    }

    public function modificarEmail($id){
        $email = $request->input('email');
        DB::table('users')
        ->where('id', $id)
        ->update(['email' => $email]);
    }
}
