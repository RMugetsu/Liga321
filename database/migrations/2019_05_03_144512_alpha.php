<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alpha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tiposDeUsuarios', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->string('Rol');
            $table->timestamps();
        });

        Schema::create('tiposDeEventos', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->string('Evento');
            $table->timestamps();
        });

        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->string('Nombre');
            $table->string('Equipacion_1');
            $table->string('Equipacion_2');
            $table->string('Direccion_del_campo');
            $table->string('Entrenador');
            $table->integer('Alineacion');
            $table->integer('Victoria');
            $table->integer('Empate');
            $table->integer('Derrota');
            $table->integer('Puntos');
            $table->timestamps();
        });


        Schema::create('jugadores', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->string('Nombre');
            $table->string('Apellido');
            $table->integer('Dorsal');
            $table->integer('Equipo');
            $table->integer('Edad');
            $table->string('Lesion');
            $table->integer('Partidos_Jugados');
            $table->integer('Posicion');
            $table->timestamps();
        });

        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->string('Arbitro');
            $table->integer('Equipo_Local');
            $table->integer('Equipo_Visitante');
            $table->date('Fecha_Inicio');
            $table->string('Hora_de_Inicio');
            $table->foreign('Equipo_Local')->references('Id')->on('equipos');
            $table->foreign('Equipo_Visitante')->references('Id')->on('equipos');
            $table->timestamps();
        });

        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->integer('Tipo')->unsigned();
            $table->integer('Minuto');
            $table->integer('Jugador_1')->nullable()->unsigned();
            $table->integer('Jugador_2')->nullable()->unsigned();
            $table->integer('Equipo')->nullable()->unsigned();
            $table->integer('Sancion')->nullable()->unsigned();
            $table->integer('Partido');
            $table->foreign('Tipo')->references('Id')->on('tiposDeEventos');
            $table->foreign('Jugador_1')->references('Id')->on('jugadores');
            $table->foreign('Jugador_2')->references('Id')->on('jugadores');
            $table->foreign('Equipo')->references('Id')->on('equipos');
            $table->foreign('Sancion')->references('Id')->on('eventos');
            $table->foreign('Partido')->references('Id')->on('partidos');
            $table->timestamps();
        });

        Schema::create('lesiones', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->integer('Evento')->nullable();
            $table->date('Fecha_Inicio')->nullable();
            $table->date('Fecha_Final')->nullable();
            $table->string('Descripcion')->nullable();
            $table->foreign('Evento')->references('Id')->on('eventos');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('Tipo')->nullable();
            $table->integer('Equipo')->nullable();
            $table->foreign('Tipo')->references('Id')->on('tiposDeUsuarios');
            $table->foreign('Equipo')->references('Id')->on('equipos');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiposDeUsuarios');
        Schema::dropIfExists('tiposDeEventos');
        Schema::dropIfExists('equipos');
        Schema::dropIfExists('jugadores');
        Schema::dropIfExists('eventos');
        Schema::dropIfExists('lesiones');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        
    }
}
