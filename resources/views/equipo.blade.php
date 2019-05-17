@include('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="Cabecera"></div>
            <div class="col-md-12 Resultado">
                <div class="Resultado">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="Listado"></div>
        </div>
    </div>
    
</div>

<script>
    var entrenador = '{{$entrenador}}' ;
    var equipo = {!! json_encode($equipoSeleccionado->toArray(), JSON_HEX_TAG) !!} ;
    var jugadores = {!! json_encode($jugadores->toArray(), JSON_HEX_TAG) !!} ;
    console.log(entrenador);
    var Tipo = $("#navbarDropdown");
    console.log(equipo,jugadores);
    generarCabeceraEquipo(equipo[0],".Cabecera");
    generarListaJugadores(jugadores,".Listado");
</script>