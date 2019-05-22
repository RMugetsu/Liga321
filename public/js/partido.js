function generarPlantilla(jugadores){
    console.log(plantilla);
    var plantilla = $("<div>").addClass("col-md-6");
    for(var x = 0; x<12;x++){
        $(plantilla).append($("<button>").text(jugadores[x]['nombre']).attr({"posicion":jugadores[x][posicion],"id":jugadores[x]["id"],}));
    }
    console.log(plantilla);
    $(".plantillas").append(plantilla);
}
function traerDatosJugadores(id){
    $.ajax({
    url: "/api/partido/informacionjugadores/"+id,
    })
    .done(function( data ) {
        generarPlantilla(data)
    }).fail(function(error){
        console.log(error);
    });
};

function mostrarEquipoEnElTitulo(nombre,padre,id,num){
    console.log(nombre,padre,id,num);
     var equipo =$("<label>").text(nombre);
     console.log(equipo);
     $(padre).append(equipo);
     if(num=="1"){
         $(padre).append($("label").text("0").attr("id",id));
         $(padre).append($("label").text(" - "));
     }else if(num=="2"){
         $(padre).append($("label").text("0").attr("id",id));
     }
 }

function obtenerNombreEquipo(id,padre,num){
     $.ajax({
             url:"/api/info/Equipo/"+id,
             },
     ).done(function(res){
         mostrarEquipoEnElTitulo(res[0]['nombre'],padre,id,num);
     }).fail(function(error){
         console.log(error);
     });
 };

 function obtenerNombreEquipo(id,padre,num){
    $.ajax({
            url:"/api/eventosParido/",
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
            console.log(fecha[1],fechaActual[1]);
            console.log("1");
            return false;
        }
        console.log(fecha[0],fechaActual[0]);
        console.log("2");
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