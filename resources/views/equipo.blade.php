@include('layouts.app')

@section('content')
<div class="container">
    <?php
        $alineacion = ['1-3-1-3-3', '1-3-3-1-3', '1-3-3-3-1','1-3-4-3','1-4-1-3-2','1-4-1-4-1','1-4-2-2-2','1-4-2-3-1','1-4-3-2-1','1-4-3-3','1-4-4-1-1','1-4-4-2','1-4-5-1'];
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="Cabecera"></div>
            <div class="DivAbajo col-md-12">
                @if($entrenador!="vacio")
                    @include('alineacion')
                @endif
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="Listado">
            @if($entrenador!="vacio")
                <?php 
                for ($i=0;$i<sizeof($jugadores);$i++){                    
                    if ($jugadores[$i]['posicion'] < 12) {
                        echo ("<select onchange='cambiarPosicion(".$jugadores[$i]['id'].")' width=50% class='posiciones' id='".$jugadores[$i]['id']."'>");
                    } else {
                        echo ("<select style='background-color: #ECCEFF;' onchange='cambiarPosicion(".$jugadores[$i]['id'].")' width=50% class='posiciones' id='".$jugadores[$i]['id']."'>");
                    }
                        echo ("<option value='".$jugadores[$i]['posicion']."'>".$jugadores[$i]['posicion']."</option>");
                    for ($j=1;$j<19;$j++){
                        if ($j<12) {
                            echo ("<option class='convocado' value=".$j.">".$j."</option>");
                        }
                        else {
                            echo ("<option class='sustituto' value=".$j.">".$j."</option>");
                        }
                    }
                    echo ("</select>");
                    echo ("<label><b>&nbsp". $jugadores[$i]['nombre'] ."&nbsp". $jugadores[$i]['apellido'] ." </b></label><br>");

                }
                ?>
            @endif
            
            </div>
        </div>
    </div>
    
</div>

<script>

    var eventos = {!! json_encode($eventos) !!}
    var partido = {!! json_encode($partido) !!}

    var lista_alineacion = @json($alineacion);
    

    function cambiarPosicion(id){
        var ruta = "/cambiarPosicionJugador/"+id ;
        var valor_select_cambiado = $("#"+id+" option:selected").val();
        var cambioRepetido = "";
        for (var i=0; i<19; i++){
            var valor = $("#"+i+" option:selected").val();
            if (valor == valor_select_cambiado){
                if (i!=id){
                    cambioRepetido = i ;
                }
            }
        }
        
        var antiguaPosicion = "";

        $.ajax({
                url: ruta,
                type: "post",
                data: {
                    _token: '{!! csrf_token() !!}',
                    posicion: valor_select_cambiado,
                    repetido: cambioRepetido,
                }
            }).done(function(res) {
                antiguaPosicion = res;
                $("#"+cambioRepetido+" option[value='"+ antiguaPosicion +"']").attr("selected",true);

            }).fail(function(e) {
                console.log("error" );
                console.log(e );
            });



    }

    var alineacion = "";
    var entrenador = '{{$entrenador}}' ;
    var equipo = {!! json_encode($equipoSeleccionado->toArray(), JSON_HEX_TAG) !!} ;
    var jugadores = {!! json_encode($jugadores->toArray(), JSON_HEX_TAG) !!} ;
    var nombreContrincante = {!! json_encode($nombreContrincante->toArray(), JSON_HEX_TAG) !!}[0]['nombre'] ;
    
    var tipo = $("#navbarDropdown");
    generarCabeceraEquipo(equipo[0],".Cabecera");

    if (entrenador == "vacio"){
       
        generarListaJugadores(jugadores,".Listado");

        var golesLocal = "";
        var golesVisitante = "";
        var equipoLocal = partido[0]['equipolocal'];
        var equipoVisitante = partido[0]['equipovisitante'];

        for(var i=0; i<eventos.length; i++){
            if (eventos[i]['tipo']==1){
                if (eventos[i]['equipo'] == equipoLocal){
                    golesLocal++;
                }
                else {
                    golesVisitante++;
                }
            }
        }

        if (equipo[0]['id'] == equipoLocal){
           // var texto = equipo[0]['nombre'] + " " + golesLocal + " - " + golesVisitante + " " + nombreContrincante ;
            var text = $("<a>").text(equipo[0]['nombre'] + " " + golesLocal + " - " + golesVisitante + " " + nombreContrincante);
        }
        else {
            var text = $("<a>").text(nombreContrincante + " " + golesLocal + " - " + golesVisitante + " " + equipo[0]['nombre']);
        }

        text.attr("href","/partido/"+partido[0]['id']);
        var titulo = $("<h4>");
        titulo.append(text);

        var div = $("<div>");
        div.append(titulo);

        var h3 = $("<h3>").text("Resultado último partido:");

        $(".DivAbajo").append($("<br><br><br><br><br><br><br>"));

        $(".DivAbajo").append(h3);
        $(".DivAbajo").append(div);



        /*         <!--[{"id":1,"tipo":1,"minuto":10,"jugador1":1,"jugador2":null,
                    "equipo":1,"sancion":null,"partido":1,"created_at":null,"updated_at":null},
                
                {"id":2,"tipo":1,"minuto":20,"jugador1":30,"jugador2":null,"equipo":2,"sancion":null,"partido":1,"created_at":null,"updated_at":null},{"id":3,"tipo":1,"minuto":40,"jugador1":30,"jugador2":null,"equipo":2,"sancion":null,"partido":1,"created_at":null,"updated_at":null},{"id":4,"tipo":1,"minuto":30,"jugador1":30,"jugador2":null,"equipo":2,"sancion":null,"partido":1,"created_at":null,"updated_at":null},{"id":5,"tipo":1,"minuto":70,"jugador1":30,"jugador2":null,"equipo":2,"sancion":null,"partido":1,"created_at":null,"updated_at":null}]*/
    }

    else {

        var num_alineacion = (equipo[0]['alineacion'])-1;
        var imagen = $("<img>").attr("src","/img/"+lista_alineacion[num_alineacion]+".PNG");
        imagen.attr("width","80%");
        imagen.attr("id","imgAlineacion");
        var div = $("<div>").attr("align","center");
        div.attr("class","imagenAlineacion col-md-12");
        div.append(imagen);
        $(".cuadroGuardarAlineacion").append(div);
    }

    $( ".alineacion" ).change(function() {
        if ($("select option:selected").val()!=""){
            $("#guardarAlineacion").prop("disabled",false);
            var nombre_img = "/img/"+($("select option:selected").val())+".PNG";
            $("#imgAlineacion").attr("src",nombre_img);
            alineacion = $("select option:selected").attr("name");
        }
        else {
            $("#guardarAlineacion").prop("disabled",true);
        }
    });

    var ruta = '/guardarAlineacion/'+equipo[0]['id'];
    $("#guardarAlineacion").click(function() {
            $.ajax({
                url: ruta,
                type: "post",
                data: {
                    _token: '{!! csrf_token() !!}',
                    alineacion: alineacion,
                }
            }).done(function() {
                $('#modalPsw').modal('hide');
                $('#modalSatisfactorio').modal('toggle');
            }).fail(function(e) {
                console.log("error" );
                console.log(e );
            });
        });

</script>