@include('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="tabla"></div>
        </div>
    </div>
</div>

<script>
    var usuarios = {!! json_encode($usuarios->toArray(), JSON_HEX_TAG) !!} ;
    console.log(usuarios);
    generarListadoDeUsuarios(usuarios);
</script>