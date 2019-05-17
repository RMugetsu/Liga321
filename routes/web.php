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

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/calendario', function () {
    return view('calendario');
});

Route::get('/administracion','UsuarioController@obtenerUsuarios');

Route::get('/usuario/{id}', function () {
    return view('usuario');
});

Route::get('/equipo/{id}','EquipoController@obtenerEquipoInfo');

Route::get('/jugador/{id}','JugadorController@obtenerJugadorInfo');

Route::get('/logged', function () {
    return view('logged');
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::get('home', 'HomeController@index')->name('home');
