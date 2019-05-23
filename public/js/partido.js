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
        mostrarEquipoEnElTitulo(res[1][0]['nombre'],padre,id,2);
     }).fail(function(error){
         console.log(error);
     });
 };

 function obtenerEventosPartido(){
    $.ajax({
            url:"/api/eventos/partido",
            },
    ).done(function(res){
        console.log(res);
        generarBotonesDeEventos(res);
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
function generarBotonesDeEventos(eventos){
    var padre =$(".modal-body")
    eventos.forEach(evento => {
        var botonDeEvento = $("<button>").text(evento["evento"]).addClass("btn");
        $(padre).append(botonDeEvento);
    });
}

function abrirModal(event){
    console.log("Pase por aqui");
    $("#nombreJugador").text(event.data.nombre);
    $(".modal-body").append($("<label>").text(event.data.posicion).attr("modal-posicion-jugador",1).hide());
    $(".modal-body").append($("<label>").text(event.data.id).attr("modal-id-jugador",1).hide());
    $($(this).attr("data-target")).modal("show");
}
//TESTEO
var ATTRIBUTES = ['myvalue', 'myvar', 'bb'];
function accionBotonJugador(){
    $('[data-toggle="modal"]').on('click', function (e) {
        // convert target (e.g. the button) to jquery object
        var $target = $(e.target);
        console.log($target)
        // modal targeted by the button
        var modalSelector = $target.data('target');
        console.log($modalSelector)
        // iterate over each possible data-* attribute
        ATTRIBUTES.forEach(function (attributeName) {
          // retrieve the dom element corresponding to current attribute
          var $modalAttribute = $(modalSelector + ' #modal-' + attributeName);
          var dataValue = $target.data(attributeName);
          
          // if the attribute value is empty, $target.data() will return undefined.
          // In JS boolean expressions return operands and are not coerced into
          // booleans. That way is dataValue is undefined, the left part of the following
          // Boolean expression evaluate to false and the empty string will be returned
          $modalAttribute.text(dataValue || '');
        });
      });
}