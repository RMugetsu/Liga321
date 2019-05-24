@include('layouts.app')

@section('content')
<script>
    $(document).ready(function(){
        var informacion_equipos = {!! json_encode($equipos_ranking->toArray(), JSON_HEX_TAG) !!};

        //generarTablas("#ranking",informacion_equipos["data"],"/equipo/");
        ajaxRanking("1","");
        
    });

</script>
<div class="container">
    <div class="row">
    <div align="center" class="col-md-6">
        <div id="ranking"></div>
        <!--<div class="pagelinks">{{$equipos_ranking->links()}}</div>-->
        <div align="center" id="RankingPaginado"></div>

    </div>
    <div class="col-md-6"></div>
        <div id="jugadoresRanking"></div>
        <!--<div class="pagelinks">{{$equipos_ranking->links()}}</div>-->
        <div align="center" id="JugadoresPaginado"></div>
    </div>
</div>

<script>
    var eventos = {!! json_encode($eventos->toArray(), JSON_HEX_TAG) !!} ;
    var idjugador_goles_ranking = [];

    for (var i=0; i<eventos.length; i++){
        var contador = 0;
        var id_actual = (eventos[i]['jugador1']);

        for (var j=0; j<eventos.length; j++){
            if (eventos[j]['jugador1'] == id_actual){
                contador++;
            }
        }
        idjugador_goles_ranking.push([id_actual, contador]);
    }
    var jugadores_goles = [];
    for (var x=0; x<idjugador_goles_ranking.length; x++){
        var id_actual = idjugador_goles_ranking[x][0];    
        if (x==0){
            jugadores_goles.push([idjugador_goles_ranking[x][0], idjugador_goles_ranking[x][1]]);
        }
        var control = 0;
        for (var j=0; j<jugadores_goles.length; j++){
            if (jugadores_goles[j] != undefined){
                if(id_actual == jugadores_goles[j][0]){
                    control = 1;
                }
            }
        }
        if (x!=0 && control == 0){
            jugadores_goles.push(idjugador_goles_ranking[x]);
        }
     }   

</script>