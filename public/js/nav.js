function menuDeUsuario(tipo,padre,equipo,id){
    console.log(tipo,padre,equipo,id);
    if(tipo=="1"){
        link = generarLinks("administracion");
        $(padre).append(link);
    }else if(tipo=="2" || tipo=="4"){
        link = generarLinks("equipo",equipo);
        $(padre).append(link);
    }
    link = generarLinks("calendario");
    $(padre).append(link);
    link = generarLinks("usuario",id);
    $(padre).append(link);
    link = generarLinks("logout");
    $(padre).append(link);
    console.log($("#navbarDropdown"));
}
function generarLinks(ruta,id){
    if (id==undefined){
        var a = $("<a>").addClass("dropdown-item").attr("href","/"+ruta).text(ruta);
    }else{
        var a = $("<a>").addClass("dropdown-item").attr("href","/"+ruta+"/"+id).text(ruta);
    }
    return a;
    
}

function ajaxEquipos(){
    $.ajax({
            url:"/api/equipo",
            },
    ).done(function(res){
        agregarOpcionesDeEquipo(res);
    });
};

function agregarOpcionesDeEquipo(equipos){
    for(var i = 0; i<equipos.length;i++){
        $("#equipo").append($("<option>").attr("value",equipos[i]['id']).text(equipos[i]['Nombre']));
    }
}