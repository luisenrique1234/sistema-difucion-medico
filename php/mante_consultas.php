<?php

/* parte donde esta la Consutal de todos las publicaciones de los medico lista de las publicaciones que 
ellos mis han publicado y se extra las mismas */


function lista_medico(){
    include('conexion.php');
    
    
    $sql="SELECT medico.id_medico,medico.nombre_medico,medico.apellido_medico,medico.user_medico,medico.codigo_medico,medico.provincia_me,
    especialidad.espec_descripsion,rol.descripcion FROM medico,especialidad,rol WHERE medico.especialidadm=especialidad.id_espec 
    AND medico.idRol=rol.id_roles AND medico.estado='A' ORDER BY id_medico ASC";
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
    
    
    $sql="SELECT publicacion.id_public,publicacion.titulo_public,publicacion.autor_pu,publicacion.text_public,publicacion.referencia_pu,
    publicacion.link_archivo,publicacion.fecha_public,publicacion.me_gusta_pu,especialidad.espec_descripsion,medico.nombre_medico FROM publicacion,medico,especialidad
     WHERE publicacion.id_medico_pu=medico.id_medico AND publicacion.categoria_public=especialidad.id_espec AND publicacion.estado='A' ORDER BY id_public ASC";
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
    
    
    $sql="SELECT inv_cientifica.id_inv,inv_cientifica.titulo_inv,inv_cientifica.autor_inv,inv_cientifica.resume_inv,inv_cientifica.introducion_inv,inv_cientifica.fecha_inv,
    medico.nombre_medico,especialidad.espec_descripsion FROM inv_cientifica,medico,especialidad  WHERE inv_cientifica.id_medico_inv=medico.id_medico 
    AND inv_cientifica.cotegoria_inv=especialidad.id_espec  AND inv_cientifica.estado='A' ORDER BY id_inv ASC";
    return $result = $mysqli->query($sql);
}
function extraerinvestigacion($id){
    include('conexion.php');
    $sql="SELECT * FROM inv_cientifica where id_inv='$id'";
    return $result = $mysqli->query($sql);
}
?>

<?php

/* lista de conferencia de la base de datos y extrea los medicos*/


function lista_conferencia(){
    include('conexion.php');
    
    
    $sql="SELECT conferencia.id_confe,conferencia.titulo_confe,conferencia.autores_confe,conferencia.link_confe,conferencia.material_confe,conferencia.categoria_confe,
    conferencia.fachainicio,conferencia.fechafinal,conferencia.etapa_confe,conferencia.visttas_confe,
    medico.nombre_medico,especialidad.espec_descripsion FROM conferencia,medico,especialidad  WHERE conferencia.id_userme=medico.id_medico 
    AND conferencia.categoria_confe=especialidad.id_espec  AND conferencia.estado='A' ORDER BY id_confe ASC";
    return $result = $mysqli->query($sql);
}
function extraerconferencia($id){
    include('conexion.php');
    $sql="SELECT * FROM conferencia where id_confe='$id'";
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

<?php

function lista_comentario(){
    include('conexion.php');
    
    
    $sql="SELECT comentario.id_comen,comentario.text_comen,comentario.fecha_comen,comentario.estado,
    CONCAT(medico.nombre_medico,' ',medico.apellido_medico) nombre,publicacion.titulo_public FROM comentario,medico,publicacion WHERE comentario.id_medico_com=medico.id_medico 
    AND comentario.id_public_com=publicacion.id_public AND comentario.estado='A' ORDER BY comentario.id_comen ASC";
    return $result = $mysqli->query($sql);
}
function extraercomentario($id){
    include('conexion.php');
    $sql="SELECT comentario.id_comen,comentario.text_comen,
    CONCAT(medico.nombre_medico,' ',medico.apellido_medico) nombre,publicacion.titulo_public FROM comentario,medico,publicacion WHERE comentario.id_medico_com=medico.id_medico
    AND comentario.id_public_com=publicacion.id_public AND comentario.id_comen='$id'";
    return $result = $mysqli->query($sql);
}
?>

<?php

function lista_espc(){
    include('conexion.php');
    
    
    $sql="SELECT * FROM especialidad WHERE  estado='A' ORDER BY id_espec ASC";
    return $result = $mysqli->query($sql);
}
function extraerespc($id){
    include('conexion.php');
    $sql="SELECT * FROM especialidad where id_espec='$id'";
    return $result = $mysqli->query($sql);
}
?>
