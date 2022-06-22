<?php
error_reporting(0);

/*esta fucion sirve para converti toddos los carateres como acentos en formato
uti-8 indenpedientemente de cual fuera su formato de  origen todo se convertira en 
utf-8 para que asi todos tengan el mismo formato*/
function mostrar($str)
{
    $codi = mb_detect_encoding($str, "ISO-8859-1,UTF-8");
    $str = iconv($codi, 'ISO-8859-1', $str);
    echo substr($str,0,400);
}

session_start();
if ($_SESSION["s_medico"] === null ){
	header("Location: ./login.php");
}else{
    if($_SESSION["s_idRol2"]==3){
        header("Location: ./vistas/pag_error.php");
    }
    
}

$buscar='';
$buscarespec='Todos';

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
    <title>Articulos cientificos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="./contador/css/all.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="css/boton.css">

    <script src="./contador.js"></script>
    <!--<script src="./contador.js"></script>
    Icon-Font
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/ico.png">
    <style>
        /* Color de los enlaces y de mas efectos*/
  a {
    outline: none;
    text-decoration: none;
    padding: 2px 1px 0;
  }
  
  
  a:focus {
    border-bottom: 1px solid;
    background: #cfddff;
  }
  
  a:hover {
    border-bottom: 1px solid;
    background: #F1F1F1;
  }
  

  a {
    -webkit-transition: 300ms;
    -moz-transition: 300ms;
    -o-transition: 300ms;
    transition: 300ms;
  }
    </style>
</head>
<!--/head-->

<body class="dark">


    <!-- menu de la parte superior-->
    <?php include_once "./php/menu.php"; ?>
    <!--/#header-->
    <!--/#action-->


            <br>
            <br>
            
                <div class="fom_buscar">
                    <br>
                    <br>
<h3 class="col-lg-5 col-lg-offset-5 col-xs-12 col-xs-offset-0">Artículos</h3>
                <form id="form2" name="form2" method="POST" action="articulo_cien.php">
                    <div>
                        <table class="table">
                            <thead>
                                <div>
                                    <div class="col-lg-8 col-lg-offset-2 col-xs-12 col-xs-offset-0 ">

                                        <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $buscar=$_POST["buscar"];?>">

                                    </div>
                                    <div class="col-lg-1 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                        <!--<input type="submit" class="btn btn-info" value="Ver"  style="margin-top: 30px;">-->
                                        <button  class="btn btn-info articulo_bus" type="sumit">Buscar</button>
                                    </div>
                                
                                    
                                    <div class="col-lg-2 col-lg-offset-2 col-xs-12 col-xs-offset-0">
                                    <div class="label_bus"><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Categoría: </label></div>
                                        <select  id="assigned-tutor-filter" id="buscarespec" name="buscarespec"
                                            class="form-control mt-2 select_bus">
                                            <?php if ($_POST["buscarespec"] != ''){ ?>
                                            <option value="<?php echo $_POST["buscarespec"]; ?>">
                                                <?php echo $buscarespec=$_POST["buscarespec"]; ?></option>
                                            <?php } ?>
                                            <option value="Todos">Todos</option>
                                            <option value="radiología">radiología </option>
                                            <option value="Pediatria">Pediatria</option>
                                            <option value="Cardiología">Cardiología</option>
                                        </select>
                                    </div>
                                    
                                    <div class=" col-lg-2 col-lg-offset-1 col-xs-12 col-xs-offset-0">

                                        <div class="label_bus" ><label class="control-label">Fecha desde: </label></div>
                                        <input type="date" id="buscafechadesde" name="buscafechadesde"
                                            class="form-control mt-2 select_bus"
                                            value="<?php echo $buscafechadesde=$_POST["buscafechadesde"]; ?>"
                                            style="border: #bababa 1px solid; color:#20558A;">
                                    </div>
                                    <div class="col-lg-2 col-lg-offset-1 col-xs-12 col-xs-offset-0">

                                        <div class="label_bus"><label class="control-label">Fecha hasta:</label></div>
                                        <input type="date" id="buscafechahasta" name="buscafechahasta"
                                            class="form-control mt-2 select_bus"
                                            value="<?php echo $buscafechahasta=$_POST["buscafechahasta"]; ?>"
                                            style="border: #bababa 1px solid; color:#20558A;">
                                    </div>
                                </div>
                            </thead>
                        </table>
                    </div>
                    <!--<div class="col-1">
            <input type="submit" class="btn btn-success" value="Ver" style="margin-top: 38px;">
    </div>--> <br>
                </div>
            
            
    <section class="">
        <div class="container">
            
                <div class="col-md-1 col-sm-1">
                    <div class="sidebar blog-sidebar">
                    </div>
                </div>

                <div class="col-md-10 col-sm-7">


                    <?php
                    include 'php/conexion.php';

                    if ($buscar == ''  AND $buscafechadesde =='' AND $buscarespec =='Todos' ){ $filtro = "";}else{
                       if ($buscar != ''  AND $buscafechadesde =='' AND $buscarespec =='Todos'  ){ $filtro = "AND (publicacion.titulo_public LIKE '%".$buscar."%' OR publicacion.text_public LIKE '%".$buscar."%' OR publicacion.contendio_pdf LIKE '%".$buscar."%' 
                        OR publicacion.etiqueta LIKE '%".$buscar."%' OR publicacion.referencia_pu LIKE '%".$buscar."%')";}
                        

                        
                        //filtro tema
                        if ($buscar == '' AND $buscarespec !='Todos'   AND $buscafechadesde =='' ){ $filtro = "AND especialidad.espec_descripsion = '".$buscarespec."'";}
                        

                        if ($buscar == '' AND $buscarespec !='Todos'   AND $buscafechadesde !='' ){ $filtro = "AND especialidad.espec_descripsion = '".$buscarespec."' AND publicacion.fecha_public BETWEEN '".$buscafechadesde."' AND '".$buscafechahasta."'";}

                        
                        //echo("<h4>$filtro</h4>");
                        //filtro autor

                        //if ($buscar != '' AND $titulobus !='Todos'  AND $buscarespec !='Todos'  ){ $filtro = "AND publicacion.titulo_confe  LIKE '%".$buscar."%' AND conferencia.etapa_confe = '".$titulobus."' AND especialidad.espec_descripsion= '".$buscarespec."' ";}

                        //fecha
                        if ($buscar == '' AND $buscarespec !='Todos' AND $buscafechadesde !='' AND $buscafechahasta==''  ){ $filtro = "AND especialidad.espec_descripsion = '".$buscarespec."' AND publicacion.fecha_public BETWEEN '".$buscafechadesde."' AND '".$DatesantoTime."' ";}
                        
                        //estoy aqui
                        if ($buscar != ''  AND $buscarespec =='Todos' AND $buscafechadesde !='' AND $buscafechahasta=='' ){ $filtro = " AND publicacion.fecha_public BETWEEN '".$buscafechadesde."' AND '".$DatesantoTime."' AND (publicacion.titulo_public LIKE '%".$buscar."%' OR publicacion.text_public LIKE '%".$buscar."%' OR publicacion.contendio_pdf LIKE '%".$buscar."%' 
                            OR publicacion.etiqueta LIKE '%".$buscar."%' OR publicacion.referencia_pu LIKE '%".$buscar."%')";}
                        
                        if ($buscar == '' AND $buscarespec =='Todos' AND $buscafechadesde !='' AND $buscafechahasta==''  ){ $filtro = " AND publicacion.fecha_public BETWEEN '".$buscafechadesde."' AND '".$DatesantoTime."' ";}
                        

                        if ($buscar != ''   AND $buscarespec !='Todos' AND $buscafechadesde !=''  ){ $filtro = " AND especialidad.espec_descripsion = '".$buscarespec."' AND publicacion.fecha_public BETWEEN '".$buscafechadesde."' AND '".$buscafechahasta."' AND (publicacion.titulo_public LIKE '%".$buscar."%' OR publicacion.text_public LIKE '%".$buscar."%' OR publicacion.contendio_pdf LIKE '%".$buscar."%' 
                            OR publicacion.etiqueta LIKE '%".$buscar."%' OR publicacion.referencia_pu LIKE '%".$buscar."%')";}

                        if ($buscar != ''  AND $buscarespec !='Todos' AND $buscafechadesde !='' AND $buscafechahasta=='' ){ $filtro = " AND especialidad.espec_descripsion = '".$buscarespec."' AND publicacion.fecha_public BETWEEN '".$buscafechadesde."' AND '".$DatesantoTime."' AND (publicacion.titulo_public LIKE '%".$buscar."%' OR publicacion.text_public LIKE '%".$buscar."%' OR publicacion.contendio_pdf LIKE '%".$buscar."%' 
                            OR publicacion.etiqueta LIKE '%".$buscar."%' OR publicacion.referencia_pu LIKE '%".$buscar."%') ";}
                        
                        if ($buscar != '' AND $buscarespec !='Todos'  AND $buscafechadesde =='' ){ $filtro = "AND especialidad.espec_descripsion = '".$buscarespec."' AND (publicacion.titulo_public LIKE '%".$buscar."%' OR publicacion.text_public LIKE '%".$buscar."%' 
                            OR publicacion.contendio_pdf LIKE '%".$buscar."%' OR publicacion.etiqueta LIKE '%".$buscar."%' OR publicacion.referencia_pu LIKE '%".$buscar."%')";}
                        //echo("<h4>$filtro</h4>");
                        }

                    //$espesicialidad =$_SESSION["s_espeme"];
                    $public = "SELECT publicacion.id_public,publicacion.titulo_public,publicacion.text_public,publicacion.link_imagen,publicacion.link_video,
                    publicacion.link_audio,publicacion.link_archivo,DATE_FORMAT(publicacion.fecha_public,'%d/%m/%y') AS fecha,publicacion.categoria_public,publicacion.me_gusta_pu,publicacion.referencia_pu,medico.link_foto,medico.id_medico,
                    CONCAT(medico.nombre_medico,' ',medico.apellido_medico) nombreme,especialidad.espec_descripsion FROM publicacion,medico,especialidad WHERE publicacion.id_medico_pu=medico.id_medico  AND publicacion.estado='A' AND publicacion.estado_articulo='Publico' AND publicacion.categoria_public=especialidad.id_espec $filtro";
                    $public2 = $mysqli->query($public);
                    while ($res = mysqli_fetch_array($public2)) {
                        $link_foto = $res['link_foto'];
                        $video = $res['link_video'];
                        $audio = $res['link_audio'];
                        $fecha = $res['fecha'];
                        $archivo = $res['link_archivo'];
                        $nombre = $res['nombreme'];
                        $backslash='\\'; 

                    ?>
                    </form>
                    <!--animacion js wow fadeInDowm de las publicaciones-->
                    <div class="wow fadeInDown">
                                <div class="single-blog two-column">
                                        <h2> <?php  echo("<a href='mostra_articulo.php?id=".$res["id_public"]."'>".$res['titulo_public']. "</a>");?></h2>
                                        <p><?php mostrar($res['text_public']); ?></p>
                                        <?php echo '<h5 style="display: inline;"><a target="__blank" href="/medico-red/perfilmedico/pefiles_me.php?id='.$res["id_medico"].'">Subido por:  <img style="border-radius: 30px; position: relative; top: -4px;" src="'.$backslash.'medico-red'.$backslash.'php'.$backslash.'imagenes-perfil'.$backslash.''.$link_foto. '" alt="" width="24" height="24"/>&nbsp;' .$nombre. '</a></h5>' ?> <?php echo ("<h5 style='display: inline;'>&nbsp;&nbsp;Publicado él: $fecha <i class='fa fa-clock-o'></i> </h5>"); ?>
                                        <h5 style="display: inline;">&nbsp;&nbsp; Comentarios: 3 <i class="fa fa-comments"></i></h5> 
                                        <h5 style="display: inline;">&nbsp;&nbsp; Me gustas: <?php mostrar($res['me_gusta_pu']);?>  <i class="fa fa-heart" aria-hidden="true"></i></h5>
                                        <h5 style="display: inline;">&nbsp;&nbsp;Categoría: <a href="#"><?php mostrar($res['espec_descripsion']); ?> <i class="fa fa-tag"></i></a></h5> 
                                        
                                </div>
                        
                    </div>
                    <?php
                    }
                    ?>

                    <!--boton flotante donde esta los diferentes acciones -->
                    <div class="con">
                        <?php include_once "./php/boton_medico.php"; ?>
                    </div>
                    <!--*******************************************************-->
                    <!--zona de paginacion de la pagina
                        <div class="blog-pagination">
                        <ul class="pagination">
                            <li><a href="#">left</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">9</a></li>
                            <li><a href="#">right</a></li>
                        </ul>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->
    <footer id="footer">
        <div class="container">
            <div class="row footer">
                <div class="col-sm-12 ">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p>Sistema de difusión de información médica 2022. Todos los derechos reservados.</p>
                            <p>Diseñado por: <a target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <!--/#footer-->





    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/medico_alerta.js"></script>
    <!--LUgar donde esta el ativador del modo oscuro -->
    <script type="text/javascript" src="js/temad.js"></script>
    <!-- archivos descargado de CDN sweetalert2 icon fontawesome y jquery 3 6 0 -->
    <script type="text/javascript" src="js/sweetalert2@11.js"></script>
    <script type="text/javascript" src="js/fontawesome.js"></script>
    <script type="text/javascript" src="js/code-jquery-3-6-0.js"></script>
</body>

</html>