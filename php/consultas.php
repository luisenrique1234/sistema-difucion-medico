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

<?php

/* donde se muestra las consultas de los perfiles de los medicos */


function perfil_medico(){
    include('conexion.php');
    
    $id_med=$_SESSION["s_idme"];
    $sql="SELECT medico.id_medico, CONCAT(medico.nombre_medico,' ',medico.apellido_medico) nombreme,medico.user_medico,medico.link_foto,medico.contrasena_me,especialidad.espec_descripsion,
    medico.email_me,medico.lugar_trabajo,medico.area_me,medico.cargo_me,medico.experiencia_me FROM medico,especialidad 
    WHERE medico.id_medico ='$id_med' AND medico.especialidadm=especialidad.id_espec AND medico.estado='A'";
    return $result = $mysqli->query($sql);
}
function extraerperfil_medico($id){
    include('conexion.php');
    $sql="SELECT * FROM medico  where id_medico='$id'";
    return $result = $mysqli->query($sql);
}
?>



<?php

/* parte donde esta la Consutal de todos las publicaciones de los medico lista de las publicaciones que 
ellos mis han publicado y se extra las mismas */



function extraerconferencia($id){
    include('conexion.php');
    $sql="SELECT * FROM conferencia where  	id_confe='$id'";
    return $result = $mysqli->query($sql);
}
?>
