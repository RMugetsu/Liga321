function generarListaJugadores(jugadores,padre){
    console.log(jugadores);
    var tablaJugadores = $("<table>");
    $(tablaJugadores).append($("<th>").text("Dorsal"));
    $(tablaJugadores).append($("<th>").text("Nombre"));
    $(tablaJugadores).append($("<th>").text("Partidos_Jugados"));
    for(var i= 0; i<jugadores.length;i++){
        var fila = $("<tr>");
        $(fila).append($("<td>").text(jugadores[i]["Dorsal"]));
        $(fila).append($("<td>").text(jugadores[i]["Nombre"]));
        $(fila).append($("<td>").text(jugadores[i]["Partidos_Jugados"]));
        $(tablaJugadores).append(fila);
    }
    $(padre).append(tablaJugadores);
}
function generarCabeceraEquipo(equipoInfo,padre){
    console.log(equipoInfo["Nombre"]);
    var logo = $("<div>").addClass("col md 2").append($("<img>").attr("src",""));
    var Nombre = $("<div>").addClass("col md 8").text(equipoInfo["Nombre"]+","+equipoInfo["Direccion_del_campo"]);
    var Equipacion = $("<div>").addClass("col md 2");
    $(padre).append(logo);
    $(padre).append(Nombre);
    $(padre).append(Equipacion);
}