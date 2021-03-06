<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/equipo','EquipoController@equiposNombres');

Route::get('/', 'HomeController@obtenerDatosInicio');

Route::get('/info/Equipo/{id}/{id2}','PartidoController@obtenerNombreDelEquipo');

Route::get('/eventos/partido','PartidoController@obtenerEventos');

Route::get('/eventos/partido/suplente/{id}','PartidoController@suplentes');

Route::get('/partido/informacionjugadores/{id}/{id2}', 'PartidoController@infoJugadores');

Route::get('/alexaJugador/{Nombre}','AlexaController@InformacionJugador');

Route::get('/alexaPartido/{Equipo}','AlexaController@InformacionPartido');

Route::get('/alexaEquipo/{Equipo}','AlexaController@InformacionEquipo');

Route::get('/eventos/partido/rivales/{id}','PartidoController@traerRivales');

Route::get('/eventos/partidoyajugado/{id}','PartidoController@golesPartidoYaJugado');

Route::get('/obtenerJugadoresAjax/{id1}/{id2}/{id3}/{id4}/{id5}','JugadorController@obtenerJugadoresAjax');

