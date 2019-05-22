var global_countTime;

// $('#form').submit(function(e){
//     console.log("hola");
//     e.preventDefault();
//     if(checkNulls()){
//         console.log("ha visto checknulls");
// 		var ruta = $("input[name='ruta']").val() ;
//         $.ajax({
// 			url: ruta, 
// 			type: 'POST', 
// 			dataType: 'html', 
// 			data: $('#form').first().serialize(), 
// 			success: function() {
//                 $('#modalPsw').modal('toggle');
//                 $('#modalSatisfactorio').modal('toggle');
// 			},
// 			error: function(e) {
// 				console.log("error");
// 				console.log(e);
// 				createError("Error del servidor.");
// 			}
// 	  }); 
//     }
// });

function checkNulls(){
    let control = true;
    $('#form .input').each(function(){
        if($(this).val() === ""){
            $(this).css('border','1px solid red');
            control = false;
        }else if($(this).children("option:selected").val() === ""){
			$(this).css('border','1px solid red');
            control = false;
		}
    })

    if(control){
        return true;
    }else{
        createError("Todos los campos son obligatorios.","blank");
        return false;
    }
}

function generarTablas(padre,data,ruta,iconos){

    var cabecera = obtenerCabecera(data);
    var controlDeCabecera = 0;
    var tabla = $("<table>").attr("class","table ranking table-fixed");
    var thead = $("<thead>").attr("class","thead-dark");

    $(tabla).append(thead);

    for (x in data){
        var fila = $("<tr>").attr("class","fila");
        for(y in data[x]){
            // Generar cabecera de la tabla de datos
            if(controlDeCabecera==0){
                for(z in cabecera){
                    if (cabecera[z] != "id"){
                        $(thead).append($("<th>").text(cabecera[z]));
                    }
                }

                controlDeCabecera++;
            }
            // Fin de la cabecera

            // Cuerpo
            if (controlDeCabecera==1){
                var tbody = $("<tbody>");
                $(tabla).append(tbody);
                controlDeCabecera++;
            }
            if (y=="id" && ruta!=undefined){
                $(fila).on("click",{url: ruta+data[x][y]},redirigir);
            }
            
           if( y!="id" ) {
                $(fila).append($("<td>").text(data[x][y]))
                if (y=="tipo"){
                    var tipo = data[x][y];
                }
           }
            // Fin Cuerpo

        }
        /*if (iconos=="Si"){
            $(thead).append($("<th>").text(" "));
            generarIconos(fila,data[x]["Ruta"],tipo,data[x]["Nombre"]);    
        }*/
        $(tabla).append(fila);
       
    }
    $(padre).append(tabla)
}

function obtenerCabecera(data){
    
    var cabecera =[];

    for (x in data[0]){
        cabecera.push(x)
    }
    return cabecera;
}


function redirigir(event){
    window.location = event.data.url;
}

function createError(Message, elements){
        $('.Error').hide();
        $('<div>')
        .attr({class:'Error'})
        .text(Message)
        .appendTo('.ErrorContainer');
        if (elements != undefined){
            for (var i=0;i<elements.length;i++){
                elements[i].css("background-color","#F3A1B3");
            }
        }
        $('.ErrorContainer').show();
        setTimer();
}

function setTimer(){
	clearTimeout(global_countTime);
	global_countTime =	setTimeout(function (){
        var errorContainer = $('.ErrorContainer');
        errorContainer.hide();
        errorContainer.empty();
	}, 5000);
}


function generarListadoDeUsuarios(usuarios){
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
}

function modificartipo(event){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'modificarUsuario/'+event.data.id,
        type:"post",
        data:{
            _token:  token,
            tipo: event.data.tipo,
        },
    })
    .done(function(usuarios){
        $("#tabla").empty();
        generarListadoDeUsuarios(usuarios);
    }).fail(function(error){
        console.log(error)
    });
}