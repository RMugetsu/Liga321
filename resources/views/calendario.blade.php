@include('layouts.app')

<?php $equipos =config('data.equipos'); ?>
   
<div id="calendario" align="center"></div>

<script>

var equipos = {!! json_encode($equipos) !!}

var mes = 0;

var partidos = {!! json_encode($partidos->toArray(), JSON_HEX_TAG) !!} ;

tabla(mes,partidos,equipos);

$("#calendario").on("click", "#anterior", function(){
  mes -=1
  tabla(mes,partidos,equipos);
})

$("#calendario").on("click", "#siguiente", function(){
  mes +=1
  tabla(mes,partidos,equipos);
})
  

//var enlace = $("<a>").attr("href","/").text("hola");
//$("#prueba").append(enlace);
</script>



<style>
.table {
  text-align: center;
}
</style>
