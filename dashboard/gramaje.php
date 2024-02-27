<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<!-- <div class="container" > -->
<div>
    <h1>Agregar Gramaje</h1>
       
<!-- <div class="container" > -->
<div>
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevoGramaje" type="button" class="btn btn-success" data-toggle="modal">Nuevo Gramaje</button>   
             
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Agregar  ...
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="productos.php">Productos</a>
                    <a class="dropdown-item" href="precioMaterial.php">Precios</a>
                    <a class="dropdown-item" href="medida.php">Medidas</a>
                    <a class="dropdown-item" href="paquete.php">Cantidad Paquete</a>
                    <a class="dropdown-item" href="marca.php">Marcas</a>
                    <a class="dropdown-item" href="proveedor.php">Proveedores</a>
                </div>
            </div>    
        </div>    
    </div>    
    <br>  
<!-- <div class="container"> -->
<div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaGramaje" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Código</th>
                                <th>Gramaje</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($dataGramaje as $datGramaje) {                                                        
                            ?>
                            <tr>
                                <td ><?php echo $datGramaje['idGramaje'] ?></td>
                                <td ><?php echo $datGramaje['desGramaje'] ?></td>                               
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalGramaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formGramaje">    
            <div class="modal-body">
                <div class="form-group">
                <label for="desGramaje" class="col-form-label">Gramaje</label>
                <input type="number" class="form-control" id="desGramaje" placeholder="Por ejemplo: 115" required>
                <div id="result-desGramaje"></div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>