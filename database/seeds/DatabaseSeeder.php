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

        $eventos = ['Cambio De Jugador', 'Gol', 'Tarjeta Amarilla', 'Tarjeta Roja','Lesion', 'Faltas','Otros'];

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
            ['Alvaro','Odriozola',19,1,23,0,10],
            ['Sergio','Reguilon',23,1,22,0,11],
            ['Vinicius','Junior',28,1,18,0,12],
            ['Karim','Benzema',9,1,31,0,13],
            ['Mariano','Diaz',7,1,25,0,14],
            ['Brahim','Diaz',21,1,19,0,15],
            ['Luca','Zidane',30,1,20,0,16], //portero 2
            ['Toni','Kroos',8,1,29,0,17],
            ['Jaime','Seoane',33,1,22,0,18],
            //barcelona
            ['Marc-Andre','Ter Stegen',1,2,27,0,1], //portero1
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
            ['Oscar','de Marcos',18,8,30,0,16],
            ['Yeray','Alvarez',5,8,24,0,17],
            ['Iago','Herrerin',13,8,31,0,18],
            //getafe
            ['David','Soria',13,9,26,0,1], //portero1
            ['Ruben','Yañez',25,9,25,0,2], //portero2
            ['Djene','Dakoman',2,9,27,0,3],
            ['Jaime','Mata',7,9,30,0,4],
            ['Gaku','Shibasaki',10,9,26,0,5],
            ['Jorge','Molina',19,9,37,0,6],
            ['Angel','Rodriguez',9,9,32,0,7],
            ['Francisco','Portillo',8,9,28,0,8],
            ['Mathieu','Flamini',16,9,35,0,9],
            ['Vitorino','Antunes',3,9,32,0,10],
            ['Leandro','Cabrera',6,9,27,0,11],
            ['Nemanja','Maksimovic',20,9,24,0,12],
            ['Damian','Suarez',22,9,31,0,13],
            ['Mauro','Arambarri',18,9,23,0,14],
            ['Samu','Saiz',11,9,28,0,15],
            ['Bruno','Gonzalez',4,9,28,0,16],
            ['Mathias','Olivera',17,9,21,0,17],
            ['Markel','Bergara',5,9,33,0,18],
            //villareal
            ['Sergio','Asenjo',1,10,29,0,1], //portero1
            ['Mariano','Barbosa',25,10,34,0,2], //portero2
            ['Santi','Cazorla',19,10,34,0,3],
            ['Samuel','Chukwueze',30,10,19,0,4],
            ['Carlos','Bacca',9,10,32,0,5],
            ['Karl','Toko',17,10,26,0,6],
            ['Ramiro','Funes',4,10,28,0,7],
            ['Pablo','Fornals',8,10,23,0,8],
            ['Alfonso','Pedraza',16,10,23,0,9],
            ['Gerard','Moreno',7,10,27,0,10],
            ['Manu','Trigueros',14,10,27,0,10],
            ['Vicente','Iborra',10,10,31,0,12],
            ['Santiago','Caseres',5,10,22,0,13],
            ['Victor','Ruiz',6,10,30,0,14],
            ['Alvaro','Gonzalez',3,10,29,0,15],
            ['Bruno','Soriano',21,10,34,0,16],
            ['Mario','Gaspar',2,10,28,0,17],
            ['Daniele','Bonera',23,10,37,0,18],
            //rcd espanyol
            ['Diego','Lopez',13,11,37,0,1], //portero1
            ['Roberto','Jimenez',1,11,33,0,2], //portero2
            ['Wu','Lei',24,11,27,0,3],
            ['Borja','Iglesias',7,11,26,0,4],
            ['Mario','Hermoso',22,9,23,0,5],
            ['Roberto','Rosales',8,11,30,0,6],
            ['Sergio','Garcia',9,11,35,0,7],
            ['Adria','Pedrosa',28,11,21,0,8],
            ['Edinaldo','Gomes',5,11,30,0,9],
            ['Esteban','Granero',23,11,31,0,11],
            ['David','Lopez',15,11,29,0,11],
            ['Javier','Lopez',16,11,33,0,12],
            ['Victor','Sanchez',4,11,31,0,13],
            ['Sergi','Darder',10,11,25,0,14],
            ['Oscar','Melendo',14,11,21,0,15],
            ['Pablo','Piatti',19,11,30,0,16],
            ['Marc','Roca',21,11,22,0,17],
            ['Hernan','Arsenio',17,11,30,0,18],
            //real vallalodid
            ['Jordi','Masip',1,12,30,0,1], //portero1
            ['Samuel','Perez',26,12,22,0,2], //portero2
            ['Borja','Fernandez',8,12,38,0,3],
            ['Enes','Unal',9,12,22,0,4],
            ['Sergio','Guardiola',12,9,27,0,5],
            ['Daniele','Verde',11,12,22,0,6],
            ['Keko','Gontan',24,12,27,0,7],
            ['Fernando','Calero',5,12,23,0,8],
            ['Anuar','Mohamed',23,12,24,0,9],
            ['Yoel','Rodriguez',13,12,30,0,12],
            ['Stiven','Plaza',42,12,20,0,11],
            ['Oscar','Plano',10,12,28,0,12],
            ['Toni','Villa',19,12,24,0,13],
            ['Ruben','Alcaraz',14,12,28,0,14],
            ['Javier','Moyano',17,12,33,0,15],
            ['Duje','Cop',20,12,29,0,16],
            ['Luismi','Sanchez',6,12,27,0,17],
            ['Francisco','Olivas',4,12,30,0,18],
             //girona fc
            ['Yassine','Bounou',13,13,28,0,1], //portero1
            ['Jose','Aurelio',30,13,23,0,2], //portero2
            ['Cristhian','Stuani',7,13,32,0,3],
            ['Cristian','Portugues',9,13,27,0,4],
            ['Alex','Granell',6,9,30,0,5],
            ['Anthony','Lozano',19,13,26,0,6],
            ['Patrick','Roberts',17,13,22,0,7],
            ['Borja','Garcia',10,13,28,0,8],
            ['Seydou','Doumbia',22,13,31,0,9],
            ['Johan','Mojica',3,13,26,0,13],
            ['Douglas','Luiz',12,13,21,0,11],
            ['Bernardo','Espinosa',2,13,29,0,12],
            ['Pedro','Porro',24,13,19,0,13],
            ['Juanpe','Ramirez',15,13,28,0,14],
            ['Aleix','Garcia',23,13,21,0,15],
            ['Marc','Muniesa',20,13,27,0,16],
            ['Jonas','Ramalho',4,13,25,0,17],
            ['Pere','Pons',8,13,26,0,18],
            //rayo vallecano
            ['Alberto','Garcia',1,14,34,0,1], //portero1
            ['Miguel','Morro',30,14,18,0,2], //portero2
            ['Luis','Advincula',17,14,29,0,3],
            ['Raul','De Tomas',9,14,24,0,4],
            ['Alexandre','Moreno',7,9,25,0,5],
            ['Tiago','Dias',14,14,28,0,6],
            ['Gael','Kakuta',10,14,27,0,7],
            ['Adrian','Embarba',11,14,27,0,8],
            ['Mario','Suarez',15,14,32,0,9],
            ['Alvaro','Garcia',18,14,26,0,14],
            ['Jose','Pozo',22,14,23,0,11],
            ['Oscar','Trejo',8,14,31,0,12],
            ['Alvaro','Medran',4,14,25,0,13],
            ['Abdoulaye','Ba',21,14,28,0,14],
            ['Franco','Di Santo',11,14,28,0,15],
            ['Roberto','Roman',2,14,33,0,16],
            ['Alejandro','Galvez',23,14,29,0,17],
            ['Jordi','Amat',16,14,27,0,18],
            //real sociedad
            ['Geronimo','Rulli',1,15,27,0,1], //portero1
            ['Andoni','Zubiaurre',30,15,22,0,2], //portero2
            ['Mikel','Oyarzabal',10,15,22,0,3],
            ['Adnan','Januzaj',11,15,24,0,4],
            ['Juanmi','Jimenez',7,9,26,0,5],
            ['Ander','Barrenetxea',34,15,17,0,6],
            ['Willian','Jose',12,15,27,0,7],
            ['Theo','Hernandez',19,15,21,0,8],
            ['Asier','Illarramendi',4,15,29,0,9],
            ['Sandro','Ramirez',24,15,23,0,15],
            ['Hector','Moreno',6,15,31,0,11],
            ['Diego','Llorente',3,15,25,0,12],
            ['Miguel Angel','Moya',13,15,35,0,13],
            ['David','Zurutuza',17,15,32,0,14],
            ['Igor','Zubeldia',5,15,22,0,15],
            ['Mikel','Merino',8,15,22,0,16],
            ['Joseba','Zaldua',2,15,26,0,17],
            ['Luca','Sangalli',23,15,24,0,18],
            //levante
            ['','Soria',13,16,26,0,1], //portero1
            ['','Yañez',25,16,25,0,2], //portero2
            ['','Dakoman',2,16,27,0,3],
            ['','Mata',7,16,30,0,4],
            ['','Shibasaki',16,9,26,0,5],
            ['','Molina',19,16,37,0,6],
            ['','Rodriguez',9,16,32,0,7],
            ['','Portillo',8,16,28,0,8],
            ['','Flamini',16,16,35,0,9],
            ['','Antunes',3,16,32,0,16],
            ['','Cabrera',6,16,27,0,11],
            ['','Maksimovic',20,16,24,0,12],
            ['','Suarez',22,16,31,0,13],
            ['','Arambarri',18,16,23,0,14],
            ['','Saiz',11,16,28,0,15],
            ['','Gonzalez',4,16,28,0,16],
            ['','Olivera',17,16,21,0,17],
            ['','Bergara',5,16,33,0,18],
            //huesca
            ['','Soria',13,17,26,0,1], //portero1
            ['','Yañez',25,17,25,0,2], //portero2
            ['','Dakoman',2,17,27,0,3],
            ['','Mata',7,17,30,0,4],
            ['','Shibasaki',17,9,26,0,5],
            ['','Molina',19,17,37,0,6],
            ['','Rodriguez',9,17,32,0,7],
            ['','Portillo',8,17,28,0,8],
            ['','Flamini',16,17,35,0,9],
            ['','Antunes',3,17,32,0,17],
            ['','Cabrera',6,17,27,0,11],
            ['','Maksimovic',20,17,24,0,12],
            ['','Suarez',22,17,31,0,13],
            ['','Arambarri',18,17,23,0,14],
            ['','Saiz',11,17,28,0,15],
            ['','Gonzalez',4,17,28,0,16],
            ['','Olivera',17,17,21,0,17],
            ['','Bergara',5,17,33,0,18],
            //deportivo alaves
            ['','Soria',13,18,26,0,1], //portero1
            ['','Yañez',25,18,25,0,2], //portero2
            ['','Dakoman',2,18,27,0,3],
            ['','Mata',7,18,30,0,4],
            ['','Shibasaki',18,9,26,0,5],
            ['','Molina',19,18,37,0,6],
            ['','Rodriguez',9,18,32,0,7],
            ['','Portillo',8,18,28,0,8],
            ['','Flamini',16,18,35,0,9],
            ['','Antunes',3,18,32,0,18],
            ['','Cabrera',6,18,27,0,11],
            ['','Maksimovic',20,18,24,0,12],
            ['','Suarez',22,18,31,0,13],
            ['','Arambarri',18,18,23,0,14],
            ['','Saiz',11,18,28,0,15],
            ['','Gonzalez',4,18,28,0,16],
            ['','Olivera',17,18,21,0,17],
            ['','Bergara',5,18,33,0,18],
            //cd leganes
            ['','Soria',13,19,26,0,1], //portero1
            ['','Yañez',25,19,25,0,2], //portero2
            ['','Dakoman',2,19,27,0,3],
            ['','Mata',7,19,30,0,4],
            ['','Shibasaki',19,9,26,0,5],
            ['','Molina',19,19,37,0,6],
            ['','Rodriguez',9,19,32,0,7],
            ['','Portillo',8,19,28,0,8],
            ['','Flamini',16,19,35,0,9],
            ['','Antunes',3,19,32,0,19],
            ['','Cabrera',6,19,27,0,11],
            ['','Maksimovic',20,19,24,0,12],
            ['','Suarez',22,19,31,0,13],
            ['','Arambarri',18,19,23,0,14],
            ['','Saiz',11,19,28,0,15],
            ['','Gonzalez',4,19,28,0,16],
            ['','Olivera',17,19,21,0,17],
            ['','Bergara',5,19,33,0,18],
            //sd eibar
            ['','Soria',13,20,26,0,1], //portero1
            ['','Yañez',25,20,25,0,2], //portero2
            ['','Dakoman',2,20,27,0,3],
            ['','Mata',7,20,30,0,4],
            ['','Shibasaki',20,9,26,0,5],
            ['','Molina',19,20,37,0,6],
            ['','Rodriguez',9,20,32,0,7],
            ['','Portillo',8,20,28,0,8],
            ['','Flamini',16,20,35,0,9],
            ['','Antunes',3,20,32,0,20],
            ['','Cabrera',6,20,27,0,11],
            ['','Maksimovic',20,20,24,0,12],
            ['','Suarez',22,20,31,0,13],
            ['','Arambarri',18,20,23,0,14],
            ['','Saiz',11,20,28,0,15],
            ['','Gonzalez',4,20,28,0,16],
            ['','Olivera',17,20,21,0,17],
            ['','Bergara',5,20,33,0,18],
           

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
                DB::table('tiposdeusuarios')->insert([
                    'rol' => $roles[$i]
                ]);
            }

            for ($i=0;$i<sizeof($eventos);$i++){
                DB::table('tiposdeeventos')->insert([
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

            DB::table('partidos')->insert([
                'arbitro' => 'arbitro1',
                'equipolocal' => 1,
                'equipovisitante' => 2,
                'fechainicio' => "2019/05/23",
                'horadeinicio' => 19,
            ]);

            DB::table('eventos')->insert([
                'partido' => 1,
                'equipo' => 1,
                'tipo' => 1,
                'jugador1'=> 1,
                'minuto'=> 10,
            ]);

            DB::table('eventos')->insert([
                'partido' => 1,
                'equipo' => 2,
                'tipo' => 1,
                'jugador1'=> 30,
                'minuto'=>20,
            ]);

            DB::table('eventos')->insert([
                'partido' => 1,
                'equipo' => 2,
                'tipo' => 1,
                'jugador1'=> 30,
                'minuto'=>40,
            ]);

            DB::table('eventos')->insert([
                'partido' => 1,
                'equipo' => 2,
                'tipo' => 1,
                'jugador1'=> 30,
                'minuto'=>30,
            ]);

            DB::table('eventos')->insert([
                'partido' => 1,
                'equipo' => 2,
                'tipo' => 1,
                'jugador1'=> 30,
                'minuto'=>70,
            ]);

            /*Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('tipo')->unsigned();
            $table->integer('minuto');
            $table->integer('jugador1')->nullable()->unsigned();
            $table->integer('jugador2')->nullable()->unsigned();
            $table->integer('equipo')->nullable()->unsigned();
            $table->integer('sancion')->nullable()->unsigned();
            $table->integer('partido')->unsigned();
            $table->foreign('tipo')->references('id')->on('tiposdeeventos');
            $table->foreign('jugador1')->references('id')->on('jugadores');
            $table->foreign('jugador2')->references('id')->on('jugadores');
            $table->foreign('equipo')->references('id')->on('equipos');
            $table->foreign('sancion')->references('id')->on('eventos');
            $table->foreign('partido')->references('id')->on('partidos');
            $table->timestamps();
        });*/

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
                    // var_dump("partido");
                    // var_dump("local->".$jornadas[$num][$numPartido][0]."---visitante->".$jornadas[$num][$numPartido][1]."-----dia->".$temporada[$x][$i][0]."----hora->".$temporada[$x][$i][1]);
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
    }
}
