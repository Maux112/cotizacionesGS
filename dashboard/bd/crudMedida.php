<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$desMedida = (isset($_POST['desMedida'])) ? $_POST['desMedida'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
//$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1: //alta

        $consulta = "SELECT `desmedida` FROM `medida` WHERE  desmedida='$desMedida'";
        //echo($consulta);    
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $row_cnt =$resultado ->fetch();

        if ($row_cnt > 0) {
            //echo '<div class="alert alert-danger">La medida ya esta registrada.</div>';
        } else {
            $consulta = "INSERT INTO `medida`(`idMedida`, `desmedida`, `estado_medida`) VALUES  (Null,'$desMedida',1)";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 

            
            $consulta = "SELECT `idMedida`, `desmedida` FROM `medida` ORDER BY idMedida DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        break;  
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
