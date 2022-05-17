<?php
session_start();
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

//$pass = md5($password);
//$pass = ($password);
$pass = base64_encode($password);

$consulta = "SELECT administrador.id_admin AS ida,administrador.idRolA AS idRolAd, rol.descripcion AS roles FROM administrador JOIN rol ON administrador.idRolA = rol.id_roles WHERE adminis='$usuario' AND pass='$pass' ";	
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 


if($resultado->rowCount() >= 1){ 
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);    
    $_SESSION["s_admin"] = $usuario;    
    $_SESSION["s_idRol3"] = $data[0]["idRolAd"];
    $_SESSION["s_idadmin"] = $data[0]["ida"];
    $_SESSION["s_rol_descripcion3"] = $data[0]["roles"];
}else{
    $_SESSION["s_admin"] = null;  
    $data=null;
}

print json_encode($data);//envio el array final el formato json a AJAX
$conexion=null;