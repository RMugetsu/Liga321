<?php

//funcion parametro fecha te diga jornada
//funcion jornada rango de fechas
//funcion parametro dos equipos, no se repitan por ida/vuelta
//funcion fecha libre
//funcion si ese equipo no ha jugado ya esa jornada

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {          
        $roles = ['Administrador', 'Aficionado', 'arbitro', 'entrenador', 'Jugador'];

        $eventos = ['Cambio De Jugador', 'Posesion', 'Gol', 'Tarjeta Amarilla', 'Tarjeta Roja','Lesion', 'Faltas'];

        $jugadores =  [
            //real madrid
            ['Sergio','Ramos', 4, 1, 33, 0, 1],
            ['Daniel','Carvajal',2,1,27,0,2],
            ['Marcelo','Vieira',12,1,30,0,3],
            ['Luka','Modric',10,1,33,0,4],
            ['Gareth','Bale',11,1,29,0,5],
            ['Thibaut','Courtois​',25,1,26,0,6], //portero 1
            ['Raphael','Varane',5,1,26,0,7],
            ['Jesus','Vallejo',3,1,22,0,8],
            ['Nacho','Fernandez',6,1,29,0,9],
            ['alvaro','Odriozola',19,1,23,0,10],
            ['Sergio','Reguilon',23,1,22,0,11],
            ['Vinicius','Junior',28,1,18,0,12],
            ['Karim','Benzema',9,1,31,0,13],
            ['Mariano','Diaz',7,1,25,0,14],
            ['Brahim','Diaz',21,1,19,0,15],
            ['Luca','Zidane',30,1,20,0,16], //portero 2
            ['Toni','Kroos',8,1,29,0,17],
            ['Jaime','Seoane',33,1,22,0,18],
            //barcelona
            ['Marc-Andre','ter Stegen',1,2,27,0,1], //portero1
            ['Gerard','Pique',3,2,32,0,2],
            ['Nelson','Semedo',2,2,25,0,3],
            ['Sergi','Roberto',20,2,27,0,4],
            ['Jordi','Alba',18,2,30,0,5],
            ['Jeison','Murillo',17,2,26,0,6],
            ['Clement','Lenglet',15,2,23,0,7],
            ['Samuel','Umtiti',23,2,25,0,8],
            ['Clement','Lenglet',24,2,33,0,9],
            ['Ivan','Rakitic',4,2,31,0,10],
            ['Sergio','Busquets',5,2,30,0,11],
            ['Lionel','Messi',10,2,31,0,12],
            ['Ousmane','Dembele',11,2,21,0,13],
            ['Luis','Suarez',9,2,32,0,14],
            ['Philippe','Coutinho',7,2,26,0,15],
            ['Arturo','Vidal',22,2,31,0,16],
            ['Arthur','Melo',8,2,22,0,17],
            ['Jasper','Cillessen',13,2,30,0,18], //portero2
            //atletico Madrid
            ['Antoine','Griezmann',7,3,28,0,1],
            ['Diego','Godin',2,3,33,0,2],
            ['Alvaro','Morata',22,3,26,0,3],
            ['Rodrigo','Hernandez',14,3,22,0,4],
            ['Diego','Costa',19,3,30,0,5],
            ['Jan','Oblak',13,3,26,0,6], //portero1
            ['Nikola','Kalinic',9,3,31,0,7],
            ['Saul','Ñiguez',8,3,24,0,8],
            ['Lucas','Hernandez',21,3,23,0,9],
            ['Koke','Resurreccion',6,3,27,0,10],
            ['Filipe','Luis',3,3,33,0,11],
            ['Thomas','Lemar',11,3,23,0,12],
            ['Angel','Correa',10,3,24,0,13],
            ['Jose Maria','Gimenez',24,3,24,0,14],
            ['Santiago','Arias',4,3,27,0,15],
            ['Thomas','Partey',5,3,25,0,16],
            ['Juanfran','Torres',20,3,34,0,17],
            ['Alex','Dos Santos',25,3,20,0,18], //portero2
            //valencia
            ['Norberto','Murara',13,4,29,0,1], //portero1
            ['Cristian','Rivero',28,4,21,0,2], //portero2
            ['Rodrigo','Moreno',19,4,28,0,3],
            ['Gonçalo','Guedes',7,4,22,0,4],
            ['Mouctar','Diakhaby',12,4,22,0,5],
            ['Denis','Cheryshev',11,4,28,0,6],
            ['Dani','Parejo',10,4,30,0,7],
            ['Kevin','Gameiro',9,4,31,0,8],
            ['Geoffrey','Kondogbia',6,4,26,0,9],
            ['Ezequiel','Garay',24,4,32,0,10],
            ['Jose Luis','Gaya',14,4,23,0,11],
            ['Santi','Mina',22,4,23,0,12],
            ['Daniel','Wass',18,4,29,0,13],
            ['Norberto','Murara',13,4,29,0,14],
            ['Ferran','Torres',20,4,19,0,15],
            ['Lee','Kang-in',16,4,18,0,16],
            ['Cristiano','Piccini',21,4,26,0,17],
            ['Carlos','Soler',22,4,22,0,18],
            //celta de vigo
            ['Ruben','Blanco',13,5,23,0,1], //portero1
            ['Ivan','Villar',26,5,21,0,2], //portero2
            ['Iago','Aspas',17,5,31,0,3],
            ['Maximiliano','Gomez',9,5,22,0,4],
            ['Emre','Mor',7,5,21,0,5],
            ['Nestor','Araujo',4,5,27,0,6],
            ['Pione','Sisto',11,5,24,0,7],
            ['Sofiane','Boufal',19,5,25,0,8],
            ['Stanislav','Lobotka',14,5,24,0,9],
            ['Okay','Yokuslu',5,5,25,0,10],
            ['Mathias','Jensen',18,5,23,0,11],
            ['Hugo','Mallo',2,5,27,0,12],
            ['Gustavo','Cabral',22,5,33,0,13],
            ['Nemanja','Radoja',6,5,26,0,14],
            ['Brais','Mendez',23,5,22,0,15],
            ['Ryad','Boudebouz',24,5,29,0,16],
            ['Lucas','Olaza',15,5,24,0,17],
            ['Wesley','Hoedt',12,5,25,0,18],
            //real betis
            ['Pau','Lopez',13,6,24,0,1], //portero1
            ['Joel','Robles',1,6,28,0,2], //portero2
            ['Joaquin','Sanchez',17,6,37,0,3],
            ['Diego','Lainez',22,6,18,0,4],
            ['Giovani','Lo Celso',21,6,23,0,5],
            ['Sergio','Canales',6,6,28,0,6],
            ['Jese','Rodriguez',10,6,26,0,7],
            ['Andres','Guardado',18,6,32,0,8],
            ['Marc','Bartra',5,6,28,0,9],
            ['Emerson','De Souza',24,6,20,0,10],
            ['Cristian','Tello',11,6,27,0,11],
            ['Aissa','Mandi',23,6,27,0,12],
            ['William','Carvalho',14,6,27,0,13],
            ['Sidnei','Da Silva',12,6,29,0,14],
            ['Lorenzo','Moron',16,6,25,0,15],
            ['Sergio','Leon',7,6,30,0,16],
            ['Junior','Firpo',20,6,22,0,17],
            ['Julio','Alonso',30,6,20,0,18], 
            //sevilla
            ['Tomas','Vaclik',1,7,30,0,1], //portero1
            ['Juan','Soriano',13,7,21,0,2], //portero2
            ['Pablo','Sarabia',17,7,27,0,3],
            ['Andre','Silva',12,7,23,0,4],
            ['Wissam','Ben Yedder',9,7,28,0,5],
            ['Quincy','Promes',21,7,27,0,6],
            ['Munir','El Haddadi',19,7,23,0,7],
            ['Ever','Banega',10,7,30,0,8],
            ['Jesus','Navas',16,7,33,0,9],
            ['Sergio','Escudero',18,7,29,0,10],
            ['Maxime','Gonalons',15,7,30,0,11],
            ['Franco','Vazquez',22,7,30,0,12],
            ['Simon','Kjaer',4,7,30,0,13],
            ['Roque','Mesa',7,7,29,0,14],
            ['Aleix','Vidal',11,7,29,0,15],
            ['Sergi','Gomez',3,7,27,0,16],
            ['Ibrahim','Amadou',5,7,26,0,17],
            ['Daniel','Carriço',6,7,30,0,18], 
            //athletic
            ['Alex','Remiro',1,8,24,0,1], //portero1
            ['Unai','Simon',25,8,21,0,2], //portero2
            ['Iñaki','Williams',9,8,24,0,3],
            ['Aritz','Aduriz',20,8,38,0,4],
            ['Markel','Susaeta',14,8,31,0,5],
            ['Mikel','Rico',17,8,34,0,6],
            ['Iker','Muniain',10,8,26,0,7],
            ['Raul','Garcia',22,8,32,0,8],
            ['Kenan','Kodro',2,8,25,0,9],
            ['Ibai','Gomez',19,8,29,0,10],
            ['Iñigo','Martinez',4,8,28,0,11],
            ['Beñat','Etxebarria',7,8,32,0,12],
            ['Ander','Iturraspe',8,8,30,0,13],
            ['Dani','Garcia',16,8,28,0,14],
            ['Yuri','Berchiche',12,8,29,0,15],
            ['Oscar','de Marcos',18,8,27,0,16],
            ['','Amadou',5,8,26,0,17],
            ['Daniel','Carriço',6,8,30,0,18],
            //getafe
            //villareal
            //rcd espanyol
            //real vallalodid
            //girona fc
            //rayo vallecano
            //real sociedad
            //levante
            //huesca
            //deportivo alaves
            //cd leganes
            //sd eibar

            //20 equipos en total
        ];
            

            function equipos(){
                $equipos =config('data.equipos');
                $ids = [];
                for ($i=0; $i <sizeof($equipos) ; $i++) { 
                    array_push($ids, $equipos[$i][3]);
                }
                return $ids;
            }

           $equipos = config('data.equipos');

            for ($i=0;$i<sizeof($equipos);$i++){
                $nombre=$equipos[$i][0];
                $direccion=$equipos[$i][1];
                $entrenador=$equipos[$i][2];
                                
                DB::table('equipos')->insert([
                    'nombre' => $nombre ,
                    'direcciondelcampo' => $direccion ,
                    'entrenador' => $entrenador ,
                    'alineacion' => 1,
                    'victoria' => 0,
                    'empate' => 0,
                    'derrota' => 0,
                    'puntos' => 0,
                ]);
            }

            for ($i=0;$i<sizeof($jugadores);$i++){
                $nombre=$jugadores[$i][0];
                $apellido=$jugadores[$i][1];
                $dorsal=$jugadores[$i][2];
                $idequipo=$jugadores[$i][3];
                $edad=$jugadores[$i][4];
                $partidosJugados=$jugadores[$i][5];
                $posicion=$jugadores[$i][6];
                                
                                
                DB::table('jugadores')->insert([
                    'nombre' => $nombre ,
                    'apellido' => $apellido ,
                    'dorsal' => $dorsal ,
                    'equipo' => $idequipo ,
                    'edad' => $edad ,
                    'partidosjugados' => $partidosJugados ,
                    'posicion' => $posicion ,
                ]);

            }
            
            for ($i=0;$i<sizeof($roles);$i++){
                DB::table('tiposDeUsuarios')->insert([
                    'rol' => $roles[$i]
                ]);
            }

            for ($i=0;$i<sizeof($eventos);$i++){
                DB::table('tiposDeEventos')->insert([
                    'evento' => $eventos[$i]
                ]);
            }

            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Admin'),
                'notificaciontipo' => 1,
                'tipo' => 1 ,
            ]);
            
            DB::table('users')->insert([
                    'name' => 'arbitro1',
                    'email' => 'arbitro1@gmail.com',
                    'password' => Hash::make('arbitro123'),
                    'notificaciontipo' => 3,
                    'tipo' => 3 ,
                ]);
                

            $lista_equipos = array();
            for ($i=0; $i<sizeof($equipos);$i++){
                array_push($lista_equipos,$equipos[$i][3]);
            }

            function generar_fechas(){
                $inicio_liga = "2019-05-22";
                $weekDay = date('w', strtotime($inicio_liga)); //numero de la semana
                $fechas = [[$inicio_liga, 19],[$inicio_liga, 21]];

                for($i=0; $i<189;$i++){
                    $dia = end($fechas)[0];
                    //var_dump((date('w', strtotime($dia))));
                    if ((date('w', strtotime($dia)))==0){
                        $nueva_fecha = date('Y-m-d', strtotime($dia. ' + 3 days'));
                        //var_dump($nueva_fecha);
                        array_push($fechas, [$nueva_fecha,19]);
                        array_push($fechas, [$nueva_fecha,21]);
                    }
                    else {
                        $nueva_fecha = date('Y-m-d', strtotime($dia. ' + 1 days'));
                        array_push($fechas, [$nueva_fecha,19]);
                        array_push($fechas, [$nueva_fecha,21]);
                    }
                }
                return $fechas;
            }

            function temporada(){
                $fechas = generar_fechas();
                $temporada = [];
                $jornada = [];
                for($i=0;$i<sizeof($fechas);$i++){
                    array_push($jornada, $fechas[$i]);
                    if(sizeof($jornada)==10){
                        array_push($temporada, $jornada);
                        // var_dump($jornada);
                        $jornada=[];
                    }
                }
                return $temporada;    
            }

            $equipos = equipos();
            $numJornadas =  sizeof($equipos)-1;
            $jornadas = [];
            $partido = [];
            for($x =0; $x<sizeof($equipos)/2*$numJornadas;$x++){
                array_push($partido,[($x%$numJornadas)+1]);
                if(sizeof($partido)== sizeof($equipos)/2){
                    array_push($jornadas,$partido);
                    $partido= [];
                }
            }
            // var_dump($jornadas);
            
            for ($i = 0; $i < sizeof($jornadas);$i++){
                
                if($i%2==0){
                    array_push($jornadas[$i][0],sizeof($equipos));
                }else{
                    $equipoTemporal = $jornadas[$i][0][0];
                    $jornadas[$i][0][0] = sizeof($equipos);
                    array_push($jornadas[$i][1],$equipoTemporal);
                }   
            }


            $equiposAux = $numJornadas;
            for($z = 0; $z<$numJornadas;$z++){
                for($y=0;$y<sizeof($equipos)/2;$y++){
                    if( sizeof($jornadas[$z][$y])==1){
                        array_push($jornadas[$z][$y],$equiposAux);                        
                        $equiposAux--;
                        if($equiposAux==0){
                            $equiposAux = $numJornadas;                            
                        }
                    }
                }
            }
            $temporada = temporada();
            for($x= 0;$x<19;$x++){
                for ($i=0; $i <10 ; $i++) { 
                    // var_dump("partido");
                    // var_dump("local->".$jornadas[$x][$i][0]."---visitante->".$jornadas[$x][$i][1]."-----dia->".$temporada[$x][$i][0]."----hora->".$temporada[$x][$i][1]);
                    DB::table('partidos')->insert([
                        'arbitro' => 'arbitro1',
                        'equipolocal' => $jornadas[$x][$i][0],
                        'equipovisitante' => $jornadas[$x][$i][1],
                        'fechainicio' => $temporada[$x][$i][0],
                        'horadeinicio' => $temporada[$x][$i][1],
                    ]);
                }
            }
            $num = 18;
            
            for($x= 19;$x<38;$x++){
                $numPartido =9;
                for ($i=0; $i <10 ; $i++) { 
                    var_dump("partido");
                    var_dump("local->".$jornadas[$num][$numPartido][0]."---visitante->".$jornadas[$num][$numPartido][1]."-----dia->".$temporada[$x][$i][0]."----hora->".$temporada[$x][$i][1]);
                    DB::table('partidos')->insert([
                        'arbitro' => 'arbitro1',
                        'equipolocal' => $jornadas[$num][$numPartido][0],
                        'equipovisitante' => $jornadas[$num][$numPartido][1],
                        'fechainicio' => $temporada[$x][$i][0],
                        'horadeinicio' => $temporada[$x][$i][1],
                    ]);
                    $numPartido--;
                }
                $num--;
            }




        // for ($i=0; $i <sizeof($jornadas) ; $i++) {
        //     var_dump("ronda".$i);
        //     for ($z=0; $z <sizeof($jornadas[$i]) ; $z++) {
        //         var_dump($jornadas[$i][$z]);
        //     }
        // }

        // for ($i=0; $i <sizeof($jornadas); $i++) {
        //     var_dump($jornada[$i]);
        // }


                        
        //    function comprobarJornada($temporada,$jornada,$equipo){
        //         for ($i=0; $i <sizeof($temporada[$jornada]) ; $i++) {
        //             if (sizeof($temporada[$jornada][$i])>=3 && $temporada[$jornada][$i][2] != "vacio") {
        //                 if ($temporada[$jornada][$i][2]==$equipo || $temporada[$jornada][$i][3]==$equipo){
        //                     return false;
        //                 }
        //             }  
        //         }
        //         return true;
        //     }

        //     function comprobarequipos($temporada,$equipo1,$equipo2){
        //         if ($equipo1==$equipo2){
        //             return false;
        //         }

        //         //var_dump("eq1:".$equipo1,"eq2:". $equipo2);
        //         for ($i=0; $i<sizeof($temporada);$i++){
        //             for ($j=0; $j<10;$j++){
        //                 if (sizeof($temporada[$i][$j])>3 && $temporada[$i][$j][2] != "vacio"){
        //                     //var_dump("equipo que ya jugó(local): ".$temporada[$i][$j][2]);
        //                     if(($temporada[$i][$j][2]==$equipo1 && $temporada[$i][$j][3]==$equipo2) || ($temporada[$i][$j][2]==$equipo2 && $temporada[$i][$j][3]==$equipo1)){
        //                         return false;
        //                     }
        //                 }  
        //             } 
        //         }
        //         //var_dump($equipo1);
        //         return true;
        //     }

        //     function isPartidoVacio($partido){
        //         // var_dump("sizeof de partido".sizeof($partido));
        //         // if(sizeof($partido)>2){
        //         //     var_dump("partido pos 2 ".$partido[2]);
        //         // }
        //         return sizeof($partido) == 2 || ($partido[2] =="vacio" && $partido[3] =="vacio");
        //     }

        //     function limpiarPartidosTemporada($jornada){
        //         for($partido = 0;$partido<sizeof($jornada);$partido++){
        //             $jornada[$partido][3] = "vacio";
        //             $jornada[$partido][2] = "vacio";
        //         };

        //         return $jornada;
               
        //     }

        //     function isequipoActualInequiposTestados($equipo2Testeados,$equipoActual){
        //         for($equipo = 0;$equipo<sizeof($equipo2Testeados);$equipo++){
        //             // var_dump("equipoTestado----->".$equipo2Testeados[$equipo]."---equipoActual--->".$equipoActual);
        //             if ($equipo2Testeados[$equipo]==$equipoActual) {
        //                 // var_dump("equipo actual en equipos testados =========================");
        //                 return true;
        //             }
        //         }
        //         return false;
        //     }

        //     function generarPartidos(){
        //         $equipos = equipos();
        //         $temporada = temporada();
        //         $numJornadas = 1;//sizeof($temporada)/2;
        //         $numPartidos = 10; 
        //         $numequipos = sizeof($equipos);
        //         $isAsignacionCorrecta = true;
        //         $equipo2Testeados = [];

        //         for ($jornada=0; $jornada <$numJornadas ; $jornada++) {
        //             var_dump("==========================jornada ".$jornada."================");
        //             for ($partido=0; $partido <$numPartidos ; $partido++) {
        //                 var_dump("for con partido  ".$partido);
        //                 if(isPartidoVacio($temporada[$jornada][$partido])){
        //                     for($y=0;$y<$numequipos;$y++){
        //                         //var_dump("for con equipos ".$equipos[$y]);
        //                         //var_dump($equipos[$y]);
        //                         if (comprobarJornada($temporada,$jornada, $equipos[$y])){
        //                             var_dump("equipo1: ".$equipos[$y]);
        //                             $equipo1 = $equipos[$y];
                                    
        //                             for($x=0;$x<$numequipos;$x++){
        //                                 $equipo2 = "undefined";
        //                                 if (comprobarJornada($temporada,$jornada,$equipos[$x])){
                                            
        //                                     if(sizeof($equipo2Testeados)==0 || !isequipoActualInequiposTestados($equipo2Testeados,$equipos[$x]) ) {
        //                                         if(comprobarequipos($temporada,$equipo1,$equipos[$x])){
        //                                             $equipo2 = $equipos[$x];
        //                                             var_dump("equipo2: ".$equipos[$x]);
        //                                             $temporada[$jornada][$partido][2] = $equipo1;
        //                                             $temporada[$jornada][$partido][3] = $equipo2;
        //                                             if($numPartidos-1 == $partido){
        //                                                 $equipo2Testeados = [];
        //                                             }
        //                                             break;
        //                                         }
        //                                     }
        //                                    // var_dump ("aqui menos");
        //                                 }
        //                                 else {
        //                                     //var_dump("aqui no entra");
        //                                 }
        //                             }
        //                             if($equipo2 == "undefined"){
        //                                 array_push($equipo2Testeados,$temporada[$jornada][0][3]);
        //                             }
        //                             if($equipo2 == "undefined" && sizeof($equipo2Testeados)>0){
        //                                 $temporada[$jornada] = limpiarPartidosTemporada($temporada[$jornada]);
        //                                 $jornada = $jornada-1;
        //                                 $partido = -1;
        //                                 $x = 0;
        //                                 $y =0;
        //                             }
        //                             break;
        //                         }
        //                         //else 
        //                        // { var_dump ("aqui tampoco entra en el if");}
        //                     }
        //                 }
        //                 else {
        //                    // var_dump("aqui no entra en este if");
        //                 }
        //             }
        //         }
                
        //         return $temporada;
        //     }

            // $temporada = generarPartidos();
            // for ($i=0; $i<18;$i++){
            //     for ($j=0; $j<sizeof($temporada[$i]);$j++){
            //         /*var_dump("posicion: ".$i);
            //         var_dump("Elemento: ".$j);
            //         var_dump ($temporada[$i][$j]);*/
            //     }
                
            // }

           
            
      }
}

