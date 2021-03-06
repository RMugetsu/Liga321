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

function generarTablas(padre,data,ruta,iconos,array){
    var ranking_jugadores = ['Id','Goles','Nombre','Apellido','Dorsal'];

    //console.log("datatabla: "+data);
    if (padre == "#jugadoresRanking"){
        var cabecera = ranking_jugadores;
    }
    else {
        var cabecera = obtenerCabecera(data);
    }
    var controlDeCabecera = 0;
    var tabla = $("<table>").attr("class","table table-dark table-striped ranking table-fixed");
    var thead = $("<thead>").attr("class","thead-dark");

    $(tabla).append(thead);

    for (x in data){
        var fila = $("<tr>").attr("class","fila");
        for(y in data[x]){
            // Generar cabecera de la tabla de datos
            if(controlDeCabecera==0){
                for(z in cabecera){
                    if (cabecera[z] != "Id"){
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
            if (padre == "#jugadoresRanking"){
                $(fila).on("click",{url: ruta+array[x]},redirigir);
            }

            if (y=="id" && ruta!=undefined){
                $(fila).on("click",{url: ruta+data[x][y]},redirigir);
            }
            
           if( y!="id" ) {
                
                if (y=="logo"){
                    var num = parseInt(x);
                    var src = "/img/iconosEquipos/"+data[x]['id']+".png";
                    $(fila).append($("<td>").append($("<img>").attr("src",src)));
                }
                else if (y=="tipo"){
                    var tipo = data[x][y];
                }
                else {
                   $(fila).append($("<td>").text(data[x][y]))
                }

           }
            // Fin Cuerpo

        }
        $(tabla).append(fila);
    }
    $(padre).append(tabla)
}

function obtenerCabecera(data){
    //console.log("data: "+data);
    var cabecera =[];

    for (x in data[0]){
        x = (x.charAt(0).toUpperCase() + x.slice(1));
        cabecera.push(x);  
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


function crearPaginado(parent,info){
    //console.log(info);
    var divPaginado = $("<div>");
    for (var i = 1; i<= info.last_page; i++) {
        if (i==1 && info.current_page!=1) {
            var inicioPaginado = $("<a>").text("<").attr("href",info.current_page-1).addClass("paginacion btn btn-default");
            $(divPaginado).append(inicioPaginado);
        }else if(i==1 && info.current_page==1){
            var inicioPaginado = $("<a>").text("<").addClass("btn btn-default");
            $(divPaginado).append(inicioPaginado);
        }
        if( i==info.current_page){
            var paginaIntermedia = $("<a>").text(i).attr("href",i).addClass("paginacion btn btn-default active");
        $(divPaginado).append(paginaIntermedia);
        }else{
            var paginaIntermedia = $("<a>").text(i).attr("href",i).addClass("paginacion btn btn-default");
        $(divPaginado).append(paginaIntermedia);
        }
        if (i==info.last_page && info.current_page!=info.last_page){
            var finalPaginado = $("<a>").text(">").attr("href",info.current_page+1).addClass("paginacion btn btn-default");
            $(divPaginado).append(finalPaginado);
        }else if(info.current_page==info.last_page && i==info.last_page){
            var finalPaginado = $("<a>").text(">").addClass("btn btn-default");
            $(divPaginado).append(finalPaginado);
        }
    }
    $(parent).append(divPaginado);
}

function ajaxRanking(page){
    //var valorFiltrado = $("input[type=text][name=filtro]").val();
    $.ajax({
            url:"/Inicio",
            data: {
                page:page,
                // filtro: valorFiltrado
            },
        })
        .done(function(res){
            $('#ranking').empty();
            $("#RankingPaginado").empty();
            //console.log("ajax data: "+res);
            generarTablas("#ranking",res.data,"/equipo/"); //crear tabla nuevo contenido
            //AsignarLinks();
            crearPaginado("#RankingPaginado",res);
            $(document).ready(function(){
                $(".paginacion").on('click',function(e){
                    e.preventDefault();
                    ajaxRanking($(this).attr('href'));
                });
                // $("input[type=submit]").on('click',function(a){
                //     a.preventDefault();
                //     ajaxRanking("1");
                // });
                //$("input[type=text][name=filtro]").val(valorFiltrado);
            });
        })
        .fail(function(jqXHR,textStatus){
            console.log("fail: "+textStatus);
        });  
    }