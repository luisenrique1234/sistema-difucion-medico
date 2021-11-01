<?php
session_start();
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password);
//$pass = ($password);

$consulta = "SELECT medico.id_medico AS idme, medico.idRol AS idRol, rol.descripcion AS rol2,medico.especialidadm AS espe,medico.apellido_medico AS apelli,
medico.codigo_medico AS codigome FROM medico JOIN rol ON medico.idRol = rol.id_roles WHERE user_medico='$usuario' AND contrasena_me='$pass' ";	
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 


if($resultado->rowCount() >= 1){ 
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);    
    $_SESSION["s_medico"] = $usuario;
    $_SESSION["s_idme"] = $data[0]["idme"];

    $_SESSION["s_espeme"] = $data[0]["espe"];

    $_SESSION["s_apellido"] = $data[0]["apelli"];

    $_SESSION["s_codime"] = $data[0]["codigome"];

    $_SESSION["s_idRol2"] = $data[0]["idRol"];
    $_SESSION["s_rol_descripcion2"] = $data[0]["rol2"];
}else{
    $_SESSION["s_medico"] = null;  
    $data=null;
}

print json_encode($data);//envio el array final el formato json a AJAX
$conexion=null;