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
        html+="<td>"+dia+"<br></td>";
        }
        else{
        html+="<td>"+dia+"<br></td>";
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
  for (var i=0; i<partidos.length;i+=2){
    var fecha_partido = partidos[i]['fechainicio'];
    mes_partido = fecha_partido.slice(5,-3);
    dia_partido = fecha_partido.slice(8)
    if(mes_partido[0]=="0"){
      mes_partido=mes_partido[1];
    }
    if(dia_partido[0]=="0"){
      dia_partido=dia_partido[1];
    }
    if (mes_partido-1 == moment().add(mes, "month").month()){

     var equipo_local = equipos[(partidos[i]['equipolocal'])-1][0];
     var equipo_visitante = equipos[(partidos[i]['equipovisitante'])-1][0];
    var partido = document.createElement('a');
    partido.innerHTML = equipo_local +" - "+equipo_visitante;
    partido.href = "/partido/"+partidos[i]['id'] ;

     var equipo_local2 = equipos[(partidos[i+1]['equipolocal'])-1][0];
     var equipo_visitante2 = equipos[(partidos[i+1]['equipovisitante'])-1][0];
    var partido2 = document.createElement('a');
    partido2.innerHTML = equipo_local2 +" - "+equipo_visitante2;
    partido2.href = "/partido/"+partidos[i+1]['id'] ;

      
      var lista_td = $("td");
      for (var dia=0;dia<lista_td.length;dia++){
        var dia_td = $("td")[dia].innerText;
        if(dia_td[0]=="0"){
          dia_td=dia_td[1];
        }
        else {
          dia_td=dia_td[0]+dia_td[1];
        }
          var celda = $("td").get(dia);
    
          if (dia_td == dia_partido){
            var br = document.createElement('br');
            celda.appendChild(partido);
            celda.appendChild(br);
            celda.appendChild(partido2);

          }
      }

    };
    
  }
}