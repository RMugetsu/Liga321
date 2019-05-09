function menuDeUsuario(tipo,padre,equipo,id){
    if(tipo==1){
        link = generarLinks("administracion");
        $(padre).append(link);
    }else if(tipo==2 && tipo==4){
        link = generarLinks("equipo",equipo);
        $(padre).append(link);
    }//else if(tipo==3){
    //     link = generarLinks("administracion");
    //     $(padre).append(link);
    // }
    link = generarLinks("calendario");
    $(padre).append(link);
    link = generarLinks("perfil",);
    $(padre).append(link);
}
function generarLinks(ruta,id){
    if (id=="undef"){
        var a = $("<a>").addClass("dropdown-item").attr("href",ruta).text(ruta);
    }else{
        var a = $("<a>").addClass("dropdown-item").attr("href",ruta+"/"+id).text(ruta);
    }
    return a;
    
}

function ajaxEquipos(){
    $.ajax({
            url:"/api/equipo",
            },
    ).done(function(res){
        console.log(res);
    });
}