@include('home')

 <!-- Los partidos se realizaran de Miercoles a Domingo, dos partidos al dia (A las 19h y a las 21h). -->

<?php
//print_r($data[0]['Nombre']);

$equipos = array();

for ($i=0; $i<sizeof($data);$i++){
	array_push($equipos,$data[$i]['Nombre']);
}

$partidos = array();

foreach($equipos as $k){
	foreach($equipos as $j){
		if($k == $j){
			continue;
		}
		$z = array($k,$j);
		sort($z);
		if(!in_array($z,$partidos)){
			$partidos[] = $z;
		}
	}
}

//print_r($equipos);
//print_r($partidos);
?>

<script>

//Para generar las jornadas de la liga cogemos el proximo miercoles, jueves, viernes, 
//sabado y domingo para iniciarla esos dias y despues creamos las siguientes jornadas
//añadiendo 7 dias a estos. (38 jornadas en total).

miercoles = moment().day(3+7);
jueves = moment().day(4+7);
viernes = moment().day(5+7);
sabado = moment().day(6+7);
domingo = moment().day(7+7);


//generar jornadas de nuevo pero con dias dobles y horas puestas ya x mi una 19h otra 21h...y asi tener los mismos elementos un array que otro
jornadas = [
	[miercoles, 19], [miercoles, 21],
	[jueves, 19], [jueves, 21],
	[viernes, 19], [viernes, 21],
	[sabado, 19], [sabado, 21],
	[domingo, 19], [domingo, 21],
];
for (var i=0; i<37;i++){
	//siguiente_jornada = [jornadas[jornadas.length-1][0].add(7,'days'), jornadas[jornadas.length-1][1].add(7,'days'), jornadas[jornadas.length-1][2].add(7,'days'), jornadas[jornadas.length-1][3].add(7,'days'), jornadas[jornadas.length-1][4].add(7,'days')];
	var dia = jornadas[jornadas.length-1];
	//if (dia)
	//jornadas.push();
}

console.log(dia[0]);

var partidos = @json($partidos);
/*for (var i=0; i<jornadas.length();i+2){
	for (var j=0;j<partidos.length();j++){
		partidos[j].push(jornadas[i][i]);
	}
}
*/
</script>