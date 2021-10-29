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

