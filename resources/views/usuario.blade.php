@include('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <h5>Nombre: <?php echo (auth()->user()->name);?> 
                </h5><br>
            </div>

            <div class="col-md-12">
                <h5>E-mail: <?php echo (auth()->user()->email);?></h5><br>
            </div>

            <div class="col-md-12">
                <h5 class="h5equipo"> <?php echo("<a href='/equipo/".$equipo[0]['id']."'>")?>Tu equipo: <?php echo($equipo[0]["Nombre"])?></a></h5>
                <br>
            </div>
        </div>
        <div align="center" class="col-md-6">
            <div class="col-md-12">
                <a href="#modalMail" data-toggle="modal" class="btn btn-success">Modificar e-mail</a>
            </div>
            <br>
            <div class="col-md-12">
                <a href="#modalPsw" data-toggle="modal" class="btn btn-success">Modificar contraseña</a>
            </div>
            <br>
            <div class="col-md-12">
            <?php echo("<a class='btn btn-success' href='/equipo/".$equipo[0]['id']."'>")?>Ir a tu equipo <?php echo($equipo[0]["Nombre"])?></a>
            </div>
        </div>

    </div>
</div>

@section('modal')
    <div id="modalMail" class="modal" data-easein="bounceIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Modificar Email
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        
                    </div>
                    <div class="modal-body">
                        <div class="modal-form">
                            @csrf
                            <label for="email">Nuevo e-mail: <input type="text" size="40" name="email" class="input"></label>
                            <input type="text" name="ruta" hidden=true <?php echo ("value='/usuario/modificarEmail/".auth()->user()->id."'")?>>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            Cerrar
                        </button>
                        <button class="btn btn-primary" id="btn-email">
                            Guardar cambio
                        </button>
                    </div>
            </div>
        </div>
    </div>



    <div id="modalPsw" class="modal" data-easein="bounceIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Modificar Contraseña
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        
                    </div>
                    <div class="modal-body">
                        <div class="ErrorContainer"></div>
                        <div class="modal-form">
                            @csrf
                            <label for="password">Nueva contraseña: <input type="password" size="20" name="password" class="input"></label>
                            <label for="password2">Repita contraseña: <input type="password" size="20" name="password2" class="input"></label>
                            <input type="text" name="rutaPsw" hidden=true <?php echo ("value='/usuario/modificar/".auth()->user()->id."'")?>>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            Cerrar
                        </button>
                        <button class="btn btn-primary" id="btn-psw" disabled>
                            Guardar cambio
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalSatisfactorio" class="modal" data-easein="bounceIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Cambios guardados
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        
                    </div>
                    <div class="modal-body">
                        <div class="ErrorContainer"></div>
                        <div>
                            Cambios guardados correctamente.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <script>
        
        var new_email = "";
        $("input[name='email']").on("keyup", function() {
            if ($("input[name='email']").val() )

            new_email = $("input[name='email']").val();
            $("button[type='submit']").prop("disabled",false);
        });

        var new_psw = "";

        var ruta = $("input[name='ruta']").val();

        $("#btn-email").click(function() {
            console.log("v2 "+new_email);
            $.ajax({
                url: ruta,
                type: "post",
                data: {
                    _token: '{!! csrf_token() !!}',
                    email: new_email,
                }
            }).done(function() {
                console.log("bien mail!");
                $('#modalMail').modal('hide');
                $('#modalSatisfactorio').modal('toggle');
            }).fail(function() {
                    console.log( "error" );
                });
        });

        $("input[name='password2']").on("keyup", function() {
            var psw1 = $("input[name='password']").val();
            var psw2 = $("input[name='password2']").val();
            if (psw1!=psw2){
                $("#btn-psw").prop("disabled",true);
                createError("Las contraseñas no coinciden.",[$("input[name='password']"),$("input[name='password2']")]);
            }
            else{
                $('.ErrorContainer').hide();
                $("input[name='password']").css("background","#D2F3A1");
                $("input[name='password2']").css("background","#D2F3A1");
                new_psw = $("input[name='password']").val();
                $("#btn-psw").prop("disabled",false);
            }
        });

        var rutaPsw = $("input[name='rutaPsw']").val();
        $("#btn-psw").click(function() {
            console.log("v2 "+new_psw);
            $.ajax({
                url: rutaPsw,
                type: "post",
                data: {
                    _token: '{!! csrf_token() !!}',
                    password: new_psw,
                }
            }).done(function() {
                console.log("bien!");
                $('#modalPsw').modal('hide');
                $('#modalSatisfactorio').modal('toggle');
            }).fail(function() {
                    console.log( "error" );
                });
        });
        
       
    </script>