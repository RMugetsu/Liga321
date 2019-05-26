function generarPlantilla(jugadores){

    var plantilla = $("<div>").addClass("col-md-5");
    for(var x = 0; x<11;x++){
        $(plantilla).append($("<button>").text(jugadores[x]['nombre']+" "+jugadores[x]['apellido'])
        .attr({"posicion":jugadores[x]["posicion"],
        "class":jugadores[x]["id"],"type":"button","data-toggle":"modal",
        "data-target":"#exampleModal"}).addClass("btn margen-boton")
        .on("click",{nombre:jugadores[x]['nombre']+" "+jugadores[x]['apellido'],posicion:jugadores[x]["posicion"],id:jugadores[x]["id"]},
        abrirModal)
        );
        idJugadoresJugandoElPartido.push(jugadores[x]["id"]);
        if(x%2==1){
            $(plantilla).append($("<br>"));
        }
    }
    $("[class='row filaPlantilla']").append(plantilla);
    tiempoDelPartido()
}
function traerDatosJugadores(id,id2){
    var urlDestino2 = "/api/partido/informacionjugadores/"+id+"/"+id2;
    $.ajax({
    url: urlDestino2,
    })
    .done(function( data ) {
        generarPlantilla(data[0]);
        generarPlantilla(data[1]);
    }).fail(function(error){
        console.log(error);
    });
};

function mostrarEquipoEnElTitulo(nombre,padre,id,num){
    var titulo = $("#tituloPartido");
    if(num=="1"){
        $(titulo).append($("<img>").attr("src","/img/iconosEquipos/"+id+".png").addClass("titularDelPartido").attr("id",id));
        $(titulo).append($("<label>").text(nombre).addClass("titularDelPartido local").attr("id",id));
        $(titulo).append($("<label>").text(" 0 ").addClass("titularDelPartido marcador local").attr("id","equipo"+id));
        $(titulo).append($("<label>").text(" - ").addClass("titularDelPartido"));
    }else if(num=="2"){
        $(titulo).append($("<label>").text(" 0 ").addClass("titularDelPartido marcador visitante").attr("id","equipo"+id));
        $(titulo).append($("<label>").text(nombre).addClass("titularDelPartido visitante").attr("id",id));
        $(titulo).append($("<img>").attr("src","/img/iconosEquipos/"+id+".png").addClass("titularDelPartido").attr("id",id));
    }
    $(padre).append(titulo);
}

function obtenerNombreEquipo(id,id2,padre){
    var urlDestino = "/api/info/Equipo/"+id+"/"+id2;
     $.ajax({
             url:urlDestino,
     }
     ).done(function(res){
        mostrarEquipoEnElTitulo(res[0][0]['nombre'],padre,id,1);
        mostrarEquipoEnElTitulo(res[1][0]['nombre'],padre,id2,2);
     }).fail(function(error){
         console.log(error);
     });
 };

function comprobarDiaDelPartido(fecha,fechaActual){
    if(fecha[0]==fechaActual[2]){
        console.log(fecha[0],fechaActual[2]);
        if(fecha[1]==fechaActual[0]){
            console.log(fecha[1],fechaActual[0]);
            if(fecha[2]==fechaActual[1]){
                console.log(fecha[2],fechaActual[1]);
                obtenerNombreEquipo(partido['equipolocal'],partido['equipovisitante'],".tituloPartido");
                return true;
            }else if(fecha[2]>fechaActual[1]) {
                obtenerNombreEquipo(partido['equipolocal'],partido['equipovisitante'],".tituloPartido");
                var mensaje = $("<h3>").text("El partido se jugara el "+fecha[2]+" del "+fecha[1]+" de "+fecha[0]+" a las "+hora+"H");
                $(".plantillas").append(mensaje);
            return false;
            }else if(fecha[2]<fechaActual[1]) {
                partidoYaJugado(partido['equipolocal'],partido['equipovisitante'],partido['id']);
                var mensaje = $("<h3>").text("El partido se jugo el "+fecha[2]+" del "+fecha[1]+" de "+fecha[0]+" a las "+hora+"H");
                $(".plantillas").append(mensaje);
            return false;
            }
        }else if(fecha[1]<fechaActual[1]) {
            partidoYaJugado(partido['equipolocal'],partido['equipovisitante'],partido['id']);
                var mensaje = $("<h3>").text("El partido se jugara el "+fecha[2]+" del "+fecha[1]+" de "+fecha[0]+" a las "+hora+"H");
            $(".plantillas").append(mensaje);
            return false;
        }else if(fecha[1]>fechaActual[1]) {
            obtenerNombreEquipo(partido['equipolocal'],partido['equipovisitante'],".tituloPartido");
            var mensaje = $("<h3>").text("El partido se jugo el "+fecha[2]+" del "+fecha[1]+" de "+fecha[0]+" a las "+hora+"H");
            $(".plantillas").append(mensaje);
            return false;
        }
        return false;
    }else if(fecha[0]<fechaActual[2]) {
            partidoYaJugado(partido['equipolocal'],partido['equipovisitante'],partido['id']);
            var mensaje = $("<h3>").text("El partido se jugara el "+fecha[2]+" del "+fecha[1]+" de "+fecha[0]+" a las "+hora+"H");
            $(".plantillas").append(mensaje);

            return false;
    }else if(fecha[0]>fechaActual[2]) {
            obtenerNombreEquipo(partido['equipolocal'],partido['equipovisitante'],".tituloPartido");
            var mensaje = $("<h3>").text("El partido se jugo  el "+fecha[2]+" del "+fecha[1]+" de "+fecha[0]+" a las "+hora+"H");
            $(".plantillas").append(mensaje);
            return false;
    }
};

function comprobarHorarioDelPartido(fecha,fechaActual,hora,horaActual){
    if (comprobarDiaDelPartido(fecha,fechaActual)){
        console.log(hora,horaActual);
        if(hora==horaActual || parseInt(hora,10)+1==horaActual){
            if(tipo == 3){
                var fila = $("<div>").addClass("row filaPlantilla");
                $(".plantillas").append(fila);
                traerDatosJugadores(partido['equipolocal'],partido['equipovisitante']);
            }else{
                var mensaje = $("<h3>").text("El partido se esta jugando en este momento");
                $(".plantillas").append(mensaje);
            }

        }else if(hora>horaActual){
            var mensaje = $("<h3>").text("El partido se jugara el "+fecha[2]+" del "+fecha[1]+" de "+fecha[0]+" a las "+hora+"H");
            $(".plantillas").append(mensaje);
        }
         else if(hora<horaActual){
            var mensaje = $("<h3>").text("El partido se jugo el "+fecha[2]+" del "+fecha[1]+" de "+fecha[0]+" a las "+hora+"H");
            $(".plantillas").append(mensaje);
        }
    }
};

function abrirModal(event){
    $(".modalEventos").empty();
    obtenerEventosPartido();
    $("#nombreJugador").text(event.data.nombre).attr({"modal-posicion-jugador":event.data.posicion,"modal-id-jugador":event.data.id});
    $($(this).attr("data-target")).modal('show');
}

function generarBotonesDeEventosModal(eventos){
    var padre =$(".modalEventos");
    eventos.forEach(evento => {
        if(evento["evento"] == "Cambio De Jugador"){
            var botonDeEvento = $("<button>").text(evento["evento"]).addClass("btn").on("click",{id:evento["id"]},cambiarDeJugador);
            $(padre).append(botonDeEvento);
        }else if(evento["evento"] == "Gol"){
            var botonDeEvento = $("<button>").text(evento["evento"]).addClass("btn").on("click",{id:evento["id"]},eventoGoles);
            $(padre).append(botonDeEvento);
        }else if(evento["evento"] == "Faltas"){
            var botonDeEvento = $("<button>").text(evento["evento"]).addClass("btn").on("click",{id:evento["id"]},eventoFalta);
            $(padre).append(botonDeEvento);
        }
    });
}

function obtenerEventosPartido(){
    $.ajax({
            url:"/api/eventos/partido",
            },
    ).done(function(res){
        generarBotonesDeEventosModal(res);
    }).fail(function(error){
        console.log(error);
    });
};

function cambiarDeJugador(event){
    $("#nombreJugador").attr("eventoId",event.data.id);
    $(".modalEventos").empty();
    var idJugador1 = $("#nombreJugador").attr("modal-id-jugador");
    traerSuplentes(idJugador1);
}
function traerSuplentes(id){
    var urlSuplente = "/api/eventos/partido/suplente/"+id;
    $.ajax({
        url: urlSuplente,
        })
        .done(function( data ) {
            generarSuplentes(data);
        }).fail(function(error){
            console.log(error);
        });
}
function generarSuplentes(suplentes){
    var selectSuplentes = $("<select>").attr("id","listaSuplentes").on("change",asignarParametrosARealizarCambios);
    suplentes.forEach(suplente => {
        var opcion = $("<option>").text(suplente["nombre"]+" "+suplente["apellido"]).attr({"idJugador":suplente['id'],"posicionJugador":suplente["posicion"]});
        $(selectSuplentes).append(opcion);
    });
    $(".modalEventos").append($("<h4>").text("Jugadores Suplentes"));
    $(".modalEventos").append(selectSuplentes);
}
function realizarCambio(event){
    var idJugador1 = $("#nombreJugador").attr("modal-id-jugador");
    var posicionJugador1 = $("#nombreJugador").attr("modal-posicion-jugador");
    var tipoDeEvento = $("#nombreJugador").attr("eventoId");
    var tiempo = $("#tempo").text().split(":")[1];
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"post",
        url: "/intercambio",
        data:{
            _token:  token,
            idp: partido["id"],
            id1:idJugador1,
            posc1:posicionJugador1,
            id2: event.data.id,
            posc2: event.data.posc,
            num : tiempo,
            evento : tipoDeEvento,
        }
        })
        .done(function( data ) {
            remplazarBotonDeJugador(data[0],idJugador1,posicionJugador1);
            idJugadoresJugandoElPartido.push(event.data.id);
            $("#confirmar").off("click",realizarCambio);
            $("#exampleModal").modal("hide");

        }).fail(function(error){
            console.log(error);
        });
    }
function asignarParametrosARealizarCambios(){
    var elegido = $("option:contains("+this.value+")");
    var posicion = elegido.attr("posicionJugador");
    var identificadorJugador = elegido.attr("idJugador");
    $("#confirmar").on("click",
        {
            posc : posicion,
            id : identificadorJugador,
        },
        realizarCambio);
    $("#confirmar").attr("disabled", false);
}
function remplazarBotonDeJugador(data,id,posicion){
    var entraJugador = $("<button>").text(data['nombre']+" "+data['apellido'])
        .attr({"posicion":data["posicion"],
        "class":data["id"],"type":"button","data-toggle":"modal",
        "data-target":"#exampleModal"}).addClass("btn margen-boton")
        .on("click",{nombre:data['nombre']+" "+data['apellido'],posicion:data["posicion"],id:data["id"]},
        abrirModal);
    var saleJugador = $("."+id+"[posicion='"+posicion+"']");
    $(saleJugador).replaceWith(entraJugador);
    $("#confirmar").modal("hide");
    $("#confirmar").off("click",realizarCambio);
}
function eventoGoles(event){
    $("#nombreJugador").attr("eventoId",event.data.id);
    $(".modalEventos").empty();
    generarOpcionesDeGolEquipos()
}
function generarOpcionesDeGolEquipos(){
    var nombreLocal = $("[id][class='titularDelPartido local']");
    var nombreVisitante = $("[id][class='titularDelPartido visitante']");
    var titulo = $("<label>").text("Equipos: ");
    var local = $("<button>").attr("id",nombreLocal.attr("id")).addClass("btn equipos").on("click",seleccionarEquipo).text(nombreLocal.text());
    var visitante = $("<button>").attr("id",nombreVisitante.attr("id")).addClass("btn equipos").on("click",seleccionarEquipo).text(nombreVisitante.text());
    $(".modalEventos").append(titulo);
    $(".modalEventos").append($("<br>"));
    $(".modalEventos").append(local);
    $(".modalEventos").append(visitante);
}
function seleccionarEquipo(){
    $(this).text();
    $("#confirmar").off("click",realizarGol)
    $("#confirmar").on("click",{id:this.id},realizarGol);
    $("#confirmar").attr("disabled", false);
}

function realizarGol(event){
    var idJugador1 = $("#nombreJugador").attr("modal-id-jugador");
    var tipoDeEvento = $("#nombreJugador").attr("eventoId");
    var tiempo = $("#tempo").text().split(":")[1];
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"post",
        url: "/marcarGol",
        data:{
            _token:  token,
            idp: partido["id"],
            id1: idJugador1,
            equipo : event.data.id,
            num : tiempo,
            evento : tipoDeEvento,
        }
        })
        .done(function( data ) {
            cambiarMarcador(data);
            $("#confirmar").off("click",realizarGol);
            $("#exampleModal").modal("hide");
        }).fail(function(error){
            console.log(error);
        });
}
function cambiarMarcador(id){
    var resultado = $("[id='equipo"+id+"']");
    var valorActual = resultado.text();
    $(resultado).text(parseInt(valorActual,10)+1);
}

function generarCheckEventos(padre){
    var labelAmarilla = $("<label>").text("Tarjeta Amarilla");
    var amarilla = $("<input>").attr("type","checkbox").val("2");
    var labelRoja = $("<label>").text("Tarjeta Roja");
    var roja = $("<input>").attr("type","checkbox").val("3");
    var labelLesion = $("<label>").text("Lesión");
    var lesion = $("<input>").attr("type","checkbox").val("4");
    $(padre).append(labelAmarilla);
    $(padre).append(amarilla);
    $(padre).append($("<br>"));
    $(padre).append(labelRoja);
    $(padre).append(roja);
    $(padre).append($("<br>"));
    $(padre).append(labelLesion);
    $(padre).append(lesion);
}

function eventoFalta(event){
    $("#nombreJugador").attr("eventoId",event.data.id);
    $(".modalEventos").empty();
    traerJugadoresEquipoRival($("#nombreJugador").attr("modal-id-jugador"));

}

function traerJugadoresEquipoRival(id){
    var urlRivales = "/api/eventos/partido/rivales/"+id;
    $.ajax({
        url: urlRivales,
        data:{
            partido :partido["id"],
        }
        })
        .done(function( data ) {
            generarDatosJugadoresRivales(data);
            generarCheckEventos(".modalEventos");
            $("#confirmar").attr("disabled", false);
        }).fail(function(error){
            console.log(error);
        });
}

function generarDatosJugadoresRivales(rivales){
    var selectRivales = $("<select>").attr("id","listarivales").on("change",asignarParametrosARealizarFalta);
    rivales.forEach(rival => {
        var opcion = $("<option>").text(rival["nombre"]+" "+rival["apellido"]).attr({"idJugador":rival['id']});
        $(selectRivales).append(opcion);
    });
    $(".modalEventos").append($("<h4>").text("Jugadores Rivales"));
    $(".modalEventos").append(selectRivales);
    $(".modalEventos").append($("<br>"));
}

function asignarParametrosARealizarFalta(){
    $("#confirmar").off("click",realizarFalta);
    var elegido = $("option:contains("+this.value+")");
    var identificadorJugador = elegido.attr("idJugador");
    $("#confirmar").on("click",
        {
            id : identificadorJugador,
        },
        realizarFalta);
    $("#confirmar").attr("disabled", false);
}

function realizarFalta(event){
    var eventos = $("input:checked");
    var idJugador1 = $("#nombreJugador").attr("modal-id-jugador");
    var tipoDeEvento = $("#nombreJugador").attr("eventoId");
    var evento1;var evento2;var evento3;
    var token = $('meta[name="csrf-token"]').attr('content');
    if(eventos[0]!=undefined){
        evento1 = eventos[0]["value"];
    }
    if(eventos[1]!=undefined){
        evento1 = eventos[1]["value"];
    }
    if(eventos[2]!=undefined){
        evento3 = eventos[2]["value"];
    }
    var tiempo = $("#tempo").text().split(":")[1];
    if(parseInt(tiempo,10)>60){
        tiempo=parseInt(tiempo,10)-15;
    }
    $.ajax({
        type:"post",
        url: "/falta",
        data:{
            _token:  token,
            falta : tipoDeEvento,
            amarilla :evento1,
            roja :evento2,
            lesion : evento3,
            id1 : idJugador1,
            id2 : event.data.id,
            min : tiempo,
            partido : partido["id"],
            }
        })
        .done(function( data ) {
            console.log(evento1);
            if(evento1!=undefined){
                var expulsion = $("button."+idJugador1);
                console.log(expulsion);
                $(expulsion).remove();
            }
            $("#confirmar").off("click",realizarFalta);
            $("#exampleModal").modal("hide");
        }).fail(function(error){
            console.log(error);
        });
}





function partidoYaJugado(local,visitante,partido){
    var urlPartido = "/api/eventos/partidoyajugado/"+partido;
    $.ajax({
        url: urlPartido,
        })
        .done(function( data ) {
            console.log(data);
            mostrarTituloDelPartidoJugado(data,local,visitante)
        }).fail(function(error){
            console.log(error);
        });
};

function mostrarTituloDelPartidoJugado(eventos,local,visitante){
    var golLocal = 0;
    var golVisitante = 0;
    eventos.forEach(evento => {
        if(evento["equipo"]==local){
            golLocal++;
        }else if(evento["equipo"]==visitante){
            golVisitante++;
        }
    });
    obtenerNombreEquipoJugados(local,visitante,golLocal,golVisitante);

}
function obtenerNombreEquipoJugados(id,id2,glocal,gvisitante){
    var urlDestino = "/api/info/Equipo/"+id+"/"+id2;
     $.ajax({
             url:urlDestino,
     }
     ).done(function(res){
        generarTituloPartidoJugado(res[0],res[1],glocal,gvisitante,".tituloPartido")
     }).fail(function(error){
         console.log(error);
     });
 };
function generarTituloPartidoJugado(nlocal,nvisitante,glocal,gvisitante,padre){
    var titulo = $("<h1>");
        $(titulo).append($("<img>").attr("src","/img/iconosEquipos/"+nlocal[0]['id']+".png").addClass("titularDelPartido"));
        $(titulo).append($("<label>").text(nlocal[0]['nombre']).addClass("titularDelPartido local"));
        $(titulo).append($("<label>").text(glocal).addClass("titularDelPartido"));
        $(titulo).append($("<label>").text(" - ").addClass("titularDelPartido"));
        $(titulo).append($("<label>").text(gvisitante).addClass("titularDelPartido"));
        $(titulo).append($("<label>").text(nvisitante[0]['nombre']).addClass("titularDelPartido visitante"));
        $(titulo).append($("<img>").attr("src","/img/iconosEquipos/"+nvisitante[0]['id']+".png").addClass("titularDelPartido"));
        $(padre).append(titulo);
};

var contador = 0
var parte1= 0;
function sumarMinuto(){
    var horaActual2 = parseInt(momento.format("H"),10)
    var tiempoActual = moment().minutes();
    var minuto = tiempoActual;
    if(horaActual2-hora==1){
        minuto= minuto+60;
    }
    if (minuto>90){
        minuto=90;
    }
    $("#tempo").text("Minuto : "+minuto);
    if(minuto<"106"){
        if (minuto >= "45" && minuto<="59"){
            $(':button').prop('disabled', true);
            parte1++
        }else if(minuto >= "105" && contador == 0){
            $(':button').prop('disabled', true);
            clearInterval(tiempo)
            sumarPartidoAJugadores(idJugadoresJugandoElPartido);
            sumarPuntos()
            contador++;
        }
    }

};

function tiempoDelPartido() {
    $(':button').prop('disabled', false);
    tiempo = setInterval(sumarMinuto, 1000);
    };

var idJugadoresJugandoElPartido = [];

function sumarPartidoAJugadores(jugadores){
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"post",
        url: "/jugadoresdelpartido",
        data:{
            _token :  token,
            listajugadores : jugadores ,
            }
        })
        .done(function( data ) {
        }).fail(function(error){
            console.log(error);
        });
};

function sumarPuntos(){
    var token = $('meta[name="csrf-token"]').attr('content');
    var equipoLocal = $("[class='titularDelPartido local']").attr("id");
    var golesLocal = $("[class='titularDelPartido marcador local']").text();
    var equipoVisitante = $("[class='titularDelPartido visitante']").attr("id");
    var golesVisitante = $("[class='titularDelPartido marcador visitante']").text();
    console.log(equipoLocal,golesLocal,equipoVisitante,golesVisitante)
    $.ajax({
        type:"post",
        url: "/sumarPuntosAEquipo",
        data:{
            _token :  token,
            local : equipoLocal ,
            glocal : golesLocal,
            visitante : equipoVisitante,
            gvisitante : golesVisitante,
            }
        })
        .done(function( data ) {
            console.log("hecho");
        }).fail(function(error){
            console.log(error);
        });
};
