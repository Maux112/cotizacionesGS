<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$nombreProducto = (isset($_POST['nombreProducto'])) ? $_POST['nombreProducto'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
//$id = (isset($_POST['id'])) ? $_POST['id'] : '';


$estadoHab=0;

switch($opcion){
    case 1: //alta

        $consulta = "SELECT `desProducto` FROM `producto` WHERE desProducto='$nombreProducto'";
        //echo($consulta);    
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $row_cnt =$resultado ->fetch();

        if ($row_cnt > 0) {
           // echo '<div class="alert alert-danger">Nombre de producto ya registrado.</div>';
        } else {
            $consulta = "INSERT INTO `producto`(`idProducto`, `desProducto`, `estado_producto`) VALUES (Null,'$nombreProducto',1)";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 
    
            
            $consulta = "SELECT `idProducto`, `desProducto` FROM `producto` ORDER BY idProducto DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        break;  
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
