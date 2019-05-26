<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@obtenerDatosInicio');

Route::get('/home', 'HomeController@obtenerDatosInicio');

Route::get('/Inicio', 'HomeController@obtenerDatosAjax');

Route::get('/manual', 'HomeController@manual');

Route::get('/calendario', 'CalendarioController@recogerDatos');

Route::get('/administracion','UsuarioController@obtenerUsuarios');

Route::get('/usuario/{id}', 'UsuarioController@perfilUsuario');

Route::get('/equipo/{id}','EquipoController@obtenerUsuario');

Route::get('/partido/{id}','PartidoController@obtenerInfoPartido');

Route::get('/jugador/{id}','JugadorController@obtenerJugadorInfo');


Route::get('/logged', function () {
    return view('logged');
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::post('registrar', 'UsuarioController@registro');

Route::get('home', 'HomeController@index')->name('home');

Route::post('/modificarUsuario/{id}','UsuarioController@modificartipo');


Route::post('/usuario/modificar/{id}', 'UsuarioController@modificarContraseña');

Route::post('/usuario/modificarEmail/{id}', 'UsuarioController@modificarEmail');

Route::post('/guardarAlineacion/{id}', 'EquipoController@guardarAlineacion');

Route::post('/cambiarPosicionJugador/{id}', 'EquipoController@cambiarPosicionJugador');


// Partido Eventos


Route::post('/intercambio','PartidoController@intercambioJugadores');

Route::post('/marcarGol','PartidoController@gol');

Route::post('/falta','PartidoController@faltaTarjetasLesion');

Route::post('/jugadoresdelpartido','PartidoController@partidoJugadoJugadores');
