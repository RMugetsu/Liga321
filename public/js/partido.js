function generarPlantilla(jugadores){
    var plantilla = $("<div>").addClass("col-md-5");
    for(var x = 0; x<11;x++){
        $(plantilla).append($("<button>").text(jugadores[x]['nombre']+" "+jugadores[x]['apellido'])
        .attr({"posicion":jugadores[x]["posicion"],
        "class":jugadores[x]["id"],"type":"button","data-toggle":"modal",
        "data-target":"#exampleModal"}).addClass("btn")
        .on("click",{nombre:jugadores[x]['nombre']+" "+jugadores[x]['apellido'],posicion:jugadores[x]["posicion"],id:jugadores[x]["id"]},
        abrirModal)
        );
        if(x%2==1){
            $(plantilla).append($("<br>"));
        }
    }
    $(".plantillas").append(plantilla);
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
    if(num=="1"){
        $(padre).append($("<label>").text(nombre).addClass("titularDelPartido local").attr("id",id));
        $(padre).append($("<label>").text(" 0 ").addClass("titularDelPartido").attr("id",id));
        $(padre).append($("<label>").text(" - ").addClass("titularDelPartido"));
    }else if(num=="2"){
        $(padre).append($("<label>").text(" 0 ").addClass("titularDelPartido").attr("id",id));
        $(padre).append($("<label>").text(nombre).addClass("titularDelPartido visitante").attr("id",id));
    }
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
        if(fecha[1]==fechaActual[1]){
            if(fecha[2]===fechaActual[0]){
                console.log("se juega el partido hoy");
                return true;
            }
            return false;
        }
        return false;
    }
};


function comprobarHorarioDelPartido(fecha,fechaActual,hora,horaActual){
    if (comprobarDiaDelPartido(fecha,fechaActual)){
        if(hora>horaActual){
            console.log("El partido aun no se ha jugado")
        }
    }
};

function tiempoDelPartido() {
    setInterval(sumarMinuto, 60000);
    };

function sumarMinuto(){
    var tiempoActual = $("#tiempoDelPartido").text();
    $("#tiempoDelPartido").text(parseInt(tiempoActual,10)+1);
    if (tiempoActual == "45"){
        clearInterval()
    }
};

function confirmarEvento(){

}
function abrirModal(event){
    $(".modalEventos").empty();
    obtenerEventosPartido();
    $("#nombreJugador").text(event.data.nombre).attr({"modal-posicion-jugador":event.data.posicion,"modal-id-jugador":event.data.id});
    console.log(this);
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
            var botonDeEvento = $("<button>").text(evento["evento"]).addClass("btn").on("click",{id:evento["id"]},faltasRealizadas);
            $(padre).append(botonDeEvento);
        }else if(evento["evento"] == "Otros"){
            var botonDeEvento = $("<button>").text(evento["evento"]).addClass("btn").on("click",{id:evento["id"]},otrosEventos);
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
    var posicionJugador1 = $("#nombreJugador").attr("modal-posicion-jugador");
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
        var opcion = $("<option>").text(suplente["nombre"]).attr({"idJugador":suplente['id'],"posicionJugador":suplente["posicion"]});
        $(selectSuplentes).append(opcion);
    });
    $(".modalEventos").append($("<h4>").text("Jugadores Suplentes"));
    $(".modalEventos").append(selectSuplentes);
}
function realizarCambio(event){
    var idJugador1 = $("#nombreJugador").attr("modal-id-jugador");
    var posicionJugador1 = $("#nombreJugador").attr("modal-posicion-jugador");
    var tipoDeEvento = $("#nombreJugador").attr("eventoId");
    var tiempo = $("#tiempoDelPartido").text();
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
        }).fail(function(error){
            console.log(error);
        });
    
}
function asignarParametrosARealizarCambios(){
    var elegido = $("option:contains("+this.value+")");
    console.log(elegido.attr("posicionJugador"));
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
function faltasRealizadas(){

}
function otrosEventos(){

}
function remplazarBotonDeJugador(data,id,posicion){
    var entraJugador = $("<button>").text(data['nombre']+" "+data['apellido'])
        .attr({"posicion":data["posicion"],
        "class":data["id"],"type":"button","data-toggle":"modal",
        "data-target":"#exampleModal"}).addClass("btn")
        .on("click",{nombre:data['nombre']+" "+data['apellido'],posicion:data["posicion"],id:data["id"]},
        abrirModal);
    var saleJugador = $("."+id+"[posicion='"+posicion+"']");
    console.log(saleJugador);
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
    console.log($(this).text(),$(this).attr("id"));
    $("#confirmar").on("click",{id:this.id},realizarGol)
}

function realizarGol(event){
    var idJugador1 = $("#nombreJugador").attr("modal-id-jugador");
    var tipoDeEvento = $("#nombreJugador").attr("eventoId");
    var tiempo = $("#tiempoDelPartido").text();
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"post",
        url: "/marcarGol",
        data:{
            _token:  token,
            idp: partido["id"],
            id1:idJugador1,
            equipo : event.data.id,
            num : tiempo,
            evento : tipoDeEvento,
        }
        })
        .done(function( data ) {
            cambiarMarcador();
        }).fail(function(error){
            console.log(error);
        });
    
}