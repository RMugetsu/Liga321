<div class="container" style="background-color: white; border: 1px solid black;">
<?php 
    // en public\img y son todos .PNG
    $alineacion = ['1-3-1-3-3', '1-3-3-1-3', '1-3-3-3-1','1-3-4-3','1-4-1-3-2','1-4-1-4-1','1-4-2-2-2','1-4-2-3-1','1-4-3-2-1','1-4-3-3','1-4-4-1-1','1-4-4-2','1-4-5-1'];
?>
    <div class="row">
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
        <div align="center" class="col-md-12"">
            <br>
            <img id="imgAlineacion" width="80%" src="/img/noalineacion.png">
        </div>
    </div> 
    <br>
</div>

