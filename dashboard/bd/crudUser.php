<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
$cel = (isset($_POST['cel'])) ? $_POST['cel'] : '';
$user = (isset($_POST['user'])) ? $_POST['user'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$estadoHab=0;
switch($opcion){
    case 1: //alta
        $consulta="SELECT `Usuario` FROM `login` WHERE Usuario='$user'";
        // echo($consulta);
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
         $row_cnt =$resultado ->fetch();
 
         if ($row_cnt > 0) {
             //echo '<div class="alert alert-danger">Nombre de usuario ya registrado.</div>';
         } else {
            $consulta = "INSERT INTO usuario (Id_Usuario,Nombre,Apellidos,Celular) 
            values(NULL,'$nombre','$apellidos','$cel');
            INSERT INTO login (Id_Login,Usuario,Clave,RolUsuario_FK,Usuario_FK,Fecha_Registro,Estado_Login) 
            VALUES(NULL,'$user','$clave',(SELECT Id_UserRol FROM rol_usuario where Rol='$rol'),(SELECT Id_Usuario FROM  usuario  ORDER BY Id_Usuario DESC LIMIT 1),CURRENT_TIMESTAMP,0);";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 

            
            $consulta = "SELECT Usuario.Id_Usuario,Usuario.Nombre,Usuario.Apellidos,Usuario.Celular,usuario, `Clave`,rol_usuario.Rol, `Fecha_Registro`, `Estado_Login` FROM `login` ,Usuario,rol_usuario WHERE login.Usuario_FK=Usuario.Id_Usuario AND login.RolUsuario_FK = rol_usuario.Id_UserRol ORDER BY Usuario.Id_Usuario DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
         }
        break;

    case 2: //modificación
        // $consulta="SELECT `Usuario` FROM `login` WHERE Usuario='$user'";
        // // echo($consulta);
        //  $resultado = $conexion->prepare($consulta);
        //  $resultado->execute();
        //  $row_cnt =$resultado ->fetch();
 
        //  if ($row_cnt > 0) {
        //      //echo '<div class="alert alert-danger">Nombre de usuario ya registrado.</div>';
        //  } else {         
            $consulta = "UPDATE `usuario` SET `Nombre`='$nombre',`Apellidos`='$apellidos',`Celular`='$cel' WHERE Id_Usuario ='$id';
            UPDATE  login SET Usuario='$user', Clave='$clave',RolUsuario_FK=(SELECT rol_usuario.Id_UserRol FROM rol_usuario where Rol = '$rol') WHERE Usuario_FK='$id';";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT Usuario.Id_Usuario,Usuario.Nombre,Usuario.Apellidos,Usuario.Celular,usuario, `Clave`,rol_usuario.Rol, `Fecha_Registro`, `Estado_Login` FROM `login` ,Usuario,rol_usuario WHERE login.Usuario_FK=Usuario.Id_Usuario AND login.RolUsuario_FK = rol_usuario.Id_UserRol ";  
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
         //}
        break;
        
    case 3://cambio de estado
        if($estado=="Deshabilitado")
        {
            $estadoHab=1;
        }

        $consulta = "UPDATE login SET  Estado_Login='$estadoHab' where Usuario_FK='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
