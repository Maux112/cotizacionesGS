<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$nombreProveedor = (isset($_POST['nombreProveedor'])) ? $_POST['nombreProveedor'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
//$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO `proveedor`(`idProveedor`, `nombreProveedor`, `estado_proveedor`) VALUES  (Null,'$nombreProveedor',1)";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        
        $consulta = "SELECT `idProveedor`, `nombreProveedor` FROM `proveedor` ORDER BY idProveedor DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;  
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
