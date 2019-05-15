@include('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="Cabecera"></div>
        </div>
            <div class="Listado">
        </div>
    </div>
</div>
<script>
    var equipo = {!! json_encode($equipoSeleccionado->toArray(), JSON_HEX_TAG) !!} ;
    var jugadores = {!! json_encode($jugadores->toArray(), JSON_HEX_TAG) !!} ;
    var Tipo = $("#navbarDropdown");
    console.log(equipo,jugadores);
    generarCabeceraEquipo(equipo[0],".Cabecera");
    generarListaJugadores(jugadores,".Listado");
</script>