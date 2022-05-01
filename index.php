<?php


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
if ($_SESSION["s_medico"] === null ){
	header("Location: ./login.php");
}else{
    if($_SESSION["s_idRol2"]==3){
        header("Location: ./vistas/pag_error.php");
    }
    
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistama de divulgacion médico</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <!--<link href="css/font-awesome.min.css" rel="stylesheet">-->
   <link href="./contador/css/all.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="css/boton.css">
    <link rel="stylesheet" href="css/inicio_ico.css">

    <script src="./contador.js"></script>
    <!--Icon-Font
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>-->

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
   

<!-- menu de la parte superior-->
<?php include_once "./php/menu_inicio.php"; ?>
    <!--/#header-->
    <!--id la imagen de triangulor que se usa para el inicio
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div>
                        <div class="col-sm-12">
                            <h3 class="title">Inicio</h3>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </section>-->

    <!--<div class="blog-pagination">
    <div class="pagination">
   

<div class="form-inline d-flex justify-content-center md-form form-sm mt-0">
  <div class="form-outline">
  <button id="search-button" type="button" class="btn btn-info">
    <i class="fas fa-search"></i>
  </button>
    <input id="search-input" type="search" id="form1" class="form-control" placeholder="buscar" />
  </div>
  
</div>
    </div>
    </div>-->

    <!--/#action-->

    <div style="background-image: url(images/eventos.jpg); background-size: 100%;">
    <br>
        <br>
        <br>
        <br>
        <div class="container">
        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/
        $sql2=("SELECT  conferencia.id_confe,conferencia.titulo_confe,conferencia.autores_confe,conferencia.material_confe,conferencia.fachainicio,conferencia.fechafinal,conferencia.categoria_confe,
        conferencia.etapa_confe,conferencia.visttas_confe,conferencia.link_confe,especialidad.espec_descripsion FROM conferencia,especialidad WHERE conferencia.categoria_confe=especialidad.id_espec  AND conferencia.estado='A'  ORDER BY conferencia.fachainicio DESC LIMIT 0,9  ");
        $sql= $mysqli->query($sql2);
        //$numeroSql = mysqli_num_rows($sql);

        ?>

    <h3 class="text-muted" style="color: #20558A;"><i class="fa fa-youtube-play"></i> Conferencias en Cursos</h3>
    <br>
               <main>
                <?php while ($rowSql = mysqli_fetch_assoc($sql)){ 
                        
                        $archivo= $rowSql["material_confe"];
                        $link_reunion= $rowSql["link_confe"];
                        $titulo_con=substr($rowSql["titulo_confe"],0,30);
                        $fecha2=$rowSql["fachainicio"];
                        $inicial = date_create($fecha2)->format('d/m/y  g:iA');
                        $fecha3=$rowSql["fechafinal"];
                        $final = date_create($fecha3)->format('d/m/y  g:iA');
                        ?>
                               <table>

                        <div class="col-lg-7 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                            <tr>
                                <th>
                            <div class="imag-ultim text-center">
                        <img src="images/play4.png"  width="75" height="75">
                        <br>
                        <h4 style="display: inline;"><?php echo (' <a href="'.$rowSql["link_confe"].'" target="_blank"> '.$titulo_con. '</a>');?></h4>
                        <br><h5 style="display: inline;">Autor: </h5> <?php echo substr($rowSql["autores_confe"],0,25); ?><?php echo(' <a href="'.$rowSql["link_confe"].'" target="_blank"> <i class="fa fa-external-link"></i></a>');?>
                        <br>
                        <h5 style="display: inline;">Tema:</h5> <?php echo $rowSql['espec_descripsion']; ?> &nbsp;&nbsp; <?php  if ($archivo != '') { echo ('<h5 style="display: inline;"><a href="php/' . $archivo . '"download="sistema-difucion-medica-conferencia"><i class="fa fa-download"></i></a></h5>'); }?> </h5><?php echo $inicial; ?>
                        </div>
                        </th>
                        </tr>
                        <br>
                    </div>
                </table>
                
               <?php } ?>
        </div>
        <br>
</div>
                </main>
        
        <br>
        <br>
        <div class="container">
        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/
        $sql2=("SELECT publicacion.id_public,publicacion.titulo_public,publicacion.text_public,publicacion.link_imagen,publicacion.link_video,
        publicacion.link_audio,publicacion.link_archivo,DATE_FORMAT(publicacion.fecha_public,'%d/%m/%y') AS fecha,publicacion.categoria_public,publicacion.me_gusta_pu,publicacion.referencia_pu,
        medico.nombre_medico,medico.apellido_medico,especialidad.espec_descripsion FROM publicacion,medico,especialidad WHERE publicacion.id_medico_pu=medico.id_medico  AND publicacion.estado='A' AND publicacion.categoria_public=especialidad.id_espec ORDER BY publicacion.fecha_public DESC LIMIT 0,8  ");
        $sql= $mysqli->query($sql2);
        //$numeroSql = mysqli_num_rows($sql);
        ?>
    <h3><i class="fa fa-hourglass-end"></i> Últimos Artículos</h3>
        
               <div class="columno3">
                <?php while ($rowSql = mysqli_fetch_assoc($sql)){ 
                        
                        //$link_imagen = $res['link_imagen'];
                        $titulo_art = substr($rowSql['titulo_public'],0,30);
                        $audio = $rowSql['link_audio'];
                        $fecha = $rowSql['fecha'];
                        $archivo2 = $rowSql['link_archivo'];
                        $nombre = $rowSql['nombre_medico'];
                        $apellido = $rowSql['apellido_medico'];
                        ?>
                        <table>
                                
                        <div class="col-lg-12 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                        
                        
                        <tr>
                        <th>
                        <h4><?php echo (' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> '.$titulo_art. '</a>');?></h4>
                        <h5 style="display: inline;">Autor: </h5> <?php echo '' . $nombre . " " . $apellido . '' ?><?php echo(' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> <i class="fa fa-external-link"></i></a>');?>
                        <br>
                        <h5 style="display: inline;">Tema:</h5> <?php echo $rowSql['espec_descripsion']; ?> &nbsp;&nbsp; <?php  if ($archivo2 != '') { echo ('<h5 style="display: inline;"><a href="php/' . $archivo2 . '"download="sistema-difucion-medica-conferencia"><i class="fa fa-download"></i></a></h5>'); }?> </h5><?php echo $fecha; ?>
                        </th>
                        </tr>
                    </div>
                        </table>
               <?php } ?>
        </div>
        <br>
                    
        </div>

                

                <!-- Articulos con mas me gusta -->   
                <div style="background: #F1F1F1">
        <br>
        <br>
        <div class="container">
        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/
        $sql2=("SELECT publicacion.id_public,publicacion.titulo_public,publicacion.text_public,publicacion.link_imagen,publicacion.link_video,
        publicacion.link_audio,publicacion.link_archivo,DATE_FORMAT(publicacion.fecha_public,'%d/%m/%y') AS fecha,publicacion.categoria_public,publicacion.me_gusta_pu,publicacion.referencia_pu,
        medico.nombre_medico,medico.apellido_medico,especialidad.espec_descripsion FROM publicacion,medico,especialidad WHERE publicacion.id_medico_pu=medico.id_medico  AND publicacion.estado='A' AND publicacion.categoria_public=especialidad.id_espec ORDER BY publicacion.me_gusta_pu DESC LIMIT 0,8  ");
        $sql= $mysqli->query($sql2);
        //$numeroSql = mysqli_num_rows($sql);
        ?>
    <h3><i class="fa fa-heartbeat"></i> Artículos más apoyados</h3>
        
               <main class="columna-perso">
                <?php while ($rowSql = mysqli_fetch_assoc($sql)){ 
                        
                        //$link_imagen = $res['link_imagen'];
                        $titulo_art = substr($rowSql['titulo_public'],0,30);
                        $audio = $rowSql['link_audio'];
                        $fecha = $rowSql['fecha'];
                        $archivo2 = $rowSql['link_archivo'];
                        $nombre = $rowSql['nombre_medico'];
                        $apellido = $rowSql['apellido_medico'];
                        ?>
                                
                                <table>
                                
                                <div class="col-lg-12 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                
                                
                                <tr>
                                <th>
                                <h4><?php echo (' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> '.$titulo_art. '</a>');?></h4>
                                <h5 style="display: inline;">Autor: </h5> <?php echo '' . $nombre . " " . $apellido . '' ?><?php echo(' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> <i class="fa fa-external-link"></i></a>');?>
                                <br>
                                <h5 style="display: inline;">Tema:</h5> <?php echo $rowSql['espec_descripsion']; ?> &nbsp;&nbsp; <?php  if ($archivo2 != '') { echo ('<h5 style="display: inline;"><a href="php/' . $archivo2 . '"download="sistema-difucion-medica-conferencia"><i class="fa fa-download"></i></a></h5>'); }?> </h5><?php echo $fecha; ?>
                                </th>
                                </tr>
                            </div>
                                </table>
               
               <?php } ?>
        </div>
        <br>
                </div>
                </main>
                <!-- Articulos mas comentado -->
        
        <br>
        <div class="container">
        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/
        $sql2=("SELECT publicacion.id_public,publicacion.titulo_public,publicacion.text_public,publicacion.link_imagen,publicacion.link_video,
        publicacion.link_audio,publicacion.link_archivo,DATE_FORMAT(publicacion.fecha_public,'%d/%m/%y') AS fecha,publicacion.categoria_public,publicacion.me_gusta_pu,publicacion.referencia_pu,
        medico.nombre_medico,medico.apellido_medico,especialidad.espec_descripsion FROM publicacion,medico,especialidad WHERE publicacion.id_medico_pu=medico.id_medico  AND publicacion.estado='A' AND publicacion.categoria_public=especialidad.id_espec ORDER BY publicacion.me_gusta_pu DESC LIMIT 0,8  ");
        $sql= $mysqli->query($sql2);
        //$numeroSql = mysqli_num_rows($sql);

        ?>

    <h3><i class="fa fa-comments"></i> Artículos más comentados</h3>
        
               <main class="columna-perso">
                <?php while ($rowSql = mysqli_fetch_assoc($sql)){ 
                        
                        //$link_imagen = $res['link_imagen'];
                        $titulo_art = substr($rowSql['titulo_public'],0,30);
                        $audio = $rowSql['link_audio'];
                        $fecha = $rowSql['fecha'];
                        $archivo2 = $rowSql['link_archivo'];
                        $nombre = $rowSql['nombre_medico'];
                        $apellido = $rowSql['apellido_medico'];
                        ?>
                                
                                <table>
                                
                                <div class="col-lg-12 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                
                                
                                <tr>
                                <th>
                                <h4><?php echo (' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> '.$titulo_art. '</a>');?></h4>
                                <h5 style="display: inline;">Autor: </h5> <?php echo '' . $nombre . " " . $apellido . '' ?><?php echo(' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> <i class="fa fa-external-link"></i></a>');?>
                                <br>
                                <h5 style="display: inline;">Tema:</h5> <?php echo $rowSql['espec_descripsion']; ?> &nbsp;&nbsp; <?php  if ($archivo2 != '') { echo ('<h5 style="display: inline;"><a href="php/' . $archivo2 . '"download="sistema-difucion-medica-conferencia"><i class="fa fa-download"></i></a></h5>'); }?> </h5><?php echo $fecha; ?>
                                </th>
                                </tr>
                            </div>
                                </table>
               <?php } ?>
        </div>
        <br>
                </main>
                
                <!-- iconos inferiores -->   
                <div style="background: #F1F1F1">
        
        <br>
        <br>
        <div class="container">
                                
                        <div class="col-lg-12 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                        
                        <div class="inicio_ico">
                                            <a href="/medico-red/graficos/visitas_pagina.php" target="__blank" class="fa fa-bar-chart" aria-hidden="true"></a>
                                            <a href="/medico-red/graficos/articulo_mes.php" target="__blank" class="fa fa-newspaper-o"></a>
                                            <a href="/medico-red/graficos/conferencia_mes.php" target="__blank" class="fa fa-youtube-play"></a>
                                            
                                            <a href="/medico-red/graficos/medicos_especialidad.php" target="__blank" class="fa fa-stethoscope"></a>
                                        </div>
                    </div>
        </div>
        <br>
</div>
                    <div class="con">
                        <?php include_once "./php/boton_medico.php"; ?>
                    </div>
    <!--/#blog-->
    <footer id="footer">
        <div class="container">
            <div class="row footer">
                <div class="col-sm-12 ">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p>Sistema de difusión de información medica 2022. Todos los derechos reservados.</p>
                            <p>Diseñado por: <a  target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
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