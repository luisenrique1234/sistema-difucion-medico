<?php include ('php/conexion.php'); ?>

<?php


// Desactivar toda notificación de error si quieres ver los errores tienes que quitar esta linea
error_reporting(0);



/*esta fucion sirve para converti toddos los carateres como acentos en formato
uti-8 indenpedientemente de cual fuera su formato de  origen todo se convertira en 
utf-8 para que asi todos tengan el mismo formato*/
function mostrar($str)
{
    $codi = mb_detect_encoding($str, "ISO-8859-1,UTF-8");
    $str = iconv($codi, 'ISO-8859-1', $str);
    echo $str;
}

session_start();
if ($_SESSION["s_medico"] === null){
	header("Location: ./login.php");
}else{
    if($_SESSION["s_idRol2"]==3){
        header("Location: ./vistas/pag_error.php");
    }
}

//$page = $_SERVER['PHP_SELF'];
//$sec = "2";
//header("Refresh: $sec; url=$page");

$buscar='';
$buscaetapa='Todos';
$buscarespec='Todos';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Conferencia</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/boton.css">
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/ico.png">
</head>
<!--/head-->
<body class="dark">

<?php include_once "./php/menu.php"; ?>

<br>
<br>
<br>
<br>

    <!--<div class="col-lg-1 col-lg-offset-0 col-xs-12 col-xs-offset-0">
        <a class="navbar-brand" href="index.php">
                <img src="images/buscar.png" alt="logo" width="100" height="100"></a>
        </div>-->

<div class="container mt-5">
    <div >
 


    <div>
<div >
<div class="card">
<div class="card-body">

        
<h3 class="col-lg-5 col-lg-offset-5 col-xs-12 col-xs-offset-0">Conferencia</h3>

<form id="form2" name="form2" method="POST" action="conferencia_me.php">
        
        <div>

        
         

            

                <div>

                        <table class="table">
                                <thead>
                                        <div>
                                                <div class="col-lg-2 col-lg-offset-1 col-xs-12 col-xs-offset-0">    
                                                <label  class="control-label">Filtrar por Actividad</label>
                                                        <select  id="assigned-tutor-filter" id="buscaetapa" name="buscaetapa" class="form-control mt-2">
                                                                <?php if ($_POST["buscaetapa"] != ''){ ?>
                                                                <option value="<?php echo $_POST["buscaetapa"]; ?>"><?php echo $buscaetapa= $_POST["buscaetapa"]; ?></option>
                                                                <?php } ?>
                                                                <option value="Todos">Todos</option>
                                                                <option value="En vivo">En vivo</option>
                                                                <option value="Programada">Progrmadas</option>
                                                        </select>
                                                </div>
                                                <div class="col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                <label  class="control-label">Filtrar por Especialidades</label>
                                                        <select  id="subject-filter" id="buscarespec" name="buscarespec" class="form-control mt-2">
                                                                <?php if ($_POST["buscarespec"] != ''){ ?>
                                                                <option value="<?php echo $_POST["buscarespec"]; ?>"><?php echo $buscarespec= $_POST["buscarespec"]; ?></option>
                                                                <?php } ?>
                                                                <option value="Todos">Todos</option>
                                                                <option value="General">General</option>
                                                                <option value="Cirugia general">Cirugia general</option>
                                                                <option value="Pediatria">Pediatria</option>
                                                                <option value="Cardiologia">Cardiología</option>
                                                        </select>
                                                </div>
                                                <div class="col-lg-1 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                <!--<input type="submit" class="btn btn-info" value="Ver"  style="margin-top: 30px;">-->
                                                <button class="btn btn-info conferencia" type="sumit" ><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </div>
                                                <div class="col-lg-4 col-lg-offset-0 col-xs-12 col-xs-offset-0 ">
                                                <label  class="form-label">Titulo de la Conferencia</label>
                                                
                                                
                                                <input   type="text" class="form-control"  id="buscar" name="buscar" value="<?php  echo $buscar = $_POST["buscar"]?>"  >
                                                
                                                    </div>
                                        </div>
                                </thead>
                        </table>
                </div>
                
        </div>

        
        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/
        
        if ($buscar == '' AND $buscaetapa =='Todos' AND $buscarespec =='Todos' ){ $filtro = "";}else{
        if ($buscar != '' AND $buscaetapa =='Todos'  AND $buscarespec =='Todos'  ){ $filtro = "AND conferencia.titulo_confe LIKE '%".$buscar."%'";}
        
        if ($buscar == '' AND $buscaetapa !='Todos'  AND $buscarespec =='Todos'  ){ $filtro = "AND conferencia.etapa_confe = '".$buscaetapa."'";}
        
        //echo("<h4>$filtro</h4>");
        if ($buscar != '' AND $buscaetapa !='Todos'  AND $buscarespec =='Todos'  ){ $filtro = "AND conferencia.titulo_confe LIKE '%".$buscar."%' AND conferencia.etapa_confe = '".$buscaetapa."'";}
        
        if ($buscar == '' AND $buscaetapa !='Todos'  AND $buscarespec !='Todos'  ){ $filtro = "AND conferencia.etapa_confe   = '".$buscaetapa."' AND especialidad.espec_descripsion = '".$buscarespec."' ";}
        
        if ($buscar != '' AND $buscaetapa !='Todos'  AND $buscarespec !='Todos'  ){ $filtro = "AND conferencia.titulo_confe  LIKE '%".$buscar."%' AND conferencia.etapa_confe = '".$buscaetapa."' AND especialidad.espec_descripsion= '".$buscarespec."' ";}
        
        
        if ($buscar == '' AND $buscarespec !='Todos'  AND $buscaetapa =='Todos' ){ $filtro = "AND especialidad.espec_descripsion = '".$buscarespec."'";}
        
        if ($buscar != '' AND $buscarespec !='Todos' AND $buscaetapa =='Todos' ){ $filtro = "AND conferencia.titulo_confe  LIKE '%".$buscar."%' AND especialidad.espec_descripsion = '".$buscarespec."'";}
        
        }

        $sql2=("SELECT conferencia.id_confe,conferencia.titulo_confe,conferencia.autores_confe,conferencia.material_confe,conferencia.fachainicio,conferencia.fechafinal,conferencia.categoria_confe,
        conferencia.etapa_confe,conferencia.recordatorio,conferencia.link_confe,conferencia.visttas_confe,especialidad.espec_descripsion FROM conferencia,especialidad WHERE conferencia.categoria_confe=especialidad.id_espec $filtro ");
        $sql= $mysqli->query($sql2);
        $numeroSql = mysqli_num_rows($sql);

        ?>
        
</form>

<div style="
            padding : 4px;
            height : 500px;
            overflow : auto; ">


<div  class="table-responsive">
<p  class="col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0"  style="   color:rgb(94, 200, 214);"><i class="fa fa-area-chart" aria-hidden="true"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
        <table class="table">
                <tbody >
                
                <?php while ($rowSql = mysqli_fetch_assoc($sql)){ 
                        $archivo= $rowSql["material_confe"];
                        $titulo2=$rowSql["titulo_confe"];
                        $fecha2=$rowSql["fachainicio"];
                        $inicial = date_create($fecha2)->format('d/m/y  g:iA');
                        $fecha3=$rowSql["fechafinal"];
                        $final = date_create($fecha3)->format('d/m/y  g:iA');

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

                        ?>
                        <tr class="col-lg-8 col-lg-offset-1 col-xs-12 col-xs-offset-0" >
                        <td class="col-lg-8" ><h4 style="display: inline;">Titulo:</h4><?php echo  $rowSql["titulo_confe"]; ?>    
                        <br><h5 style="display: inline;">Por:</h5> <?php echo $rowSql["autores_confe"]; ?> 
                        <br>
                        <h5 style="display: inline;">Especialidad:</h5> <?php echo $rowSql["espec_descripsion"]; ?>
                        &nbsp;&nbsp; <?php  if ($archivo != '') { echo ('<h5 style="display: inline;"><a href="php/' . $archivo . '"download="sistema-difucion-medica-conferencia"><i class="fa fa-download"></i>Descargar material de apoyo</a></h5>'); }?> </td>
                        <td>
                        <h5 style="display: inline;">Desde:</h5><?php echo $inicial; ?>
                        <h5 style="display: inline;">Hasta:</h5><?php echo $final; ?>     
                        </td>
                         
                        

                        <?php 
                        if ($rowSql["etapa_confe"]=='En vivo' ) {
                         echo "<td style='text-align: center; font-size: 49px;'> <a class='btn btn-info' style='left: 60px; position: relative; font-size: 19px;' href='php/rec_suma_link.php?accion=VISITA&id=".$rowSql["id_confe"]."&vist=".++$rowSql["visttas_confe"]."&linkd=".$rowSql["link_confe"]."&acciones=no'target='_blank'  role='button'><i class='fa fa-youtube-play' aria-hidden='true'></i></a></td>";
                           
                         if( $horafinal == $horahoy AND $minufinal == $minuhoy ){
                                echo"<h3> Ya terminno la reuncion ".$minufinal."</h3>";
                                echo'
<script type="text/javascript">
    Swal.fire({
title: "<h3>ya termino la conferencia</h3>",
icon: "warning",
showCancelButton: true,
confirmButtonColor: "#45bcdb",
confirmButtonText: "<h5>Sí</h5>",
cancelButtonText: "<h5>Cancelar</h5>"
})
.then((result) => {
if (result.value) {
window.location.href = "php/pcientifico.php?accion=DLT&id="
}
});

    </script>';
                                
                                
                                        
                            } 
                        }elseif( $rowSql["etapa_confe"]=='Programada'){
                                echo "<td style='text-align: center; font-size: 49px;'> <a class='btn btn-info' style='left: 78px; position: relative; font-size: 19px;' onclick='return recordatorio();' href='php/rec_suma_link.php?accion=INSREC&id=".$rowSql["id_confe"]."&acciones=SUMA&rec=".++$rowSql["recordatorio"]."'  role='button'><i class='fa fa-calendar-plus-o' aria-hidden='true'></i></a></td>";
                                
                                if ($diaini == $diahoy AND $horaini <= $horahoy AND $minuini <= $minuhoy AND $horafinal >= $horahoy AND $minufinal >= $minuhoy ) {
                                        echo"<h3> Es hora de la reunion ".$DatesantoTime."</h3>";
                                        
                                        $codigo=$rowSql["id_confe"];
                                        $sql="
                                        UPDATE `conferencia` SET
                                            `etapa_confe`='En vivo'
                                        WHERE
                                             id_confe='$codigo'";

                                        if($mysqli->query($sql)){
                                            $status='successdlt';
                                        }

                                        
                                        }
                                                                        
                        }elseif( $rowSql["etapa_confe"]=='Terminada'){
                                echo "<td style='text-align: center; font-size: 49px;'> <a class='btn btn-info' style='left: 78px; position: relative; font-size: 19px;' href='vistas/error_confe.php'  role='button'><i class='fa fa-times' aria-hidden='true'></i></a></td>";

                        }
                        ?>
                        
                        </tr>
               
               <?php } ?>
                </tbody>
        </table>
</div>
</div>
<!--<div id="pruebarecarga"></div>-->


</div>
</div>
</div>
</div>


<!--boton flotante donde esta los diferentes acciones -->
        <div class="con">
        <?php include_once "./php/boton_medico.php"; ?>
        </div>
        <!--*******************************************************-->


    </div>
</div>
<script>
/*$(document).ready(function() {
      var refreshId =  setInterval( function(){
    $('#pruebarecarga').load('php/refrecar_conferecia.php');
   }, 8000 );
});*/

</script>

<script>

	function recordatorio(){

		var respuesta = confirm ("Estas seguro de activar Recordatorio para esta conferencia");
		
		if (respuesta == true)
		{
			return true;
		}
		else
		{
			
			return false;

		}

	
}


</script>

</script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/medico_alerta.js"></script>
    <!--LUgar donde esta el ativador del modo oscuro -->
    <script type="text/javascript" src="js/temad.js"></script>

</body>
</html>