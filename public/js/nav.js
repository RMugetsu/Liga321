function menuDeUsuario(tipo,padre){
    if(tipo==1){
        link = generarLinks("administracion");
        $(padre).append(link);
    }else if(tipo==2){

    }else if(tipo==3){

    }else if(tipo==4){

    }else if(tipo==5){

    }
    link = generarLinks("calendario");
    $(padre).append(link);
    link = generarLinks("perfil");
    $(padre).append(link);
}
function generarLinks(ruta){
    var a = $("<a>").addClass("dropdown-item").attr("href","{{ route("+ruta+") }}").text("{{ __("+ruta+") }}");
    return a;
}