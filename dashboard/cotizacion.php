<?php require_once "vistas/parte_superior.php"?>
<div class="modal-body">
<!-- El div de arriba es para que no se vea apegado a los bordes de la pantalla -->
    <!-- PARA EL TAMAÑO DEL PEDIDO -->
    <div class="form-group">
        <label for="tam" class="col-form-label">Tamaño del pedido</label>      
        <div class="input-group">
            <input name="cotizacion_ancho_pedido" id="cotizacion_ancho_pedido" type="number" step="any" min="0"  class="form-control" placeholder="Ancho" required>
            <span class="input-group-text">X</span>
            <input name="cotizacion_largo_pedido" id="cotizacion_largo_pedido" type="number" step="any" min="0" class="form-control" placeholder="Largo" required>
        </div>
    </div>  


    <!-- PARA ELEGIR MATERIAL -->
    <div class="form-group">
        <label for="gramaje" class="col-form-label">Material:</label>
        <select name="material_elegido" class="form-control" id="material_elegido">
        <option hidden selected value="">Elija el material</option>
                    <?php foreach($dataPrecio as $datPrecioCot) { ?>
                        <option value="<?php echo $datPrecioCot['IdPrecio'] ?>">
                        <?php echo $datPrecioCot['desProducto'].", ".$datPrecioCot['desGramaje']." gr. , ".$datPrecioCot['desmedida'].", ".$datPrecioCot['desMarca'].", ".(round($datPrecioCot['precio']/$datPrecioCot['cantPaquete'],2 ))." Bs. ,Cant/Paquete ".$datPrecioCot['cantPaquete'] ?></option>       
                    <?php } ?>  
        </select>
    </div> 
    <!-- PARA CANTIDAD -->
    <div class="form-group">
        <label for="cantidadPedido" class="col-form-label">Cantintad</label>
        <input type="number" class="form-control" id="cantidadPedido" min="1" placeholder="Por ejemplo: 100" required>
    </div>
    <!-- PARA MILLARES DE IMPRESIÓN-->
    <div class="form-group">
        <label for="millarImpr" class="col-form-label">Millares de Impresión</label>
        <input type="number" step="any" class="form-control" id="millarImpr" name="millarImpr" value="0" disabled >
    </div>

    <!--PARA EL ARMADO-->
    <div class="form-group">
        <label for="armado" class="col-form-label">Armado</label>
        <input type="number" class="form-control" id="armado" name="armado" value="0" min="0">
    </div>
    <!--PARA CANTIDAD DE IMPRESIÓN Y SU DEMASIA -->
    <div class="form-group">
        <div class="input-group">
            <label for="cantImpr" class="input-group-text">Cantidad de Impresión </label>
            <input type="number" class="form-control" id="cantImpr" name="cantImpr" value="0" disabled >
            <label for="demasiaCantImpr" class="input-group-text">Demasía por Cantidad </label>
            <input name="demasiaCantImpr" id="demasiaCantImpr" type="number" min="0" class="form-control" value="0" disabled>
        </div>
    </div>






<!-- PARA COLORES DE IMPRESIÓN -->
    <div class="form-group">
        <label for="color" class="col-form-label">Colores de impresión de proceso</label> 
        <div class="input-group">
            <label for="colorAnv"class="input-group-text" >Anverso</label>
            <input type="number" class="form-control" id="colorAnv" name="colorAnv" value="0" min="0" max="4" required >
      
            <label for="colorRev"class="input-group-text">Reverso</label>
            <input type="number" class="form-control" id="colorRev" name="colorRev" value="0" min="0" max="4" required>
        </div>
    </div>
    <div class="form-group">
        <label for="color" class="col-form-label">Colores especiales de impresión</label> 
        <div class="input-group">
            <label for="colorEspAnv" class="input-group-text">Anverso</label>
            <input type="number" class="form-control" id="colorEspAnv" name="colorEspAnv" value="0" min="0" max="4" required >
            <label for="colorEspRev" class="input-group-text">Reverso</label>
            <input type="number" class="form-control" id="colorEspRev" name="colorEspRev" value="0" min="0" max="4" required>
        </div>
    </div>
<!-- Para demasia f(colores) -->
    <div class="form-group">
        <div class="input-group">
            <label for="coloresTotal" class="input-group-text">Colores Total</label>
            <input type="number" class="form-control" id="coloresTotal" name="coloresTotal" value="0" disabled >
            <label for="demasiaCol" class="input-group-text">Demasía por Color</label>
            <input type="number" class="form-control" id="demasiaCol" name="demasiaCol" value="0" disabled>
        </div>
    </div>
<!-- Para la hoja sale   -->
    <div class="form-group">
        <div class="input-group">
            <label for="hojaSale" class="input-group-text">De la hoja sale</label>
            <input type="number" class="form-control" id="hojaSale" name="hojaSale" min="1" value="0" >
            <label for="demaporcent" class="input-group-text">Demasía (extra 25 %)</label>
            <input type="number" step="any"  class="form-control" id="demaporcent" name="demaporcent" value="0" disabled>
        </div>
    </div>
<!--PARA TOTAL DE PLIEGOS A IMPRIMIR Y TOTAL DE IMPRESION  -->
<div class="form-group">
        <div class="input-group">
            <label for="totalPliImp" class="input-group-text">Total de pliegos a imprimir</label>
            <input type="number" class="form-control" id="totalPliImp" name="totalPliImp" min="1" value="0" disabled>
            <label for="totalImpDem" class="input-group-text">Total de impresion más demasias</label>
            <input type="number" step="any"  class="form-control" id="totalImpDem" name="totalImpDem" value="0" disabled>
        </div>
        <div class="input-group">
            <label for="totalHojImp" class="input-group-text">Total hojas a imprimir</label>
            <input type="number" class="form-control" id="totalHojImp" name="totalHojImp" min="1" value="0" disabled>
            <label for="totalHojCor" class="input-group-text">Total hojas a cortar</label>
            <input type="number" step="any"  class="form-control" id="totalHojCor" name="totalHojCor" value="0" disabled>
        </div>
    </div>
<!--PARA PRECIO-->
<div class="form-group">
        <label for="precio" class="col-form-label">Precio Material</label>
        <input type="number" step="any" class="form-control" id="precio" name="precio" value="0" min="0" disabled>
    </div>










    










    <a href ="https://pedidos-lpz.madepa.com.bo/11-Papeles-y-Cartulinas" target="_blank">TIENDA MADEPA</a>.<br>
    <a href ="https://impexpap.com/#misi" target="_blank">IMPEXPAP</a>.

    <div class="form-group">
    <button type="button" id="btnPrueba" class="btn btn-dark" >Calcular</button>
    </div>
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>