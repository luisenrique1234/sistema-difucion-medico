<?php

/* parte donde esta la Consutal de todos las publicaciones de los medico lista de las publicaciones que 
ellos mis han publicado y se extra las mismas */


function lista_publicacion(){
    include('conexion.php');
    
    $id_med=$_SESSION["s_idme"];
    $sql="SELECT * FROM publicacion WHERE id_medico_pu='$id_med' AND estado='A' ORDER BY fecha_public DESC";
    return $result = $mysqli->query($sql);
}
function extraerpublic($id){
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
    
    $id_med=$_SESSION["s_idme"];
    $sql="SELECT * FROM inv_cientifica WHERE id_medico_inv='$id_med' AND estado='A' ORDER BY fecha_inv DESC";
    return $result = $mysqli->query($sql);
}
function extraerinvestigacion($id){
    include('conexion.php');
    $sql="SELECT * FROM inv_cientifica where id_inv='$id'";
    return $result = $mysqli->query($sql);
}
?>

