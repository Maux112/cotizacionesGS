<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$cantPaquete = (isset($_POST['cantPaquete'])) ? $_POST['cantPaquete'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
//$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO `paquete`(`idPaquete`, `cantPaquete`, `estado_paquete`) VALUES  (Null,'$cantPaquete',1)";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        
        $consulta = "SELECT `idPaquete`, `cantPaquete` FROM `paquete` ORDER BY idPaquete DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;  
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
