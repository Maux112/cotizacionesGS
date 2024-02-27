
        <?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<!-- <div class="container" > -->
<div>
    <h1>Gestión de precios de material </h1>
       
<!-- <div class="container" > -->
<div>
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnPrecio" type="button" class="btn btn-success" data-toggle="modal">Nuevo Registro</button>    
            

            
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Agregar  ...
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="productos.php">Productos</a>
                    <a class="dropdown-item" href="gramaje.php">Gramaje</a>
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
                        <table id="tablaPrecios" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <!-- <th>Id</th>  -->
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Gramaje</th>                                
                                <th>Medida</th>  
                                <th>Cantidad Paquete</th>  
                                <th>Precio</th>  
                                <th>Precio Unitario</th> 
                                <th>Marca</th>  
                                <th>Proveedor</th>
                                <th>Fecha Registro</th>    
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($dataPrecio as $datPrecio) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $datPrecio['IdPrecio'] ?></td>
                                <td><?php echo $datPrecio['desProducto'] ?></td>
                                <td align="center"><?php echo $datPrecio['desGramaje'] ?></td>
                                <td><?php echo $datPrecio['desmedida'] ?></td>
                                <td align="center"><?php echo $datPrecio['cantPaquete'] ?></td>  
                                <td align="center" class="bg-success text-white"><?php echo $datPrecio['precio'] ?></td>
                                <td align="center" class="bg-warning text-white"><?php echo (round($datPrecio['precio']/$datPrecio['cantPaquete'],2 )) ?></td>
                                <td><?php echo $datPrecio['desMarca'] ?></td>                             
                                <td><?php echo $datPrecio['nombreProveedor'] ?></td>
                                <td><?php echo $datPrecio['Fecha_Registro_Precio'] ?></td>                                
                                <td></td>
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
<div class="modal fade" id="modalPrecioCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPrecio">    
            <div class="modal-body">
                <!-- Nombre producto -->
                <div class="form-group">
                <label for="nombreProducto" class="col-form-label">Producto:</label>
                    <select name="nombreProducto" class="form-control" id="nombreProducto">
                    <option hidden selected value="">Elija el Material</option>
                    <?php foreach($dataNomProd as $datNomProd) { ?>
                        <option><?php echo $datNomProd['desProducto']?></option>       
                    <?php } ?>  
                    </select>
                </div>
                <!-- //Gramaje -->
                <div class="form-group">
                <label for="gramaje" class="col-form-label">Gramaje:</label>
                    <select name="gramaje" class="form-control" id="gramaje">
                    <option hidden selected value="">Elija el gramaje</option>
                    <?php foreach($dataGramaje as $datGramaje) { ?>
                        <option><?php echo $datGramaje['desGramaje']?></option>       
                    <?php } ?>  
                    </select>
                </div> 
                <!-- Medida -->
                <div class="form-group">
                <label for="medida" class="col-form-label">Medida:</label>
                    <select name="medida" class="form-control" id="medida">
                    <option hidden selected value="">Elija la medida</option>
                    <?php foreach($dataMedida as $datMedida) { ?>
                        <option><?php echo $datMedida['desmedida']?></option>       
                    <?php } ?>  
                    </select>
                </div>
                <!-- Cantidad -->
                <div class="form-group">
                <label for="cantPaq" class="col-form-label">Cantidad Paquete:</label>
                    <select name="cantPaq" class="form-control" id="cantPaq">
                    <option hidden selected value="">Elija la cantidad del paquete</option>
                    <?php foreach($dataCantPaq as $datCantPaq) { ?>
                        <option><?php echo $datCantPaq['cantPaquete']?></option>       
                    <?php } ?>  
                    </select>
                </div> 
                <div class="form-group">
                <label for="precio" class="col-form-label">Precio:</label>
                <input type="number" step="any" class="form-control" id="precio" min=1.00 value="1.00" required>
                </div> 

                <div class="form-group">
                <label for="marca" class="col-form-label">Marca:</label>
                <select name="marca" class="form-control" id="marca">
                    <option hidden selected value="">Elija una Marca</option>
                    <?php foreach($dataMarca as $datMarca) { ?>
                    <option><?php echo $datMarca['desMarca']?></option>       
                    <?php } ?>  
                </select>  
                </div>      

                <div class="form-group">             
                    <label for="proveedor" class="col-form-label">Proveedor:</label>   
                    <select name="proveedor" class="form-control" id="proveedor">
                        <option hidden selected value="">Elija un proveedor</option>
                        <?php foreach($dataProv as $datProv) { ?>
                            <option><?php echo $datProv['nombreProveedor']?></option>       
                        <?php } ?>  
                    </select>  
                </div> 

                
                       
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