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

$buscar='';

date_default_timezone_set('America/Santo_Domingo');
$DatesantoTime = date('Y-m-d', time());
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mis Conferencia</title>
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

<?php include_once "./php/menu_nada.php"; ?>

<br>
<br>

    <!--<div class="col-lg-1 col-lg-offset-0 col-xs-12 col-xs-offset-0">
        <a class="navbar-brand" href="index.php">
                <img src="images/buscar.png" alt="logo" width="100" height="100"></a>
        </div>-->


    <div >
 


    <div>
<div >
<div class="card">
<div class="card-body">
   <div class="fom_buscar">     
<br>
        
<h3 class="col-lg-5 col-lg-offset-5 col-xs-12 col-xs-offset-0">Mis Conferencia</h3>

<form id="form2" name="form2" method="POST" action="mis_conferencia.php">
        
        
        
        
         

            

                <div>

                        <table class="table">
                                <thead>
                                        
                                                
                                                <div class="col-lg-3 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                <!--<input type="submit" class="btn btn-info" value="Ver"  style="margin-top: 30px;">-->
                                                <button class="btn btn-info mis_conferencia" type="sumit" ><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </div>
                                                <div class="col-lg-6 col-lg-offset-0 col-xs-12 col-xs-offset-0 misconferencia">
                                                <label  class="form-label">Titulo de la Conferencia</label>
                                                
                                                
                                                <input   type="text" class="form-control"  id="buscar" name="buscar" value="<?php  echo $buscar = $_POST["buscar"]?>"  >
                                                    </div>

                                                    <div class="col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0  misconferencia">
                                                <label  class="control-label mesconf">Agregar Conferencia</label>
                                                <a class='btn btn-info' href="formu_conferencia.php" role="button"><i class="fa fa-video-camera" aria-hidden="true">  <i class="fa fa-plus" aria-hidden="true"></i></i></a>
                                                
                                                </div>
                                                

                                                <div class=" col-lg-2 col-lg-offset-2 col-xs-12 col-xs-offset-0 fecha_misconf">

                                        <div class="label_bus" ><label class="control-label">Fecha desde: </label></div>
                                        <input type="date" id="buscafechadesde" name="buscafechadesde"
                                            class="form-control mt-2 select_bus"
                                            value="<?php echo $buscafechadesde=$_POST["buscafechadesde"]; ?>"
                                            style="border: #bababa 1px solid; color:#20558A;">
                                    </div>

                                    <div class="col-lg-2 col-lg-offset-1 col-xs-12 col-xs-offset-0 fecha_misconf">

                                        <div class="label_bus"><label class="control-label">Fecha hasta:</label></div>
                                        <input type="date" id="buscafechahasta" name="buscafechahasta"
                                            class="form-control mt-2 select_bus"
                                            value="<?php echo $buscafechahasta=$_POST["buscafechahasta"]; ?>"
                                            style="border: #bababa 1px solid; color:#20558A;">
                                    </div>

                                        
                                </thead>
                        </table>
                </div>
                <br>
        </div>
        <div class="container mt-5">
        
        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/

        if ($buscar == '' AND $buscafechadesde=='' AND $buscafechahasta==''   ){ $filtro = "";}else{
        if ($buscar != '' AND $buscafechadesde=='' AND $buscafechahasta==''  ){ $filtro = "AND conferencia.titulo_confe LIKE '%".$buscar."%'";}

        if ($buscar == '' AND $buscafechadesde!='' AND $buscafechahasta!=''  ){ $filtro = "  AND fachainicio BETWEEN '" . $buscafechadesde . "' AND '" . $buscafechahasta . "'";}

        if ($buscar != '' AND $buscafechadesde!='' AND $buscafechahasta!=''  ){ $filtro = "  AND fachainicio BETWEEN '" . $buscafechadesde . "' AND '" . $buscafechahasta . "' AND conferencia.titulo_confe LIKE '%".$buscar."%'";}

        if ($buscar == '' AND $buscafechadesde!='' AND $buscafechahasta==''  ){ $filtro = "  AND fachainicio BETWEEN '" . $buscafechadesde . "' AND '" . $DatesantoTime . "'";}

        if ($buscar != '' AND $buscafechadesde!='' AND $buscafechahasta==''  ){ $filtro = "  AND fachainicio BETWEEN '" . $buscafechadesde . "' AND '" . $DatesantoTime . "' AND conferencia.titulo_confe LIKE '%".$buscar."%'";}

        if ($buscar == '' AND $buscafechadesde=='' AND $buscafechahasta!=''  ){ $filtro = " ";}

        if ($buscar != '' AND $buscafechadesde=='' AND $buscafechahasta!=''  ){ $filtro = "AND conferencia.titulo_confe LIKE '%".$buscar."%'";}
        
        }
        $id_med=$_SESSION["s_idme"];
        $sql2=("SELECT conferencia.id_confe,conferencia.titulo_confe,conferencia.autores_confe,conferencia.material_confe,DATE_FORMAT(conferencia.fachainicio,'%Y-%m-%d') AS fechainicio,conferencia.fachainicio,conferencia.fechafinal,conferencia.categoria_confe,
        conferencia.etapa_confe,conferencia.visttas_confe,conferencia.recordatorio,especialidad.espec_descripsion FROM conferencia,especialidad WHERE conferencia.categoria_confe=especialidad.id_espec AND conferencia.id_userme='$id_med' AND conferencia.estado='A' $filtro ");
        $sql= $mysqli->query($sql2);
        $numeroSql = mysqli_num_rows($sql);

        ?>
        
</form>

<div style="
            padding : 4px;
            height : 500px;
            overflow : auto; ">

<div  class="table-responsive">
<p  class="col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0"  style="   color:#20558A"><i class="fa fa-area-chart" aria-hidden="true"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
        <table class="table">
                <tbody >
                <?php while ($rowSql = mysqli_fetch_assoc($sql)){ 
                        
                        $archivo= $rowSql["material_confe"];
                        $fecha2=$rowSql["fachainicio"];
                        $inicial = date_create($fecha2)->format('d/m/y  g:iA');
                        $fecha3=$rowSql["fechafinal"];
                        $final = date_create($fecha3)->format('d/m/y  g:iA');
                        ?>
                    
                        <tr class="col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0" >
                                
                        <td class="col-lg-7">
                        <i class="fa fa-bell" aria-hidden="true"> <?php echo $rowSql["recordatorio"];?></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"> <?php echo $rowSql["visttas_confe"];?>  </i>

                        <br>
                        <h5 style="display: inline;">Titulo:</h5><?php echo $rowSql["titulo_confe"]; ?>   
                        <br><h5 style="display: inline;">Por:</h5> <?php echo $rowSql["autores_confe"]; ?> 
                        <br>
                        <h5 style="display: inline;">Especialidad:</h5> <?php echo $rowSql["espec_descripsion"]; ?> &nbsp;&nbsp; <?php  if ($archivo != '') { echo ('<h5 style="display: inline;"><a href="php/' . $archivo . '"download="sistema-difucion-medica-conferencia"><i class="fa fa-download"></i>Descargar material de apoyo</a></h5>'); }?></td>
                        <td>
                        <h5 style="display: inline;">Desde:</h5><?php echo $inicial; ?>
                        <h5 style="display: inline;">Hasta:</h5><?php echo $final; ?>
                        </td>
                        
                        
                        <?php 
                         echo "
                         <td style=' font-size: 49px;'> <a href='actualizar_conferencia.php?id=" .$rowSql["id_confe"]. "' class='btn btn-success' style='left: 60px; position: relative; font-size: 19px;'   role='button'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>
                         <td style=' font-size: 49px;'> <a onclick='return alereliminarconfe(".$rowSql["id_confe"].");' class='btn btn-danger' style='left: 78px; position: relative; font-size: 19px;'  role='button'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
                        ?>
                        
                        
                        
                        </tr>
               
               <?php } ?>
                </tbody>
        </table>
</div>
</div>


</div>
</div>
</div>
</div>
</div>
</div>

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