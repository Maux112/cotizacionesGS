<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$user = (isset($_POST['user'])) ? $_POST['user'] : '';
$nombreProducto = (isset($_POST['nombreProducto'])) ? $_POST['nombreProducto'] : '';
$desGramaje= (isset($_POST['desGramaje'])) ? $_POST['desGramaje'] : '';
$desMedida= (isset($_POST['desMedida'])) ? $_POST['desMedida'] : '';
$desmarca= (isset($_POST['marca'])) ? $_POST['marca'] : '';

$tipoNombre = (isset($_POST['tipoNombre'])) ? $_POST['tipoNombre'] : '';



// echo("dsfdsf".$tipoNombre);
// echo("asssssssssss".$nombreProducto);
switch($tipoNombre){
    case 0: //Para usuario
        $consulta="SELECT `Usuario` FROM `login` WHERE Usuario='$user'";
       // echo($consulta);
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $row_cnt =$resultado ->fetch();

        if ($row_cnt > 0) {
            echo '<div class="alert alert-danger">Nombre de usuario ya registrado.</div>';
        } else {
            echo '<div class="alert alert-success">Nombre de usuario disponible.</div>';
        }
        break;
    case 1: //Para Productos
        $consulta = "SELECT `desProducto` FROM `producto` WHERE desProducto='$nombreProducto'";
        //echo($consulta);    
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $row_cnt =$resultado ->fetch();

        if ($row_cnt > 0) {
            echo '<div class="alert alert-danger">Nombre de producto ya registrado.</div>';
        } else {
            echo '<div class="alert alert-success">Nombre de producto disponible.</div>';
        }
        break;        
    case 2://Para Gramaje                 
        $consulta = "SELECT `desGramaje` FROM `gramaje` WHERE  desGramaje='$desGramaje'";
        //echo($consulta);    
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $row_cnt =$resultado ->fetch();

        if ($row_cnt > 0) {
            echo '<div class="alert alert-danger">El gramaje ya esta registrado.</div>';
        } else {
            echo '<div class="alert alert-success">El gramaje esta disponible.</div>';
        }
        break;            
    case 3://Para Medida
        $consulta = "SELECT `desmedida` FROM `medida` WHERE  desmedida='$desMedida'";
        //echo($consulta);    
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $row_cnt =$resultado ->fetch();

        if ($row_cnt > 0) {
            echo '<div class="alert alert-danger">La medida ya esta registrada.</div>';
        } else {
            echo '<div class="alert alert-success">La medida esta disponible.</div>';
        }
        break; 
    case 4://Para Cantidad de Paquete
        $consulta = "SELECT `desMarca` FROM `marca` WHERE  desMarca='$desmarca'";
        //echo($consulta);    
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $row_cnt =$resultado ->fetch();

        if ($row_cnt > 0) {
            echo '<div class="alert alert-danger">La marca ya esta registrada.</div>';
        } else {
            echo '<div class="alert alert-success">La marca esta disponible.</div>';
        }          
        break; 
    case 5://Para Marcas
                        
        break; 
    case 6://Para proveedores
                        
        break;       
}

//print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
