<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<!-- <div class="container" > -->
<div>
    <h1>Agregar Proveedor</h1>
       
<!-- <div class="container" > -->
<div>
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevoProveedor" type="button" class="btn btn-success" data-toggle="modal">Nuevo Proveedor</button>  
            
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Agregar  ...
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="productos.php">Productos</a>
                    <a class="dropdown-item" href="gramaje.php">Gramaje</a>
                    <a class="dropdown-item" href="medida.php">Medidas</a>
                    <a class="dropdown-item" href="paquete.php">Cantidad Paquete</a>
                    <a class="dropdown-item" href="marca.php">Marcas</a>
                    <a class="dropdown-item" href="precioMaterial.php">Precios</a>

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
                        <table id="tablaProveedor" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Código</th>
                                <th>Proveedor</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($dataProv as $datProv) {                                                        
                            ?>  
                            <tr>
                                <td ><?php echo $datProv['idProveedor'] ?></td>
                                <td ><?php echo $datProv['nombreProveedor'] ?></td>                               
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
<div class="modal fade" id="modalProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formProveedor">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombreProveedor" class="col-form-label">Proveedor</label>
                <input type="text" class="form-control" id="nombreProveedor" placeholder="Por ejemplo: IMPEXPAP" required>
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