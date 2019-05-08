<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
/*          Administrador,
			Aficionado,
			Arbitro,
			Entrenador,
			Jugador*/
        $roles = ['Administrador', 'Aficionado', 'Arbitro', 'Entrenador', 'Jugador'];

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
            ['Pau','Lopez',13,6,24,0,18],
            //sevilla
            //athletic
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
            //malaga cf
            //granada cf
            //elche cf
            //ud almeria
        ];
            
            $equipos = [
            ['Real Madrid CF','Av. de Concha Espina, 1, 28036 Madrid-Estadio Santiago Bernabeu','Zinedine Zidane',1],
            ['FC Barcelona','C. Aristides Maillol, 12, 08028 Barcelona-Camp Nou','Ernesto Valverde',2],
            ['Atletico Madrid','Av. de Luis Aragones, 4, 28022 Madrid-Wanda Metropolitano','Diego Simeone',3],
            ['Valencia CF','Av. de Suecia, s/n, 46010 Valencia -Estadio de Mestalla','Marcelino Garcia Toral',4],
            ['Celta de Vigo','Av. de Balaidos, 13, 36210 Vigo, Pontevedra-Estadio de Balaidos','Fran Escriba',5],
            ['Real Betis','Av de Heliopolis, s/n, 41012 Sevilla-Estadio Benito Villamarin','Quique Setien',6],
            ['Sevilla FC','Calle Sevilla Futbol Club, s/n, 41005 Sevilla-Estadio Ramon Sanchez-Pizjuan','Joaquin Caparros',7],
            ['Athletic Club','Rafael Moreno Pitxitxi, s/n, 48013 Bilbo, Bizkaia-San Mames','Gaizka Garitano',8],
            ['Getafe CF','Av. Teresa de Calcuta, 12, 28903 Getafe, Madrid-Coliseum Alfonso Perez','Jose Bordalas',9],
            ['Villarreal CF','Carrer Blasco Ibañez, 2, 12540 Vila-real, Castello-Estadio de la Ceramica','Javier Calleja Revilla',10],
            ['RCD Espanyol','Av. del Baix Llobregat, 100, 08940 Cornella de Llobregat, Barcelona-RCDE Stadium','Rubi',11],
            ['Real Vallalodid CF', 'Av. Mundial 82, s/n, 47014 Valladolid-Estadio Jose Zorrilla','Sergio Gonzalez Soriano',12],
            ['Girona FC','Avinguda Montilivi, 141, 17003 Girona-Municipal de Montilivi','Eusebio Sacristan',13],
            ['Rayo Vallecano','Calle del Payaso Fofo, 0, 28018 Madrid-Estadio de Vallecas','Paco Jemez',14],
            ['Real Sociedad','1, Anoeta Pasalekua, 20014 Donostia, Gipuzkoa-Estadio de Anoeta','Imanol Alguacil',15],
            ['Levante UD','Carrer de Sant Vicent de Paül, 44, 46019 Valencia-Estadio Ciudad de Valencia','Paco Lopez',16],
            ['SD Huesca','Camino de Cocoron, s/n, 22004 Huesca-Estadio El Alcoraz','Francisco Rodriguez Vilchez',17],
            ['Deportivo Alaves','Cervantes Ibilbidea, s/n, 01007 Vitoria-Gasteiz, Araba-Estadio de Mendizorroza','Abelardo Fernandez',18],
            ['CD Leganes','Calle Arquitectura, s/n, 28918 Leganes, Madrid-Estadio Municipal Butarque','Mauricio Pellegrino',19],
            ['SD Eibar','Ipurua Kalea, 2, 20600 Eibar, Gipuzkoa-Estadio Municipal de Ipurua','Jose Luis Mendilibar',20],
            ['Malaga CF','Paseo Martiricos, s/n, 29011 Malaga-Estadio La Rosaleda','Juan Ramon Lopez Muñiz',21],
            ['Granada CF','Calle Pintor Manuel Maldonado, s/n, 18007 Granada-Estadio Nuevo Los Carmenes','Diego Martinez Penas',22],
            ['Elche CF','03208 Elche, Alicante-Estadio Manuel Martinez Valero','Jose Rojo Martin',23],
            ['UD Almeria','Calle Alcalde Santiago Martinez Cabrejas, 5, 04007 Almeria-Estadio de los Juegos Mediterraneos','Fco. Javier Fernandez',24],
            ];


            for ($i=0;$i<sizeof($equipos);$i++){
                $nombre=$equipos[$i][0];
                $direccion=$equipos[$i][1];
                $entrenador=$equipos[$i][2];
                $alineacion=$equipos[$i][3];
                                
                DB::table('equipos')->insert([
                    'Nombre' => $nombre ,
                    'Direccion_del_campo' => $direccion ,
                    'Entrenador' => $entrenador ,
                    'Alineacion' => $alineacion ,
                    'Victoria' => 0,
                    'Empate' => 0,
                    'Derrota' => 0,
                    'Puntos' => 0,
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
                    'Nombre' => $nombre ,
                    'Apellido' => $apellido ,
                    'Dorsal' => $dorsal ,
                    'Equipo' => $idequipo ,
                    'Edad' => $edad ,
                    'Partidos_Jugados' => $partidosJugados ,
                    'Posicion' => $posicion ,
                ]);

            }
            
            for ($i=0;$i<sizeof($roles);$i++){
                DB::table('tiposDeUsuarios')->insert([
                    'Rol' => $roles[$i]
                ]);
            }

            for ($i=0;$i<sizeof($eventos);$i++){
                DB::table('tiposDeEventos')->insert([
                    'Evento' => $eventos[$i]
                ]);
            }

            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'Admin',
                'Tipo' => 1 ,
            ]);
      }
}
