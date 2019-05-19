@include('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            hola partido
        </div>
        <div class="col-md-12">
        </div>
    </div>
</div>
<script>
    var partidos = {!! json_encode($partidos->toArray(), JSON_HEX_TAG) !!} ;
    
</script>