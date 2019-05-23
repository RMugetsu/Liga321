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
                    echo ("<select onchange='cambiarPosicion(".$jugadores[$i]['id'].")' width=50% class='posiciones' id='".$jugadores[$i]['id']."'>");
                    echo ("<option value='".$jugadores[$i]['posicion']."'>".$jugadores[$i]['posicion']."</option>");
                    for ($j=1;$j<12;$j++){
                        echo ("<option value=".$j.">".$j."</option>");
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
    var lista_alineacion = @json($alineacion);
    

    function cambiarPosicion(id){
        var ruta = "/cambiarPosicionJugador/"+id ;
        var valor_select_cambiado = $("#"+id+" option:selected").val();
        $.ajax({
                url: ruta,
                type: "post",
                data: {
                    _token: '{!! csrf_token() !!}',
                    posicion: valor_select_cambiado,
                }
            }).done(function() {
                console.log("bieen");
            }).fail(function(e) {
                console.log("error" );
                console.log(e );
            });

    }
    var alineacion = "";
    var entrenador = '{{$entrenador}}' ;
    console.log("entrenador: "+entrenador);
    var equipo = {!! json_encode($equipoSeleccionado->toArray(), JSON_HEX_TAG) !!} ;
    var jugadores = {!! json_encode($jugadores->toArray(), JSON_HEX_TAG) !!} ;
    var tipo = $("#navbarDropdown");
    generarCabeceraEquipo(equipo[0],".Cabecera");

    if (entrenador == "vacio"){
       
        generarListaJugadores(jugadores,".Listado");
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