@include('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <h5>Nombre: <?php echo (auth()->user()->name);
                if((auth()->user()->tipo) != null){ 
                    echo ("  (". auth()->user()->tipo .")");
                    }?> 
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
                        <form id="form">
                            @csrf
                            <label for="email">Nuevo e-mail: <input type="text" size="40" name="email" class="input"></label>
                            <input type="text" name="ruta" hidden=true <?php echo ("value='/usuario/modificarMail/".auth()->user()->id."'")?>>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            Cerrar
                        </button>
                        <button class="btn btn-primary" type="submit">
                            Guardar cambio
                        </button>
                    </div>
                </form>
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
                        <form id="form2">
                            @csrf
                            <label for="password">Nueva contraseña: <input type="password" size="20" name="password" class="input"></label>
                            <label for="password2">Repita contraseña: <input type="password" size="20" name="password2" class="input"></label>
                            <input type="text" name="ruta" hidden=true <?php echo ("value='/usuario/modificar/".auth()->user()->id."'")?>>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            Cerrar
                        </button>
                        <button class="btn btn-primary" type="submit" disabled>
                            Guardar cambio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalSatisfactorio" class="modal" data-easein="bounceIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                <h3>Datos guardados correctamente.</h3>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("input[name='password2']").on("keyup", function() {
            var psw1 = $("input[name='password']").val();
            var psw2 = $("input[name='password2']").val();
            if (psw1!=psw2){
                $("button[type='submit']").prop("disabled",true);
                createError("Las contraseñas no coinciden.",[$("input[name='password']"),$("input[name='password2']")]);
            }
            else{
                $('.ErrorContainer').hide();
                $("input[name='password']").css("background","#D2F3A1");
                $("input[name='password2']").css("background","#D2F3A1");
                $("button[type='submit']").prop("disabled",false);
            }
        });
        
       
    </script>