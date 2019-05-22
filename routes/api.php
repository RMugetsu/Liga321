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

Route::get('/info/Equipo/{id}','PartidoController@obtenerNombreDelEquipo');

Route::get('/partido/informacionjugadores/{id}', 'PartidoController@infoJugadores');

