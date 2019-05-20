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

    </script>