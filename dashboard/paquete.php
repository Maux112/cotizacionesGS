<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<!-- <div class="container" > -->
<div>
    <h1>Agregar Cantidad</h1>
       
<!-- <div class="container" > -->
<div>
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevaCantidad" type="button" class="btn btn-success" data-toggle="modal">Nueva Cantidad</button>   


             
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Agregar  ...
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="productos.php">Productos</a>
                    <a class="dropdown-item" href="gramaje.php">Gramaje</a>
                    <a class="dropdown-item" href="medida.php">Medidas</a>
                    <a class="dropdown-item" href="precioMaterial.php">Precios</a>
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
                        <table id="tablaCantidad" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Código</th>
                                <th>Cantidades de Paquetes</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($dataCantPaq as $datCantPaq) {                                                        
                            ?>
                            <tr>
                                <td ><?php echo $datCantPaq['idPaquete'] ?></td>
                                <td ><?php echo $datCantPaq['cantPaquete'] ?></td>                    
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
<div class="modal fade" id="modalCantidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formCantidad">    
            <div class="modal-body">
                <div class="form-group">
                <label for="cantPaquete" class="col-form-label">Cantidad Paquete</label>
                <input type="number"  class="form-control" id="cantPaquete" placeholder="Por ejemplo: 500" required>
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