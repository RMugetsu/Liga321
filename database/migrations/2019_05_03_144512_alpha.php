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
            $table->string('rol');
            $table->timestamps();
        });

        Schema::create('tiposDeEventos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('evento');
            $table->timestamps();
        });

        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nombre');
            $table->string('logo')->nullable();
            $table->string('equipacion1')->nullable();
            $table->string('equipacion2')->nullable();
            $table->string('direcciondelcampo');
            $table->string('entrenador');
            $table->integer('alineacion');
            $table->integer('victoria');
            $table->integer('empate')->default(0);
            $table->integer('derrota');
            $table->integer('puntos');
            $table->timestamps();
        });

        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('arbitro');
            $table->integer('equipolocal')->unsigned();
            $table->integer('equipovisitante')->unsigned();
            $table->date('fechainicio');
            $table->string('horadeinicio');
            $table->foreign('equipolocal')->references('id')->on('equipos');
            $table->foreign('equipovisitante')->references('id')->on('equipos');
            $table->timestamps();
        });
        Schema::create('jugadores', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('dorsal');
            $table->integer('equipo')->unsigned();
            $table->integer('edad');
            $table->integer('lesion')->nullable()->unsigned();
            $table->integer('partidosjugados');
            $table->integer('posicion');
            $table->foreign('equipo')->references('id')->on('equipos');
            $table->timestamps();
        });
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('tipo')->unsigned();
            $table->integer('minuto');
            $table->integer('jugador1')->nullable()->unsigned();
            $table->integer('jugador2')->nullable()->unsigned();
            $table->integer('equipo')->nullable()->unsigned();
            $table->integer('sancion')->nullable()->unsigned();
            $table->integer('partido')->unsigned();
            $table->foreign('tipo')->references('id')->on('tiposDeEventos');
            $table->foreign('jugador1')->references('id')->on('jugadores');
            $table->foreign('jugador2')->references('id')->on('jugadores');
            $table->foreign('equipo')->references('id')->on('equipos');
            $table->foreign('sancion')->references('id')->on('eventos');
            $table->foreign('partido')->references('id')->on('partidos');
            $table->timestamps();
        });

        Schema::create('lesiones', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('evento')->nullable()->unsigned();
            $table->date('fechainicio')->nullable();
            $table->date('fechafinal')->nullable();
            $table->string('descripcion')->nullable();
            $table->foreign('evento')->references('id')->on('eventos');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('notificaciontipo')->nullable();
            $table->integer('tipo')->nullable()->unsigned();
            $table->integer('equipo')->nullable()->unsigned();
            $table->foreign('tipo')->references('id')->on('tiposDeUsuarios');
            $table->foreign('equipo')->references('id')->on('equipos');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::table('jugadores', function (Blueprint $table) {
            $table->foreign('lesion')->references('id')->on('lesiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('jugadores', function (Blueprint $table) {
            $table->dropForeign('jugadores_lesion_foreign');
            $table->dropForeign('jugadores_equipo_foreign');
        });
        Schema::table('partidos', function (Blueprint $table) {
            $table->dropForeign('partidos_equipo_local_foreign');
            $table->dropForeign('partidos_equipo_visitante_foreign');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_equipo_foreign');
        });
        Schema::dropIfExists('lesiones');
        Schema::dropIfExists('eventos');
        Schema::dropIfExists('jugadores');
        Schema::dropIfExists('tiposDeEventos');
        Schema::dropIfExists('partidos');
        Schema::dropIfExists('equipos');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('tiposDeUsuarios');
        Schema::dropIfExists('password_resets');
    }
}
