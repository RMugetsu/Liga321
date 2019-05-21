<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\equipo;

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
        //return $equipos_ranking;
        return view("home", compact('equipos_ranking'));   
        
    }

    public function obtenerDatosApi(){
        $equipos_ranking = equipo::select('id','nombre','logo','victoria','empate','derrota','puntos')->paginate(10);        
        //return $equipos_ranking;
        return $equipos_ranking;   
        
    }
}
