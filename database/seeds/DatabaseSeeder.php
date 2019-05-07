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
            ['Sergio','Ramos', 4, 1, 33, 0, 1],
            ['Daniel','Carvajal',2,1,27,0,2],
            ['Marcelo','Vieira',12,1,30,0,3],
            ['Luka','Modric',10,1,33,0,4],
            ['Gareth','Bale',11,1,29,0,5],
            ['Thibaut','Courtois​',25,1,26,0,6],
            ['Raphael','Varane',5,1,26,0,7],
            ['Jesús','Vallejo',3,1,22,0,8],
            ['Nacho','Fernández',6,1,29,0,9],
            ['Álvaro','Odriozola',19,1,23,0,10],
            ['Sergio','Reguilón',23,1,22,0,11],
            ['Marc-André','ter Stegen',1,2,27,0,1],
            ['Gerard','Piqué',3,2,32,0,2],
            ['Nélson','Semedo',2,2,25,0,3],
            ['Sergi','Roberto',20,2,27,0,4],
            ['Jordi','Alba',18,2,30,0,5],
            ['Jeison','Murillo',17,2,26,0,6],
            ['Clément','Lenglet',15,2,23,0,7],
            ['Samuel','Umtiti',23,2,25,0,8],
            ['Clément','Lenglet',24,2,33,0,9],
            ['Ivan','Rakitic',4,2,31,0,10],
            ['Sergio','Busquets',5,2,30,0,11],
        ];
            
            $equipos = [
            ['Real Madrid CF','Av. de Concha Espina, 1, 28036 Madrid-Estadio Santiago Bernabéu','Zinedine Zidane',1],
            ['FC Barcelona','C. Arístides Maillol, 12, 08028 Barcelona-Camp Nou','Ernesto Valverde',2],
            ['Atlético Madrid','Av. de Luis Aragonés, 4, 28022 Madrid-Wanda Metropolitano','Diego Simeone',3],
            ['Valencia CF','Av. de Suècia, s/n, 46010 València -Estadio de Mestalla','Marcelino García Toral',4],
            ['Celta de Vigo','Av. de Balaídos, 13, 36210 Vigo, Pontevedra-Estadio de Balaídos','Fran Escribá',5],
            ['Real Betis','Av de Heliópolis, s/n, 41012 Sevilla-Estadio Benito Villamarín','Quique Setién',6],
            ['Sevilla FC','Calle Sevilla Fútbol Club, s/n, 41005 Sevilla-Estadio Ramón Sánchez-Pizjuán','Joaquín Caparrós',7],
            ['Athletic Club','Rafael Moreno Pitxitxi, s/n, 48013 Bilbo, Bizkaia-San Mamés','Gaizka Garitano',8],
            ['Getafe CF','Av. Teresa de Calcuta, 12, 28903 Getafe, Madrid-Coliseum Alfonso Pérez','José Bordalás',9],
            ['Villarreal CF','Carrer Blasco Ibáñez, 2, 12540 Vila-real, Castelló-Estadio de la Cerámica','Javier Calleja Revilla',10],
            ['RCD Espanyol','Av. del Baix Llobregat, 100, 08940 Cornellà de Llobregat, Barcelona-RCDE Stadium','Rubi',11],
            ['Real Vallalodid CF', 'Av. Mundial 82, s/n, 47014 Valladolid-Estadio José Zorrilla','Sergio González Soriano',12],
            ['Girona FC','Avinguda Montilivi, 141, 17003 Girona-Municipal de Montilivi','Eusebio Sacristán',13],
            ['Rayo Vallecano','Calle del Payaso Fofó, 0, 28018 Madrid-Estadio de Vallecas','Paco Jémez',14],
            ['Real Sociedad','1, Anoeta Pasalekua, 20014 Donostia, Gipuzkoa-Estadio de Anoeta','Imanol Alguacil',15],
            ['Levante UD','Carrer de Sant Vicent de Paül, 44, 46019 València-Estadio Ciudad de Valencia','Paco López',16],
            ['SD Huesca','Camino de Cocorón, s/n, 22004 Huesca-Estadio El Alcoraz','Francisco Rodríguez Vílchez',17],
            ['Deportivo Alavés','Cervantes Ibilbidea, s/n, 01007 Vitoria-Gasteiz, Araba-Estadio de Mendizorroza','Abelardo Fernández',18],
            ['CD Leganés','Calle Arquitectura, s/n, 28918 Leganés, Madrid-Estadio Municipal Butarque','Mauricio Pellegrino',19],
            ['SD Eibar','Ipurua Kalea, 2, 20600 Eibar, Gipuzkoa-Estadio Municipal de Ipurua','José Luis Mendilibar',20],
            ['Málaga CF','Paseo Martiricos, s/n, 29011 Málaga-Estadio La Rosaleda','Juan Ramón López Muñiz',21],
            ['Granada CF','Calle Pintor Manuel Maldonado, s/n, 18007 Granada-Estadio Nuevo Los Cármenes','Diego Martínez Penas',22],
            ['Elche CF','03208 Elche, Alicante-Estadio Manuel Martínez Valero','José Rojo Martín',23],
            ['UD Almería','Calle Alcalde Santiago Martínez Cabrejas, 5, 04007 Almería-Estadio de los Juegos Mediterráneos','Francisco Javier Fernández Díaz',24]
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
                    'Apellido' => $direccion ,
                    'Dorsal' => $entrenador ,
                    'Equipo' => $alineacion ,
                    'Edad' => $edad ,
                    'Partidos_Jugados' => $partidosJugados ,
                    'Posicion' => $posicion ,
                    'Lesion' => false ,
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
