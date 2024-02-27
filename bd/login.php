<?php
session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$clave = (isset($_POST['password'])) ? $_POST['password'] : '';

//$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

//$consulta = "SELECT * FROM login WHERE Usuario='$usuario' AND Contrasena='$pass' ";
$consulta = "SELECT * FROM login WHERE Usuario='$usuario' AND Clave='$clave'and Estado_Login=1 ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"] = $usuario;
}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}

print json_encode($data);
$conexion=null;

//usuarios de pruebaen la base de datos
//usuario:JoseArroyo pass:HospitalNort2020

//usuario:demo pass:demo