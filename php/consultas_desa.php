<?php 

function lista_medicodesa(){
    include('conexion.php');
    
    
    $sql="SELECT * FROM medico WHERE estado='I' ORDER BY id_medico ASC";
    return $result = $mysqli->query($sql);
}
?>