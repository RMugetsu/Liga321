@include('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 tituloPartido">
        </div>
        <div class="col-md-12">
        </div>
    </div>
</div>
<script>
    var partido = {!! json_encode($partido->toArray(), JSON_HEX_TAG) !!}[0] ;
    var equipos = {!! json_encode($equipos->toArray(), JSON_HEX_TAG) !!} ;
    console.log(partido);

    var div_titulo = $(".tituloPartido");
    var gollocal = 0;
    var golvisitante = 0;
    var equipo1 = equipos[(partido['equipolocal'])-1]['nombre'];
    var equipo2 = equipos[(partido['equipovisitante'])-1]['nombre'];
    var equipos_partido = equipo1 +" "+gollocal+ " - "+golvisitante+" " + equipo2 ;
    div_titulo.append($("<h2>").text(equipos_partido));

    var fecha =  partido['fechainicio'];
    var hora =  partido['horadeinicio'];
    var moment  =  new moment();
    var fechaActual = moment.format("Y-M-D");
    var horaActual = parseInt(moment.format("H"),10);
    var nose = moment("2019-05-22").isSame(fechaActual);
    console.log(nose);
    // if(moment(fecha).isSame(fechaActual)){
    //     console.log("funciona");
    // }else{
    //     console.log("no funciona");
    // };
    console.log(horaActual);
    function comprobarDiaDelPartido(fecha,fechaActual){
        if(parseInt(fecha[0],10)===parseInt(fechaActual[0],10)){
            if(fecha[1]==fechaActual[1]){
                if("21"==fechaActual[1]){
                    console.log("se juega el partido hoy");
                    return true;
                }
                console.log(fecha[1],fechaActual[1]);
                console.log("1");
                return false;
            }
            console.log(fecha[0],fechaActual[0]);
            console.log("2");
            return false;
        }
    }
    function comprobarHorarioDelPartido(fecha,fechaActual,hora,horaActual){
        if (comprobarDiaDelPartido(fecha,fechaActual)){
            if(hora>horaActual){
                console.log("El partido aun no se ha jugado")
            }
        }
    }

    comprobarHorarioDelPartido(fecha,fechaActual,hora,horaActual);
    

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