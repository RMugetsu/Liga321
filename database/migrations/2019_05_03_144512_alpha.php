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
            $table->increments('id')->unique();
            $table->string('Rol');
            $table->timestamps();
        });

        Schema::create('tiposDeEventos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('Evento');
            $table->timestamps();
        });

        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('Nombre');
            $table->string('Logo')->nullable();
            $table->string('Equipacion_1')->nullable();
            $table->string('Equipacion_2')->nullable();
            $table->string('Direccion_del_campo');
            $table->string('Entrenador');
            $table->integer('Alineacion');
            $table->integer('Victoria');
            $table->integer('Empate');
            $table->integer('Derrota');
            $table->integer('Puntos');
            $table->timestamps();
        });

        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('Arbitro');
            $table->integer('Equipo_Local');
            $table->integer('Equipo_Visitante');
            $table->date('Fecha_Inicio');
            $table->string('Hora_de_Inicio');
            $table->foreign('Equipo_Local')->references('id')->on('equipos');
            $table->foreign('Equipo_Visitante')->references('id')->on('equipos');
            $table->timestamps();
        });
        Schema::create('jugadores', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('Nombre');
            $table->string('Apellido');
            $table->integer('Dorsal');
            $table->integer('Equipo');
            $table->integer('Edad');
            $table->integer('Lesion')->nullable();
            $table->integer('Partidos_Jugados');
            $table->integer('Posicion');
            $table->foreign('Equipo')->references('id')->on('equipos');
            $table->timestamps();
        });
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('Tipo')->unsigned();
            $table->integer('Minuto');
            $table->integer('Jugador_1')->nullable()->unsigned();
            $table->integer('Jugador_2')->nullable()->unsigned();
            $table->integer('Equipo')->nullable()->unsigned();
            $table->integer('Sancion')->nullable()->unsigned();
            $table->integer('Partido');
            $table->foreign('Tipo')->references('id')->on('tiposDeEventos');
            $table->foreign('Jugador_1')->references('id')->on('jugadores');
            $table->foreign('Jugador_2')->references('id')->on('jugadores');
            $table->foreign('Equipo')->references('id')->on('equipos');
            $table->foreign('Sancion')->references('id')->on('eventos');
            $table->foreign('Partido')->references('id')->on('partidos');
            $table->timestamps();
        });

        Schema::create('lesiones', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('Evento')->nullable();
            $table->date('Fecha_Inicio')->nullable();
            $table->date('Fecha_Final')->nullable();
            $table->string('Descripcion')->nullable();
            $table->foreign('Evento')->references('id')->on('eventos');
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
            $table->foreign('Tipo')->references('id')->on('tiposDeUsuarios');
            $table->foreign('Equipo')->references('id')->on('equipos');
            $table->rememberToken();
            $table->timestamps();
        });


        
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::table('jugadores', function (Blueprint $table) {
            $table->foreign('Lesion')->references('id')->on('lesiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('tiposDeUsuarios');
        Schema::dropIfExists('lesiones');
        Schema::dropIfExists('eventos');
        Schema::dropIfExists('tiposDeEventos');
        Schema::dropIfExists('partidos');
        Schema::dropIfExists('jugadores');
        Schema::dropIfExists('equipos');



        
    }
}
