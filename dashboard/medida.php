<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<!-- <div class="container" > -->
<div>
    <h1>Agregar Medida</h1>
       
<!-- <div class="container" > -->
<div>
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevaMedida" type="button" class="btn btn-success" data-toggle="modal">Nueva Medida</button>   
            
            
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Agregar  ...
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="productos.php">Productos</a>
                    <a class="dropdown-item" href="gramaje.php">Gramaje</a>
                    <a class="dropdown-item" href="precioMaterial.php">Precios</a>
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
                        <table id="tablaMedida" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Código</th>
                                <th>Medida</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($dataMedida as $datMedida) {                                                        
                            ?>
                            <tr>
                                <td ><?php echo $datMedida['idMedida'] ?></td>
                                <td ><?php echo $datMedida['desmedida'] ?></td>                               
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
<div class="modal fade" id="modalMedida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formMedida">    
            <div class="modal-body">
                <div class="form-group">
                <label for="ancho" class="col-form-label">Ancho</label>
                <input type="number" step="any" class="form-control" id="ancho" placeholder="Por ejemplo: 77" required>
            </div>
            
            <div class="form-group">
                <label for="largo" class="col-form-label">Largo</label>
                <input type="number" step="any" class="form-control" id="largo" placeholder="Por ejemplo: 110" required>
            </div>
            <div id="result-desMedida"></div>

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