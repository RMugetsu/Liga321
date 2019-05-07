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
            ['Thibaut','Courtois​',25,1,26,0,6],
            ['Raphael','Varane',5,1,26,0,7],
            ['Jesus','Vallejo',3,1,22,0,8],
            ['Nacho','Fernandez',6,1,29,0,9],
            ['alvaro','Odriozola',19,1,23,0,10],
            ['Sergio','Reguilon',23,1,22,0,11],
            ['Vinicius','Junior',28,1,18,0,12],
            ['Karim','Benzema',9,1,31,0,13],
            ['Mariano','Diaz',7,1,25,0,14],
            ['Brahim','Diaz',21,1,19,0,15],
            ['Luca','Zidane',30,1,20,0,16],
            ['Toni','Kroos',8,1,29,0,17],
            //barcelona
            ['Marc-Andre','ter Stegen',1,2,27,0,1],
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
            //atletico Madrid
            ['Antoine','Griezmann',7,3,28,0,1],
            ['Diego','Godin',2,3,33,0,2],
            ['Alvaro','Morata',22,3,26,0,3],
            ['Rodrigo','Hernandez',14,3,22,0,4],
            ['Diego','Costa',19,,0,5],
            ['Jan','Oblak',13,3,0,6],
            [,0,7],
            [,0,8],
            [,0,9],
            [,0,10],
            [,0,11],
            [,0,12],
            [,0,13],
            [,0,14],
            [,0,15],
            [,0,16],
            [,0,17],
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
