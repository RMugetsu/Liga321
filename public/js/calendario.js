function tabla(mes, partidos, equipos){
  $("#calendario").empty();

  var semana = 0;
  var dias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
  var ultimoDia = moment().endOf('month').add(mes, "month").format("DD");
  var array=[];

  for (var i=0;i < parseInt(ultimoDia);i++){
    var dia=moment().startOf('month').add(mes, "month").add(i,"days").format("dddd DD");
    array.push(dia.split(" ")[1]);
    if (dia.split(" ")[0]=="Sunday"){
      calendario[semana]=array;
      array=[];
      semana+=1;
    }else if(i==parseInt(ultimoDia)-1){
      calendario[semana]=array;
    }
  }
  var diaSemana = 7 - calendario[0].length;
  var diaSemanaTd = "<td></td>".repeat(diaSemana);
  var html="<table border='1' class='table calendario table-striped'><tr><th colspan='7'><h3><button id='anterior' class='btn btn-primary'><i class='fas fa-chevron-left'></i></button>&nbsp&nbsp"+moment().add(mes, "month").format("MMMM YYYY")+"&nbsp&nbsp<button id='siguiente' class='btn btn-primary'><i class='fas fa-chevron-right'></i></button></h3></th></tr><tr>"

  for (var dia of dias){
    html+="<th>"+dia+"</th>";
  }
  html+="</tr>"
  for (var semana in calendario){
    if (isNaN(semana)){
      console.log(semana);
      break;
    }
    html+="<tr>"
    if(semana==0){
    html+=diaSemanaTd;
    }
      for (var dia of calendario[semana]){
        if (semana==0){
        html+="<td>"+dia+"\n</td>";
        }
        else{
        html+="<td>"+dia+"</td>";
      }
    }
  //objeto moment del ultimo dia del mes
  var final = moment().endOf('month').add(mes, "month");

  //el siguiente codigo es para controlar que se completen las celdas al acabar el mes
  if (dia == ultimoDia){
    if (final.format('dddd')!='Sunday'){
      for (var i=0; i<(7-(final.weekday()));i++){
      html+="<td>"+""+"</td>";
      }
    }
    break;
  }
  html+="</tr>";
    
  }

  $("#calendario").html(html);
  insertarPartidos(mes, partidos, equipos);
}

function insertarPartidos(mes, partidos, equipos){

  var calendario = $(".calendario");
  for (var i=0; i<partidos.length;i++){
    var fecha_partido = partidos[i]['Fecha_Inicio'];
    mes_partido = fecha_partido.slice(5,-3);
    dia_partido = fecha_partido.slice(8)
    //console.log(dia_partido);
    if(mes_partido[0]=="0"){
      mes_partido=mes_partido[1];
    }
    if(dia_partido[0]=="0"){
      dia_partido=dia_partido[1];
    }
    if (mes_partido-1 == moment().add(mes, "month").month()){

     var equipo_local = equipos[(partidos[i]['Equipo_Local'])-1][0];
     var equipo_visitante = equipos[(partidos[i]['Equipo_Visitante'])-1][0];
     var partido = "\n\n"+equipo_local +" - "+ equipo_visitante ;

     var equipo_local2 = equipos[(partidos[i+1]['Equipo_Local'])-1][0];
     var equipo_visitante2 = equipos[(partidos[i+1]['Equipo_Visitante'])-1][0];
     var partido2 = "\n\n"+equipo_local2 +" - "+ equipo_visitante2 ;

      
      var lista_td = $("td");
      for (var dia=0;dia<lista_td.length;dia++){
        var dia_td = $("td")[dia].innerText;
        //  console.log(td);
      var celda = $("td").get(dia);
    
        if (dia_td == dia_partido){
console.log(celda);
          //partido.insertBefore(celda);
          celda.append(partido);
          celda.append(partido2);
        }
      }

    };
         // console.log(moment().add(mes, "month").format('MMMM'));
    
  }
}


/*//{id: 373, Arbitro: "Arbitro1", Equipo_Local: 8, Equipo_Visitante: 13, Fecha_Inicio: "2020-02-06", Hora_de_Inicio}
  for (var i=0; i<partidos.length;i++){
    console.log(partidos[i]);
  }*/