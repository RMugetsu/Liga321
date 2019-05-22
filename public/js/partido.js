function generarPlantilla(jugadores){
    var plantilla = $("<div>").addClass("col-md-6");
    for(var x = 0; x<12;x++){
        $(plantilla).append($("<button>").text(jugadores[x]['nombre']+jugadores[x]['apellido']).attr({"posicion":jugadores[x]["posicion"],"id":jugadores[x]["id"],}));
    }
    console.log(plantilla);
    $(".plantillas").append(plantilla);
}
function traerDatosJugadores(id,id2){
    var urlDestino2 = "/api/partido/informacionjugadores/"+id+"/"+id2;
    $.ajax({
    url: urlDestino2,
    })
    .done(function( data ) {
        console.log(data);
        generarPlantilla(data[0]);
        generarPlantilla(data[1]);
    }).fail(function(error){
        console.log(error);
    });
};

function mostrarEquipoEnElTitulo(nombre,padre,id,num){
    console.log(nombre,padre,id,num);
    if(num=="1"){
        $(padre).append($("<label>").text(nombre));
        $(padre).append($("<label>").text(" 0 ").attr("id",id));
        $(padre).append($("<label>").text(" - "));
    }else if(num=="2"){
        $(padre).append($("<label>").text(" 0 ").attr("id",id));
        $(padre).append($("<label>").text(nombre));
    }
}

function obtenerNombreEquipo(id,id2,padre){
    var urlDestino = "/api/info/Equipo/"+id+"/"+id2;
     $.ajax({
             url:urlDestino,
     }
     ).done(function(res){
        console.log(res);
        mostrarEquipoEnElTitulo(res[0][0]['nombre'],padre,id,1);
        mostrarEquipoEnElTitulo(res[1][0]['nombre'],padre,id,2);
     }).fail(function(error){
         console.log(error);
     });
 };

 function obtenerEventosPartido(){
    $.ajax({
            url:"/api/eventosPartido/",
            },
    ).done(function(res){
        mostrarEventos(res);
    }).fail(function(error){
        console.log(error);
    });
};

function comprobarDiaDelPartido(fecha,fechaActual){
    if(parseInt(fecha[0],10)===parseInt(fechaActual[0],10)){
        if(fecha[1]==fechaActual[1]){
            if("21"==fechaActual[1]){
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