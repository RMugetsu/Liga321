<div class="container" style="background-color: white; border: 1px solid black;">
<?php 
    // en public\img y son todos .PNG
?>
    <div class="row cuadroGuardarAlineacion">
        <div class="col-md-12">
            <label>Alineación para el próximo partido:</label>
        </div>
        <div class="col-md-4">
            <select width=50% class=" alineacion form-control">
                <option> </option>
                <?php 
                    for ($i=0; $i<sizeof($alineacion);$i++){
                        echo ("<option name='".($i+1)."' value='".$alineacion[$i]."'>$alineacion[$i]</option>");
                    }
                ?>
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-success" id="guardarAlineacion" disabled>Guardar alineación</button>
        </div>
        <br>
    </div> 
    <br>
</div>

