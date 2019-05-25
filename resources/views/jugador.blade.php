@include('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row Cabecera">
                <div align="left" class="col-md-8">
                    <h1><?php echo $jugador[0]['nombre'] . " " . $jugador[0]['apellido']?></h1>
                    <br><br>
                    <h3>Equipo: <?php echo("<a href='/equipo/".$equipo[0]['id']."'>".$equipo[0]['nombre']." </a>" );?></h3>
                    
                </div>
                <div align="right" class="col-md-4">
                    <img  heigth='70%' width='70%' <?php echo ("src='/img/iconosJugadores/".rand(1,4).".png'");?>>
                </div>
                <div class='col-md-3'>
                    <?php echo("<a align='center' class='btn btn-primary btn-verequipo' href='/equipo/".$equipo[0]['id']."'> Ver equipo</a>" );?>
                </div>
                <div align="right" class="informacion col-md-9"></div>

            </div>
        </div>
        
    </div>
</div>
<script>
    var jugador = {!! json_encode($jugador->toArray(), JSON_HEX_TAG) !!} ;
    var equipo = {!! json_encode($equipo->toArray(), JSON_HEX_TAG) !!} ;
    var goles = {!! json_encode($goles->toArray(), JSON_HEX_TAG) !!} ;
    
    var tabla = $("<table>").attr("class","tablaInfoJugador table table-dark");
    //var thead = $("<thead>").attr("class","thead-dark");
    for (x in jugador[0]){
        if (x=='dorsal' || x=='edad' || x=='lesion' || x=='edad' || x=='partidosjugados'){
               var tr = $("<tr>"); 

            var text = x.charAt(0).toUpperCase() + x.slice(1);

            if (x=='lesion'){
                if (jugador[0][x] != null){
                    tr.append($("<th>").text(text));
                    tr.append($("<td>").text(jugador[0][x]));
                }
            }
            else {
                if (x=="partidosjugados"){
                    text = "Partidos Jugados";
                }
                tr.append($("<th>").text(text));
                tr.append($("<td>").text(jugador[0][x]));
                }
                tabla.append(tr);

        }
        
    }

        var tr = ($("<tr>"));
        tr.append($("<th>").text("Goles"));
        tr.append($("<td>").text(goles.length));
        tabla.append(tr);
        $(".informacion").append(tabla);

    


    
</script>