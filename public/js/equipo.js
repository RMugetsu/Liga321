function generarListaJugadores(jugadores,padre){
    console.log(jugadores);
    var tablaJugadores = $("<table>").attr("class","table table-sm tablajugadores");
    var thead = $("<thead>").attr("class","thead-dark");
    $(tablaJugadores).append(thead);

    $(thead).append($("<th>").text("Dorsal"));
    $(thead).append($("<th>").text("Nombre"));
    $(thead).append($("<th>").text("Partidos_Jugados"));
    for(var i= 0; i<jugadores.length;i++){
        var fila = $("<tr>");
        $(fila).append($("<td>").text(jugadores[i]["Dorsal"]));
        $(fila).append($("<td>").text(jugadores[i]["Nombre"]));
        $(fila).append($("<td>").text(jugadores[i]["Partidos_Jugados"]));
        $(fila).addClass("fila");
        $(fila).on("click",{url: "/jugador/"+jugadores[i]["id"]},redirigir);

        $(tablaJugadores).append(fila);
    }
    $(padre).append(tablaJugadores);
}
function generarCabeceraEquipo(equipoInfo,padre){
    console.log(equipoInfo["Nombre"]);
    var logo = $("<div>").addClass("col md 2").append($("<img>").attr("src",""));
    var Nombre = $("<h2>").text(equipoInfo["Nombre"]);
    var Campo = $("<div>").addClass("col md 8").text(equipoInfo["Direccion_del_campo"]);
    //var Nombre = $("<div>").addClass("col md 8").text(equipoInfo["Nombre"]+","+equipoInfo["Direccion_del_campo"]);
    var Equipacion = $("<div>").addClass("col md 2");
    $(padre).append(logo);
    $(padre).append(Nombre);
    $(padre).append(Campo);
    $(padre).append(Equipacion);
}