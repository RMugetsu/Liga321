function tabla(mes){
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
var html="<table border='1' class='table calendario table-striped'><tr><th colspan='7'><h3><button id='anterior' class='btn btn-primary'><span class='glyphicon glyphicon-menu-left'></span></button>&nbsp&nbsp"+moment().add(mes, "month").format("MMMM YYYY")+"&nbsp&nbsp<button id='siguiente' class='btn btn-primary'><span class='glyphicon glyphicon-menu-right'></button></h3></th></tr><tr>"

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
      html+="<td>"+dia+"</td>";
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
}