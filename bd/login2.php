<?php
session_start();
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password);
#$pass = ($password);

$consulta = "SELECT alum_user.idRolA AS idRolA, roles.descripcion AS rol FROM alum_user JOIN roles ON alum_user.idRolA = roles.id_roles WHERE user_alum='$usuario' AND pass='$pass' ";	
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 


if($resultado->rowCount() >= 1){ 
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);    
    $_SESSION["s_usuario2"] = $usuario;    
    $_SESSION["s_idRol2"] = $data[0]["idRol"];
    $_SESSION["s_rol_descripcion2"] = $data[0]["rol"];
}else{
    $_SESSION["s_usuario2"] = null;  
    $data=null;
}

print json_encode($data);//envio el array final el formato json a AJAX
$conexion=null;