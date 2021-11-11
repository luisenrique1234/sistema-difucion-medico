<?php 

function lista_medicodesa(){
    include('conexion.php');
    
    
    $sql="SELECT medico.id_medico,medico.nombre_medico,medico.apellido_medico,medico.user_medico,medico.codigo_medico,medico.provincia_me,
    especialidad.espec_descripsion,rol.descripcion FROM medico,especialidad,rol WHERE medico.especialidadm=especialidad.id_espec 
    AND medico.idRol=rol.id_roles AND medico.estado='I' ORDER BY id_medico ASC";
    return $result = $mysqli->query($sql);
}
?>