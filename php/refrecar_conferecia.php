<?php 
include ('conexion.php');


$sql2=("SELECT conferencia.id_confe,conferencia.titulo_confe,conferencia.autores_confe,conferencia.material_confe,conferencia.fachainicio,conferencia.fechafinal,conferencia.categoria_confe,
        conferencia.etapa_confe,conferencia.link_confe FROM conferencia,medico,recordatorio WHERE conferencia.id_confe=recordatorio.id_confererec AND medico.id_medico=recordatorio.id_medicorec");
        $sql= $mysqli->query($sql2);

while ($rowSql = mysqli_fetch_assoc($sql)){ 

    $cambio=true;
    date_default_timezone_set('America/Santo_Domingo');    
    $DatesantoTime = date('Y-m-d H:i:s', time());  
    $link=$rowSql["link_confe"];
    $titulo=$rowSql["titulo_confe"];
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
    //echo"<h3> Es hora de la reunion ".$DatesantoTime."</h3>";
    echo'
<script type="text/javascript">
    Swal.fire({
title: "<h3>La conferencia de '.$titulo.' ha comenzado desea ir</h3>",
icon: "warning",
showCancelButton: true,
confirmButtonColor: "#45bcdb",
confirmButtonText: "<h5>Sí</h5>",
cancelButtonText: "<h5>Cancelar</h5>"
})
.then((result) => {
if (result.value) {
window.location.href = "'.$link.'"
}
});

    </script>';
    
}




}

?>

<?php

include ('conexion.php');


$sql2=("SELECT conferencia.id_confe,conferencia.titulo_confe,conferencia.fachainicio,conferencia.fechafinal,
        conferencia.etapa_confe FROM conferencia ");
        $sql= $mysqli->query($sql2);

while ($rowSql = mysqli_fetch_assoc($sql)){ 

    $cambio=true;
    date_default_timezone_set('America/Santo_Domingo');    
    $DatesantoTime = date('Y-m-d H:i:s', time());
    $titulo=$rowSql["titulo_confe"];
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
//$titulo=$rowSql["titulo_confe"];
//echo"<h3>parte dos:".$titulo."</h3>";


if ($diaini == $diahoy AND $horaini <= $horahoy AND $minuini <= $minuhoy AND $horafinal >= $horahoy AND $minufinal >= $minuhoy AND $rowSql["etapa_confe"]=='Programada') {


    $codigo=$rowSql["id_confe"];
    $sql="
    UPDATE `conferencia` SET
        `etapa_confe`='En vivo'
    WHERE
         id_confe='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    
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

if( $horafinal == $horahoy AND $minufinal == $minuhoy AND $rowSql["etapa_confe"]=='En vivo' ){
    //$cambio=false;
    //echo"<h3> Ya terminno la reuncion ".$cambio."</h3>";
    $codigo=$rowSql["id_confe"];
                                        $sql="
                                        UPDATE `conferencia` SET
                                            `etapa_confe`='Terminada'
                                        WHERE
                                             id_confe='$codigo'";

                                        if($mysqli->query($sql)){
                                            $status='successdlt';
                                        }

        echo "<script type='text/javascript'>

    (function()
    {
      if( window.localStorage )
      {
        if( !localStorage.getItem('firstLoads') )
        {
          localStorage['firstLoads'] = true;
          window.location.reload();
        }  
        else
          localStorage.removeItem('firstLoads');
      }
    })();
    
    </script>";

}



}



?>


