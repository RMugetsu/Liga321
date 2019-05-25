<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\equipo;
use DB;


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
        $tipo = auth()->user()->tipo;
        if ($tipo == 0 || $tipo == 2){
            $id_equipo = "vacio" ;
            $equipo = equipo::where("id",'=',$id_equipo)->get(['nombre','id']);
            return view("usuario")->with('id_equipo',$id_equipo);
        }
        else {
            $id_equipo = auth()->user()->equipo ;
            $equipo = equipo::where("id",'=',$id_equipo)->get(['nombre','id']);
            return view("usuario", compact('equipo'))->with('id_equipo',$id_equipo);        
        }
    }
    
    public function modificarContraseña(request $request, $id){
        $contraseña = $request->input('password');
        DB::table('users')
            ->where('id', $id)
            ->update(['password' => Hash::make($contraseña)]);
    }

    public function modificarEmail(request $request, $id){
        $email = $request->input('email');
        DB::table('users')
        ->where('id', $id)
        ->update(['email' => $email]);
    }
}
