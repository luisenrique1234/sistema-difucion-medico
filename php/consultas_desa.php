<?php 

function lista_medicodesa(){
    include('conexion.php');
    
    
    $sql="SELECT medico.id_medico,medico.nombre_medico,medico.apellido_medico,medico.user_medico,medico.codigo_medico,medico.provincia_me,
    especialidad.espec_descripsion,rol.descripcion FROM medico,especialidad,rol WHERE medico.especialidadm=especialidad.id_espec 
    AND medico.idRol=rol.id_roles AND medico.estado='I' ORDER BY id_medico ASC";
    return $result = $mysqli->query($sql);
}
?>

<?php

/* lista de conferencia de la base de datos y extrea los medicos*/


function lista_conferenciadasa(){
    include('conexion.php');
    
    
    $sql="SELECT conferencia.id_confe,conferencia.titulo_confe,conferencia.autores_confe,conferencia.link_confe,conferencia.material_confe,conferencia.categoria_confe,
    conferencia.fachainicio,conferencia.fechafinal,conferencia.etapa_confe,conferencia.visttas_confe,
    medico.nombre_medico,especialidad.espec_descripsion FROM conferencia,medico,especialidad  WHERE conferencia.id_userme=medico.id_medico 
    AND conferencia.categoria_confe=especialidad.id_espec  AND conferencia.estado='I' ORDER BY id_confe ASC";
    return $result = $mysqli->query($sql);
}
?>


<?php 
function lista_pudestivado(){
    include('conexion.php');
    
    
    $sql="SELECT publicacion.id_public,publicacion.titulo_public,publicacion.autor_pu,publicacion.text_public,publicacion.referencia_pu,
    publicacion.link_archivo,publicacion.fecha_public,publicacion.tipo_archivo,publicacion.me_gusta_pu,especialidad.espec_descripsion,medico.nombre_medico FROM publicacion,medico,especialidad
     WHERE publicacion.id_medico_pu=medico.id_medico AND publicacion.categoria_public=especialidad.id_espec AND publicacion.estado='I' ORDER BY id_public ASC";
    return $result = $mysqli->query($sql);
}


?>