@include('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="Cabecera"></div>
            <div class="col-md-12">
                <div class="DivAbajo"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="Listado"></div>
        </div>
    </div>
    
</div>

<script>
    var entrenador = '{{$entrenador}}' ;
    console.log(entrenador);
    var equipo = {!! json_encode($equipoSeleccionado->toArray(), JSON_HEX_TAG) !!} ;
    var jugadores = {!! json_encode($jugadores->toArray(), JSON_HEX_TAG) !!} ;
    var tipo = $("#navbarDropdown");

    generarCabeceraEquipo(equipo[0],".Cabecera");
    
    if (entrenador == "vacio"){
       
        generarListaJugadores(jugadores,".Listado");
    }

    else {
        //hacer alineacion
    }

    
    
    
</script>