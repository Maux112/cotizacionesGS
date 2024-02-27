<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$marca = (isset($_POST['marca'])) ? $_POST['marca'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


switch($opcion){
    case 1: //alta
        $consulta = "SELECT `desMarca` FROM `marca` WHERE  desMarca='$marca'";
        //echo($consulta);    
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $row_cnt =$resultado ->fetch();

        if ($row_cnt > 0) {
            //echo '<div class="alert alert-danger">La marca ya esta registrada.</div>';
        } else {
            //echo '<div class="alert alert-success">La marca esta disponible.</div>';
            $consulta = "INSERT INTO `marca`(`idMarca`, `desMarca`, `estado_marca`) VALUES (Null,'$marca',1)";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
    
            
            $consulta = "SELECT `idMarca`, `desMarca` FROM `marca` ORDER BY idMarca DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        break;  
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
