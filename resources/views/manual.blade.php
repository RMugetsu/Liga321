@include('layouts.app')

@section('content')
<div class="container manual">
    <div class="row">
        <div class="col-md-12">
            <h3>Manual de usuario</h3>
            <h5>
                Al acceder a la aplicación, tenemos una página de registro/login. Para registrarte, debes completar los campos y escoger un equipo y tipo de usuario. Si escoges "Entrenador" o "Árbitro", se notificará al administrador para comprobar que el rol es correcto y te asignará el rol. Hasta que tengas el rol asignado, podrás navegar por la aplicación como un usuario aficionado.
            </h5>
            <h5>
                Una vez logueado, accederás a la página principal, que dispone de un ranking de equipos el cual tiene un páginado debajo del ranking para poder ver los siguientes resultados.
            </h5>
            <h5>Desde esta página, puedes acceder a los equipos y jugadores que se muestran, dandole clic encima del nombre.</h5>
            <h5>
                En la pantalla, tenemos situada en la parte de arriba una barra de navegación con el logo de la aplicación, si le das clic al logo, te redirigirá a la página principal en cualquier momento. A la derecha, aparece el nombre del usuario logueado. Si le damos clic al nombre, se nos abrirá un menú que llevará a diferentes partes de la aplicación.
            </h5>
            <h5>
                En "calendario", se muestra un calendario con todos los enlaces a los partidos de cada mes.
            </h5>
            <h5>
                En la pantalla "usuario", podemos ver nuestros datos, modificar el e-mail de la cuenta, o modificar la contraseña.
            </h5>
            <h5>
                Si pulsas en logout, saldrás de la aplicación.
            </h5>
            <h5>Si eres entrenador, al pulsar en equipo te llevará a una página para organizar el partido. Dispone de un desplegable en el que escoges y visualizas la posición, y un botón para guardarla cuando la hayas decidido. A la derecha, te aparecerá una lista de tus jugadores con la posición que ocuparían en la imagen de la alineación. Puedes modificar la posición de cada jugador con el desplegable que aparece al lado del nombre del jugador. Si hay algún otro jugador con esa posición, se modifica también por la antigua posición del jugador que estabas cambiando. Los jugadores convocados al inicio del partido aparecerá el desplegable en blanco, los suplentes, tendrán el desplegable de color lila. Si recargas la página se recargarán los datos y se ordenará la lista de jugadores por posición.</h5>
            <h5>
                Si eres aficionado, en equipo te aparecerá la información del equipo que has elegido al registrar la cuenta.
            </h5>
            <h5>
                En la pantalla "usuario", podemos ver nuestros datos, modificar el e-mail de la cuenta, o modificar la contraseña.
            </h5>
            <h5>
                Si tienes asignado el rol de árbitro, cuando te metas en un partido que ya haya empezado, podrás añadir eventos del partido con el tiempo real, relacionandolos con cada equipo. Para hacerlo, tienes que seleccionar el jugador, añadir el tipo de evento y se guardará en la base de datos con toda la información.
            </h5>
            </div>



    </div>
</div>