@include('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 tituloPartido">
        </div>
        <div class="col-md-12 contenido">

        </div>
    </div>
</div>
<script>
    var partido = {!! json_encode($partido->toArray(), JSON_HEX_TAG) !!}[0] ;
    var equipos = {!! json_encode($equipos->toArray(), JSON_HEX_TAG) !!} ;
    console.log(equipos);

    var div_titulo = $(".tituloPartido");
    var gollocal = 0;
    var golvisitante = 0;
    var equipo1 = equipos[(partido['equipolocal'])-1]['nombre'];
    var equipo2 = equipos[(partido['equipovisitante'])-1]['nombre'];
    var equipos_partido = equipo1 +" "+gollocal+ " - "+golvisitante+" " + equipo2 ;
    div_titulo.append($("<h2>").text(equipos_partido));

    var fecha =  partido['fechainicio'].split("-");
    var hora =  partido['horadeinicio'];
    var momento = new moment();
    var fechaActual = momento.format("L").split("/");
    var horaActual = parseInt(momento.format("H"),10);
    var nose = moment("2019-05-22").isSame(fechaActual);
    console.log(nose);
    // if(moment(fecha).isSame(fechaActual)){
    //     console.log("funciona");
    // }else{
    //     console.log("no funciona");
    // };
    
    console.log(horaActual);
    function comprobarDiaDelPartido(fecha,fechaActual){
        console.log(fecha,fechaActual);
        var prueba = "22";
        if(fecha[0]==fechaActual[2]){
            if(fecha[1]==fechaActual[0]){
            console.log(prueba,fecha[2]);
            console.log(typeof(prueba),typeof(fecha[1]));
                if(prueba===fecha[2]){
                    console.log("se juega el partido hoy");
                    return true;
                }
                return false;
            }
            console.log(fecha[0],fechaActual[0]);
            console.log("2");
            return false;
        }
    }
    function comprobarHorarioDelPartido(fecha,fechaActual,hora,horaActual){
        if (comprobarDiaDelPartido(fecha,fechaActual)){
            console.log(hora, horaActual);
            if(parseInt(hora,10)>horaActual){
                   mensajeDePartidoSinJugar(fecha,hora);
            }
            else if( parseInt(hora,10)==horaActual || parseInt(hora,10)+1==horaActual ){
                jugadoresDeLosEquiposDelPartido();
                mensajeDePartidoSinJugar(fecha,hora);
            }
            else if(parseInt(hora,10)<horaActual){
                console.log("El partido ya se ha jugado");
            }
        }
    }

    comprobarHorarioDelPartido(fecha,fechaActual,hora,horaActual);
    
    function mensajeDePartidoSinJugar(fecha,hora){
        var mensaje = "El partido se jugará el " +fecha[2]+" de "+fecha[1]+" del "+fecha[0]+ " a las "+ hora+":00H";
        $(".contenido").append($("<h2>").text(mensaje));
    }

    var jugadores_local = traerDatosJugadores(partido['equipolocal']);
    var jugadores_visitante = traerDatosJugadores(partido['equipovisitante']);

    function traerDatosJugadores(id){
        $.ajax({
        url: "/api/partido/informacionjugadores/"+id,
        })
        .done(function( data ) {
            if ( console && console.log ) {
            console.log( "Sample of data:", data.slice( 0, 100 ) );
            }
        });
   }
    

    </script>