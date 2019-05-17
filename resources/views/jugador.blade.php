@include('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="Cabecera"></div>
        </div>
            <div class="Listado">
        </div>
    </div>
</div>
<script>
    var jugador = {!! json_encode($jugador->toArray(), JSON_HEX_TAG) !!} ;
    
</script>