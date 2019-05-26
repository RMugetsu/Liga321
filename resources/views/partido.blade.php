@include('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 tituloPartido">
            <h1 id=tituloPartido></h1>
        </div>
            <div class="tempo">
                <h2 id="tempo"></h2>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eventos del Partido / </h5>
                        <h5 class="modal-title" id="nombreJugador"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Eventos: </h3>
                        <div class="modalEventos"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="confirmar" disabled>Confirmar Evento</button>
                    </div>
                    </div>
                </div>
            </div>
        <div class="col-md-12 plantillas"></div>
    </div>
</div>
<script>

    var partido = {!! json_encode($partido->toArray(), JSON_HEX_TAG) !!}[0] ;
    var fecha = partido['fechainicio'].split("-");
    var hora = partido['horadeinicio'];
    var momento = new moment();
    var fechaActual = momento.format("L").split("/");
    var horaActual = parseInt(momento.format("H"),10);
    var nose = moment("2019-05-22").isSame(fechaActual);
    console.log(fecha,fechaActual,hora,horaActual)
    comprobarHorarioDelPartido(fecha,fechaActual,hora,horaActual);
</script>

