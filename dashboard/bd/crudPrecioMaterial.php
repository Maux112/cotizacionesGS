<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$nombreProducto = (isset($_POST['nombreProducto'])) ? $_POST['nombreProducto'] : '';
$gramaje = (isset($_POST['gramaje'])) ? $_POST['gramaje'] : '';
$medida = (isset($_POST['medida'])) ? $_POST['medida'] : '';
$cantPaq = (isset($_POST['cantPaq'])) ? $_POST['cantPaq'] : '';
$precio = ((isset($_POST['precio'])) ? $_POST['precio'] : '');
$marca = (isset($_POST['marca'])) ? $_POST['marca'] : '';
$proveedor = (isset($_POST['proveedor'])) ? $_POST['proveedor'] : '';
    
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$idPrecio = (isset($_POST['idPrecio'])) ? $_POST['idPrecio'] : '';


$estadoPrecioMaterial=0;

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO `precio`(`IdPrecio`, `idProducto_key`, `idMarca_key`, `idProveedor_key`, `idGramaje_key`, `idMedida_key`, `idPaquete_key`, `precio`, `estado_precio`, `Fecha_Registro_Precio`)
        VALUES (NULL,
        (SELECT idProducto FROM producto WHERE desProducto='$nombreProducto'),
        (SELECT idMarca FROM marca WHERE desMarca='$marca'),
        (SELECT idProveedor FROM proveedor WHERE nombreProveedor='$proveedor'),
        (SELECT idGramaje FROM gramaje WHERE desGramaje='$gramaje'),
        (SELECT idMedida FROM medida WHERE desmedida='$medida '),
        (SELECT idPaquete FROM paquete WHERE cantPaquete=$cantPaq),
        '$precio',
        1,
        current_timestamp())";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        
        // $consulta = "SELECT`Id_Login`,Usuario.Nombre,Usuario.Apellidos,Usuario.Celular,usuario,`Clave`,rol_usuario.Rol,`Estado_Login`, `Fecha_Registro` FROM `login` ,Usuario,rol_usuario WHERE login.Usuario_FK=Usuario.Id_Usuario AND login.RolUsuario_FK = rol_usuario.Id_UserRol ORDER BY Id_Login DESC LIMIT 1";
        // $resultado = $conexion->prepare($consulta);
        // $resultado->execute();
        // $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case 2: //modificación
        $consulta = "UPDATE `precio` SET 
        `idProducto_key`=(SELECT idProducto FROM producto WHERE desProducto='$nombreProducto'),
        `idMarca_key`=(SELECT idMarca FROM marca WHERE desMarca='$marca'),
        `idProveedor_key`= (SELECT idProveedor FROM proveedor WHERE nombreProveedor='$proveedor'),
        `idGramaje_key`=(SELECT idGramaje FROM gramaje WHERE desGramaje='$gramaje'),
        `idMedida_key`=(SELECT idMedida FROM medida WHERE desmedida='$medida'),
        `idPaquete_key`= (SELECT idPaquete FROM paquete WHERE cantPaquete=$cantPaq),
        `precio`='$precio'
         WHERE `IdPrecio`=$idPrecio;";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        // $consulta = "SELECT `Id_Login`,Usuario.Nombre,Usuario.Apellidos,Usuario.Celular,usuario,`Clave`,rol_usuario.Rol,`Estado_Login`, `Fecha_Registro` FROM `login` ,Usuario,rol_usuario WHERE login.Usuario_FK=Usuario.Id_Usuario AND login.RolUsuario_FK = rol_usuario.Id_UserRol;";  
        // $resultado = $conexion->prepare($consulta);
        // $resultado->execute();
        // $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
        
    case 3://baja
        $consulta = "UPDATE `precio` SET `estado_precio`= 0 WHERE `IdPrecio`=$idPrecio; ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
