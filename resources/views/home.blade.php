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
    <div class="col-md-6">
        <div id="ranking"></div>
        <!--<div class="pagelinks">{{$equipos_ranking->links()}}</div>-->
        <div id="RankingPaginado"></div>

    </div>
    <div class="col-md-6"></div>
    </div>
</div>
