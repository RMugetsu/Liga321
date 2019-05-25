<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\equipo;
use App\jugadore;
use App\evento;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function obtenerDatosInicio(){
        $equipos_ranking = equipo::select('id','nombre','logo','victoria','empate','derrota','puntos')->paginate(10);        
        //$jugadores_ranking = jugadore::select('id','nombre','apellido','dorsal','equipo')->paginate(10);
        $eventos = evento::where("tipo",1)->orderby('jugador1')->get();
        return view("home", compact('equipos_ranking','eventos'));           
    }

    public function obtenerDatosAjax(){
        $equipos_ranking = equipo::select('id','nombre','logo','victoria','empate','derrota','puntos')->orderby('puntos','desc')->paginate(10);        
        return $equipos_ranking;

        
    }

    public function obtenerDatosApi(){
        $equipos_ranking = equipo::select('id','nombre','logo','victoria','empate','derrota','puntos')->paginate(10);        
        //return $equipos_ranking;
        return $equipos_ranking;   
        
    }
}
