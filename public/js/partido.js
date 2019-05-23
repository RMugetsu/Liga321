function generarPlantilla(jugadores){
    var plantilla = $("<div>").addClass("col-md-5");
    for(var x = 0; x<11;x++){
        $(plantilla).append($("<button>").text(jugadores[x]['nombre']+" "+jugadores[x]['apellido'])
        .attr({"posicion":jugadores[x]["posicion"],
        "id":jugadores[x]["id"],"type":"button","data-toggle":"modal",
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
        $(padre).append($("<label>").text(nombre).addClass("titularDelPartido"));
        $(padre).append($("<label>").text(" 0 ").attr("id",id).addClass("titularDelPartido"));
        $(padre).append($("<label>").text(" - ").addClass("titularDelPartido"));
    }else if(num=="2"){
        $(padre).append($("<label>").text(" 0 ").attr("id",id).addClass("titularDelPartido"));
        $(padre).append($("<label>").text(nombre).addClass("titularDelPartido"));
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
    $("#nombreJugador").text(event.data.nombre).attr({"modal-posicion-jugador":event.data.posicion,"modal-id-jugador":event.data.id});
    $($(this).attr("data-target")).modal("show");
}

function generarBotonesDeEventosModal(eventos){
    var padre =$(".modalEventos");
    eventos.forEach(evento => {
        if(evento["evento"] == "Cambio De Jugador"){
            var botonDeEvento = $("<button>").text(evento["evento"]).addClass("btn").attr("evento",evento["id"]).on("click",cambiarDeJugador);
            $(padre).append(botonDeEvento);
        }else if(evento["evento"] == "Gol"){
            var botonDeEvento = $("<button>").text(evento["evento"]).addClass("btn").attr("evento",evento["id"]).on("click",golesRealizados);
            $(padre).append(botonDeEvento);
        }else if(evento["evento"] == "Faltas"){
            var botonDeEvento = $("<button>").text(evento["evento"]).addClass("btn").attr("evento",evento["id"]).on("click",faltasRealizadas);
            $(padre).append(botonDeEvento);
        }else if(evento["evento"] == "Otros"){
            var botonDeEvento = $("<button>").text(evento["evento"]).addClass("btn").attr("evento",evento["id"]).on("click",otrosEventos);
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

function cambiarDeJugador(){
    $(".modalEventos").empty();
    var idJugador1 = $("#nombreJugador").attr("modal-id-jugador");
    var posicionJugador1 = $("#nombreJugador").attr("modal-posicion-jugador");
    traerSuplentes(idJugador1,posicionJugador1);

}
function traerSuplentes(id,posc){
    var urlSuplente = "/eventos/partido/suplente";
    $.ajax({
        url: urlSuplente,
        data:{
            id : id,
            posicion : posc, 
            }
        })
        .done(function( data ) {
            generarSuplentes(data);
        }).fail(function(error){
            console.log(error);
        });
}
function generarSuplentes(suplentes){
    suplentes.forEach(suplente => {
        console.log(suplente);
    });
}
function golesRealizados(){

}
function faltasRealizadas(){

}
function otrosEventos(){

}