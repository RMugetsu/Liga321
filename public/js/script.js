function generarTablas(padre,data,ruta,iconos){

    var cabecera = obtenerCabecera(data);
    var controlDeCabecera = 0;
    var tabla = $("<table>").attr("class","table ranking table-fixed");
    var thead = $("<thead>").attr("class","thead-dark");

    $(tabla).append(thead);

    for (x in data){
        var fila = $("<tr>").attr("class","fila");
        for(y in data[x]){
            // Generar cabecera de la tabla de datos
            if(controlDeCabecera==0){
                for(z in cabecera){
                    if (cabecera[z] != "id"){
                        $(thead).append($("<th>").text(cabecera[z]));
                    }
                }

                controlDeCabecera++;
            }
            // Fin de la cabecera

            // Cuerpo
            if (controlDeCabecera==1){
                var tbody = $("<tbody>");
                $(tabla).append(tbody);
                controlDeCabecera++;
            }
            if (y=="id" && ruta!=undefined){
                $(fila).on("click",{url: ruta+data[x][y]},redirigir);
            }
            
           if( y!="id" ) {
                $(fila).append($("<td>").text(data[x][y]))
                if (y=="Tipo"){
                    var tipo = data[x][y];
                }
           }
            // Fin Cuerpo

        }
        /*if (iconos=="Si"){
            $(thead).append($("<th>").text(" "));
            generarIconos(fila,data[x]["Ruta"],tipo,data[x]["Nombre"]);    
        }*/
        $(tabla).append(fila);
       
    }
    $(padre).append(tabla)
}

function obtenerCabecera(data){
    
    var cabecera =[];

    for (x in data[0]){
        cabecera.push(x)
    }
    return cabecera;
}


function redirigir(event){
    window.location = event.data.url;
}


//mes actual en espanyol: month = moment().locale("es").format('MMMM');
