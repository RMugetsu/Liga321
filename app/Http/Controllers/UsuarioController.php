<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\equipo;


class UsuarioController extends Controller
{
    //
    public function obtenerUsuarios(){
        $usuarios = User::where("tipo",'!=',1)->orWhereNull("tipo")->get(['id','name','notificaciontipo','tipo']);
        return view("administracion", compact('usuarios'));        

    }

    public function modificartipo($id){
        $tipo=$_POST['tipo'];
        User::where('id',$id)->update([
            "tipo"=>$tipo
        ]);
        $usuarios = User::where("tipo",'!=',1)->orWhereNull("tipo")->get(['id','name','notificaciontipo','tipo']);
        return $usuarios;
    }

    public function perfilUsuario($id){
        $id_equipo = auth()->user()->equipo ;
        $equipo = equipo::where("id",'=',$id_equipo)->get(['nombre','id']);
        return view("usuario", compact('equipo'));        

    }
    
    public function modificarContraseña($id){
        $contraseña = $request->input('password');
        DB::table('users')
            ->where('id', $id)
            ->update(['password' => Hash::make($contraseña)]);
    }

    public function modificaremail($id){
        $email = $request->input('email');
        DB::table('users')
        ->where('id', $id)
        ->update(['email' => $email]);
    }
}
