@include('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 tituloPartido"></div>
            <label for="" id="tiempoDelPartido">44</label>
            <button onclick="sumarMinuto()" class="btn">sumar</button>

        <div class="col-md-12 plantillas"></div>
    </div>
</div>
<script>

    // console.log(partido);
    // var div_titulo = $(".tituloPartido");
    // var gollocal = 0;
    // var golvisitante = 0;
    // // var equipo1 = equipos[(partido['equipolocal'])-1]['nombre'];
    // // var equipo2 = equipos[(partido['equipovisitante'])-1]['nombre'];
    // // var equipos_partido = equipo1 +" "+gollocal+ " - "+golvisitante+" " + equipo2 ;
    // // div_titulo.append($("<h2>").text(equipos_partido));
    // var nose = moment("2019-05-22").isSame(fechaActual);
    // console.log(nose);
    // // if(moment(fecha).isSame(fechaActual)){
    // //     console.log("funciona");
    // // }else{
    // //     console.log("no funciona");
    // // };
    // console.log(horaActual);
    var partido = {!! json_encode($partido->toArray(), JSON_HEX_TAG) !!}[0] ;
    var fecha =  partido['fechainicio'];
    var hora =  partido['horadeinicio'];
    var momento  =  new moment();
    var fechaActual = momento.format("L");
    var horaActual = parseInt(momento.format("H"),10);
    $( document ).ready(function() {
    tiempoDelPartido()
        //comprobarHorarioDelPartido(fecha,fechaActual,hora,horaActual);
        obtenerNombreEquipo(partido['equipolocal'],".tituloPartido",1);
        obtenerNombreEquipo(partido['equipovisitante'],".tituloPartido",2);
        traerDatosJugadores(partido['equipolocal'])
        traerDatosJugadores(partido['equipovisitante'])
    });
</script>