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

    var partido = {!! json_encode($partido->toArray(), JSON_HEX_TAG) !!}[0] ;
    var fecha = partido['fechainicio'].split("-");
    var hora = partido['horadeinicio'];
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
            if(fecha[1]==fechaActual[1]){
                if(fecha[2]===fechaActual[0]){
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
    

    comprobarHorarioDelPartido(fecha,fechaActual,hora,horaActual);
    
    
    var fecha =  partido['fechainicio'];
    var hora =  partido['horadeinicio'];
    var momento  =  new moment();
    var fechaActual = momento.format("L");
    var horaActual = parseInt(momento.format("H"),10);
    $( document ).ready(function() {
    tiempoDelPartido()
        //comprobarHorarioDelPartido(fecha,fechaActual,hora,horaActual);
        obtenerNombreEquipo(partido['equipolocal'],partido['equipovisitante'],".tituloPartido");
        traerDatosJugadores(partido['equipolocal'],partido['equipovisitante'])
    });
</script>

