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

Route::get('/', function () {
    return view('home');
});

Route::get('/calendario', function () {
    return view('calendario');
});

Route::get('/administracion', function () {
    return view('calendario');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/equipo/:id', function () {
    return view('equipo');
});

Route::get('/logged', function () {
    return view('logged');
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::get('home', 'HomeController@index')->name('home');
