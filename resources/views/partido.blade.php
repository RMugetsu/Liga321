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
    console.log(equipos);

    var div_titulo = $(".tituloPartido");
    var equipo1 = equipos[(partido['Equipo_Local'])-1]['Nombre'];
    var equipo2 = equipos[(partido['Equipo_Visitante'])-1]['Nombre'];
    var equipos_partido = equipo1 + " - " + equipo2 ;
    div_titulo.append($("<h2>").text(equipos_partido));


    var jugadores_local = traerDatosJugadores(partido['Equipo_Local']);
    var jugadores_visitante = traerDatosJugadores(partido['Equipo_Visitante']);

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