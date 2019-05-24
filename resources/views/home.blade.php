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
    var jugadores_ranking = {!! json_encode($jugadores_ranking->toArray(), JSON_HEX_TAG) !!} ;
    var eventos = {!! json_encode($eventos->toArray(), JSON_HEX_TAG) !!} ;

    

</script>