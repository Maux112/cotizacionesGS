<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<!-- <div class="container" > -->
<div>
    <h1>Agregar Marca</h1>
       
<!-- <div class="container" > -->
<div>
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevaMarca" type="button" class="btn btn-success" data-toggle="modal">Nueva Marca</button>   

            
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Agregar  ...
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="productos.php">Productos</a>
                    <a class="dropdown-item" href="gramaje.php">Gramaje</a>
                    <a class="dropdown-item" href="medida.php">Medidas</a>
                    <a class="dropdown-item" href="paquete.php">Cantidad Paquete</a>
                    <a class="dropdown-item" href="precioMaterial.php">Precios</a>
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
                        <table id="tablaMarca" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Código</th>
                                <th>Marca</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($dataMarca as $datMarca) {                                                        
                            ?>  
                            <tr>
                                <td ><?php echo $datMarca['idMarca'] ?></td>
                                <td ><?php echo $datMarca['desMarca'] ?></td>                               
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
<div class="modal fade" id="modalMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formMarca">    
            <div class="modal-body">
                <div class="form-group">
                <label for="marca" class="col-form-label">Marca</label>
                <input type="text" class="form-control" id="marca" placeholder="Por ejemplo: GOLD EAST" required>
                <div id="result-marca"></div>
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