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

Route::get('/partido/informacionjugadores/{id}/{id2}', 'PartidoController@infoJugadores');

Route::get('/alexaJugador/{Nombre}/{Apellido}','AlexaController@InformacionJugador');

Route::get('/alexaPartido/{Equipo}','AlexaController@InformacionPartido');

Route::get('/alexaEquipo/{Equipo}','AlexaController@InformacionEquipo');
