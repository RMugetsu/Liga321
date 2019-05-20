@include('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="tabla"></div>
        </div>
    </div>
</div>

<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var usuarios = {!! json_encode($usuarios->toArray(), JSON_HEX_TAG) !!} ;
    console.log(usuarios);
    var tabla = $("<table>").attr("class","table ranking table-fixed");
        var thead = $("<thead>").attr("class","thead-dark");
        $(thead).append($("<th>").text("Nombre"));
        $(thead).append($("<th>").text("tipo Por Confirmar"));
        $(thead).append($("<th>").text("tipo"));
        $(thead).append($("<th>").text("Opciones"));
        $(tabla).append(thead);
        $("#tabla").append(tabla);
    for (listaUsuarios in usuarios){
        var fila =$("<tr>");
        $(fila).append($("<td>").text(usuarios[listaUsuarios]["name"]));
        $(fila).append($("<td>").text(usuarios[listaUsuarios]["notificaciontipo"]));
        $(fila).append($("<td>").text(usuarios[listaUsuarios]["tipo"]));
        if(usuarios[listaUsuarios]["tipo"]==undefined){
            var opciones = $("<td>");
            var aceptar = $("<button>").addClass("btn btn-success")
                                        .text("Confirmar")
                                        .on( "click",
                                        {tipo:usuarios[listaUsuarios]["notificaciontipo"],  id:usuarios[listaUsuarios]["id"]}
                                        ,modificartipo);
            var denegar = $("<button>").addClass("btn btn-danger")
                                        .text("Denegar")
                                        .on( "click",
                                        {tipo: 2,  id:usuarios[listaUsuarios]["id"]}
                                        ,modificartipo);
            $(opciones).append(aceptar);
            $(opciones).append(denegar);
            $(fila).append(opciones)
        }
        $(tabla).append(fila);
        
    }

    function modificartipo(event){
        $.ajax({
            url:'modificarUsuario',
            type:"post",
            data:{
                _token: CSRF_TOKEN,
                tipo: event.data.tipo,
                id: event.data.id,
            },
        })
        .done(function(){
            console.log("Todo bien")
        }).fail(function(){
            console.log("Todo mal")
        });
    }
</script>