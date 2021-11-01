<?php

/* parte donde esta la Consutal de todos las publicaciones de los medico lista de las publicaciones que 
ellos mis han publicado y se extra las mismas */


function lista_medico(){
    include('conexion.php');
    
    
    $sql="SELECT * FROM medico WHERE estado='A' ORDER BY id_medico ASC";
    return $result = $mysqli->query($sql);
}
function extraermedico($id){
    include('conexion.php');
    $sql="SELECT * FROM medico where id_medico='$id'";
    return $result = $mysqli->query($sql);
}
?>

<?php 

function lista_public(){
    include('conexion.php');
    
    
    $sql="SELECT * FROM publicacion WHERE estado='A' ORDER BY id_public ASC";
    return $result = $mysqli->query($sql);
}
function extraerpubic($id){
    include('conexion.php');
    $sql="SELECT * FROM publicacion where id_public='$id'";
    return $result = $mysqli->query($sql);
}


?>

<?php

/* parte donde esta la Consutal de todos las publicaciones de los medico lista de las publicaciones que 
ellos mis han publicado y se extra las mismas */


function lista_invstigacion(){
    include('conexion.php');
    
    
    $sql="SELECT * FROM inv_cientifica WHERE  estado='A' ORDER BY id_inv ASC";
    return $result = $mysqli->query($sql);
}
function extraerinvestigacion($id){
    include('conexion.php');
    $sql="SELECT * FROM inv_cientifica where id_inv='$id'";
    return $result = $mysqli->query($sql);
}
?>

<?php




function lista_rol(){
    include('conexion.php');
    
    
    $sql="SELECT * FROM rol WHERE  estado='A' ORDER BY id_roles ASC";
    return $result = $mysqli->query($sql);
}
function extraerrol($id){
    include('conexion.php');
    $sql="SELECT * FROM rol where id_roles='$id'";
    return $result = $mysqli->query($sql);
}
?>
