<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$desGramaje = (isset($_POST['desGramaje'])) ? $_POST['desGramaje'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
//$id = (isset($_POST['id'])) ? $_POST['id'] : '';


$estadoHab=0;

switch($opcion){
    case 1: //alta

        $consulta = "SELECT `desGramaje` FROM `gramaje` WHERE  desGramaje='$desGramaje'";
        //echo($consulta);    
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $row_cnt =$resultado ->fetch();

        if ($row_cnt > 0) {
            //echo '<div class="alert alert-danger">El gramaje ya esta registrado.</div>';
        } else {
            $consulta = "INSERT INTO `gramaje`(`idGramaje`, `desGramaje`, `estado_gramaje`) VALUES (Null,'$desGramaje',1)";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 
    
            
            $consulta = "SELECT `idGramaje`, `desGramaje` FROM `gramaje` ORDER BY idGramaje DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        break;  
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
