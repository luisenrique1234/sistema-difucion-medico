<?php 
include ('conexion.php');


$sql2=("SELECT conferencia.id_confe,conferencia.titulo_confe,conferencia.autores_confe,conferencia.material_confe,conferencia.fachainicio,conferencia.fechafinal,conferencia.categoria_confe,
        conferencia.etapa_confe,conferencia.link_confe,especialidad.espec_descripsion FROM conferencia,especialidad WHERE conferencia.categoria_confe=especialidad.id_espec ");
        $sql= $mysqli->query($sql2);

while ($rowSql = mysqli_fetch_assoc($sql)){ 

    $cambio=true;
    date_default_timezone_set('America/Santo_Domingo');    
    $DatesantoTime = date('Y-m-d H:i:s', time());  

//$date = (new DateTime())->format('Y-m-d g:i:s ');
$fechainicio=$rowSql["fachainicio"];

$fechafinal=$rowSql["fechafinal"];
//dia
$diaini=substr($rowSql["fachainicio"], 8, 3);

$diahoy=substr($DatesantoTime, 8, 3);

//horas 
$horaini=substr($rowSql["fachainicio"],10,3);

$horahoy=substr($DatesantoTime, 10, 3);

//minutos
$minuini=substr($rowSql["fachainicio"],14,2);

$minuhoy=substr($DatesantoTime,14,2);


//fecha final
$diafinal=substr($rowSql["fechafinal"], 8, 3);

//hora
$horafinal=substr($rowSql["fechafinal"],10,3);

//minu
$minufinal=substr($rowSql["fechafinal"],14,2);

//substr($DatesantoTime, 1, 3);




if ($diaini == $diahoy AND $horaini <= $horahoy AND $minuini <= $minuhoy AND $horafinal >= $horahoy AND $minufinal >= $minuhoy AND $rowSql["etapa_confe"]=='Programada') {
    echo"<h3> Es hora de la reunion ".$DatesantoTime."</h3>";
    echo "<script type='text/javascript'>

    (function()
    {
      if( window.localStorage )
      {
        if( !localStorage.getItem('firstLoad') )
        {
          localStorage['firstLoad'] = true;
          window.location.reload();
        }  
        else
          localStorage.removeItem('firstLoad');
      }
    })();
    
    </script>";
    
}

if( $horafinal == $horahoy AND $minufinal == $minuhoy ){
    $cambio=false;
    echo"<h3> Ya terminno la reuncion ".$cambio."</h3>";

}



}




?>




