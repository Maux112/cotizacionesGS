<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<!-- <div class="container" > -->
<div>
    <h1>Gestión de usuarios</h1>
       
<!-- <div class="container" > -->
<div>
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo Usuario</button>   
            </div>    
        </div>    
    </div>    
    <br>  
<!-- <div class="container"> -->
<div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <!-- <th>Id</th> -->
                                <th>Código</th>
                                <th>Nombre(s)</th>
                                <th>Apellidos</th>                                
                                <th>Celular</th>  
                                <th>Usuario</th>  
                                <th>Contraseña</th>  
                                <th>Rol</th>  
                                <th>Estado</th>
                                <th>Fecha Registro</th>    
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['Id_Usuario'] ?></td>
                                <td><?php echo $dat['Nombre'] ?></td>
                                <td><?php echo $dat['Apellidos'] ?></td>
                                <td><?php echo $dat['Celular'] ?></td>
                                <td><?php echo $dat['usuario'] ?></td>  
                                <td><?php echo $dat['Clave'] ?></td>  
                                <td><?php echo $dat['Rol'] ?></td>  
                                

                                <td><?php
                                           if($dat['Estado_Login'] == '0')
                                           { echo("Deshabilitado");}
                                           else{echo("Habilitado");}
                                        ?></td>

                                <!-- <?php
                                    // if($dat['Estado_Login'] == '0')
                                    // { 
                                        
                                    //     ?><td class="bg-danger text-white">Deshabilitado</td><?php
                                    // }
                                    // else
                                    // {
                                        
                                    //     ?><td class="bg-success text-white">Habilitado</td><?php
                                    // }
                                ?>
                                 -->



                                <td><?php echo $dat['Fecha_Registro'] ?></td>  
                                

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
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre(s):</label>
                <input type="text" class="form-control" id="nombre" required>
                </div>
                <div class="form-group">
                <label for="apellidos" class="col-form-label">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" required>
                </div>                
                <div class="form-group">
                <label for="cel" class="col-form-label">Celular:</label>
                <input type="tel" class="form-control" id="cel" required>
                </div>
                <div class="form-group">
                <label for="user" class="col-form-label">Usuario:</label>
                <input type="text" class="form-control" id="user" required>
                <div id="result-user"></div>
                </div> 
                <div class="form-group">
                <label for="clave" class="col-form-label">Contraseña:</label>
                <input type="text" class="form-control" id="clave" required>
                </div> 

                <div class="form-group">
                <label for="rol" class="col-form-label">Rol:</label>
                <select name="rol" class="form-control" id="rol">
                <?php foreach($dataRolUser as $datRolUser) { ?>
                    <option><?php echo $datRolUser['Rol']?></option>       
                <?php } ?>  
                </select>       

                <div class="form-group">             
                    <label for="estado" class="col-form-label">Estado:</label>   
                    <input type="text" class="form-control" id="estado" disabled  value="Deshabilitado" >         
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