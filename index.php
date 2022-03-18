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
   <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/boton.css">
    <link rel="stylesheet" href="css/inicio_ico.css">
    <!--<script src="./contador.js"></script>-->
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

    <div style="background: #F1F1F1">
        <br>
        <br>
        <br>
        <br>
        <div class="container">
        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/
        $sql2=("SELECT  conferencia.id_confe,conferencia.titulo_confe,conferencia.autores_confe,conferencia.material_confe,conferencia.fachainicio,conferencia.fechafinal,conferencia.categoria_confe,
        conferencia.etapa_confe,conferencia.visttas_confe,conferencia.link_confe,especialidad.espec_descripsion FROM conferencia,especialidad WHERE conferencia.categoria_confe=especialidad.id_espec  AND conferencia.estado='A'  ORDER BY conferencia.fachainicio DESC LIMIT 0,4  ");
        $sql= $mysqli->query($sql2);
        $numeroSql = mysqli_num_rows($sql);
        ?>
    <h3><i class="fa fa-stethoscope"></i> Últimas Conferencia</h3>
        
               <main>
                <?php while ($rowSql = mysqli_fetch_assoc($sql)){ 
                        
                        $archivo= $rowSql["material_confe"];
                        $link_reunion=$rowSql["link_confe"];
                        $titulo_con=$rowSql["titulo_confe"];
                        $fecha2=$rowSql["fachainicio"];
                        $inicial = date_create($fecha2)->format('d/m/y  g:iA');
                        $fecha3=$rowSql["fechafinal"];
                        $final = date_create($fecha3)->format('d/m/y  g:iA');
                        ?>
                        <div class="col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                        
                        <br>
                        
                        <h5 style="display: inline;"><?php echo (' <a href="'.$link_reunion.'" target="_blank"> '.$titulo_con. '</a>');?></h5>
                        <br><h5 style="display: inline;">Por:</h5> <?php echo substr($rowSql["autores_confe"],0,40); ?><?php echo(' <a href="'.$link_reunion.'" target="_blank"> <i class="fa fa-external-link"></i></a>');?>
                        <br>
                        <h5 style="display: inline;">Especialidad:</h5> <?php echo $rowSql["espec_descripsion"]; ?> &nbsp;&nbsp; <?php  if ($archivo != '') { echo ('<h5 style="display: inline;"><a href="php/' . $archivo . '"download="sistema-difucion-medica-conferencia"><i class="fa fa-download"></i></a></h5>'); }?> </h5><?php echo $inicial; ?>
                        
                    </div>
               <?php } ?>
        </div>
        <br>
</div>
                </main>

                <div style="background: #20558A">
        
        <br>
        <br>
        <div class="container">
        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/
        $sql2=("SELECT publicacion.id_public,publicacion.titulo_public,publicacion.text_public,publicacion.link_imagen,publicacion.link_video,
        publicacion.link_audio,publicacion.link_archivo,DATE_FORMAT(publicacion.fecha_public,'%d/%m/%y') AS fecha,publicacion.categoria_public,publicacion.me_gusta_pu,publicacion.referencia_pu,
        medico.nombre_medico,medico.apellido_medico,especialidad.espec_descripsion FROM publicacion,medico,especialidad WHERE publicacion.id_medico_pu=medico.id_medico  AND publicacion.estado='A' AND publicacion.categoria_public=especialidad.id_espec ORDER BY publicacion.fecha_public DESC LIMIT 0,6  ");
        $sql= $mysqli->query($sql2);
        //$numeroSql = mysqli_num_rows($sql);

        ?>

    <h3 class="text-muted"><i class="fa fa-stethoscope"></i> Últimos Artículas</h3>
    <br>
               <main class="columno3">
                <?php while ($rowSql = mysqli_fetch_assoc($sql)){ 
                        
                        //$link_imagen = $res['link_imagen'];
                        $titulo_art = $rowSql['titulo_public'];
                        $audio = $rowSql['link_audio'];
                        $fecha = $rowSql['fecha'];
                        $archivo2 = $rowSql['link_archivo'];
                        $nombre = $rowSql['nombre_medico'];
                        $apellido = $rowSql['apellido_medico'];
                        ?>
                                
                        <div class="col-lg-7 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                            <div class="imag-ultim text-center">
                        <img src="images/uni-medico2.jpg"  width="175" height="90">
                        <br>
                        <h5 style="display: inline;"><?php echo (' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> '.$titulo_art. '</a>');?></h5>
                        <br><h5 style="display: inline;">Autor: </h5> <?php echo '' . $nombre . " " . $apellido . '' ?><?php echo(' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> <i class="fa fa-external-link"></i></a>');?>
                        <br>
                        <h5 style="display: inline;">Tema:</h5> <?php echo $rowSql['espec_descripsion']; ?> &nbsp;&nbsp; <?php  if ($archivo2 != '') { echo ('<h5 style="display: inline;"><a href="php/' . $archivo2 . '"download="sistema-difucion-medica-conferencia"><i class="fa fa-download"></i></a></h5>'); }?> </h5><?php echo $fecha; ?>
                        </div>
                        <br>
                    </div>
               <?php } ?>
        </div>
        <br>
</div>
                </main>

                <!-- Articulos con mas me gusta -->   
                <div class="img-ap">
        
        <br>
        <br>
        <div class="container">
        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/
        $sql2=("SELECT publicacion.id_public,publicacion.titulo_public,publicacion.text_public,publicacion.link_imagen,publicacion.link_video,
        publicacion.link_audio,publicacion.link_archivo,DATE_FORMAT(publicacion.fecha_public,'%d/%m/%y') AS fecha,publicacion.categoria_public,publicacion.me_gusta_pu,publicacion.referencia_pu,
        medico.nombre_medico,medico.apellido_medico,especialidad.espec_descripsion FROM publicacion,medico,especialidad WHERE publicacion.id_medico_pu=medico.id_medico  AND publicacion.estado='A' AND publicacion.categoria_public=especialidad.id_espec ORDER BY publicacion.me_gusta_pu DESC LIMIT 0,6  ");
        $sql= $mysqli->query($sql2);
        //$numeroSql = mysqli_num_rows($sql);
        ?>
    <h3><i class="fa fa-stethoscope"></i> Artículo más apollados</h3>
        
               <main class="columna-perso">
                <?php while ($rowSql = mysqli_fetch_assoc($sql)){ 
                        
                        //$link_imagen = $res['link_imagen'];
                        $titulo_art = $rowSql['titulo_public'];
                        $audio = $rowSql['link_audio'];
                        $fecha = $rowSql['fecha'];
                        $archivo2 = $rowSql['link_archivo'];
                        $nombre = $rowSql['nombre_medico'];
                        $apellido = $rowSql['apellido_medico'];
                        ?>
                                
                        <div class="col-lg-6 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                        
                        <br>
                        
                        <h5 style="display: inline;"><?php echo (' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> '.$titulo_art. '</a>');?></h5>
                        <br><h5 style="display: inline;">Autor: </h5> <?php echo '' . $nombre . " " . $apellido . '' ?><?php echo(' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> <i class="fa fa-external-link"></i></a>');?>
                        <br>
                        <h5 style="display: inline;">Tema:</h5> <?php echo $rowSql['espec_descripsion']; ?> &nbsp;&nbsp; <?php  if ($archivo2 != '') { echo ('<h5 style="display: inline;"><a href="php/' . $archivo2 . '"download="sistema-difucion-medica-conferencia"><i class="fa fa-download"></i></a></h5>'); }?> </h5><?php echo $fecha; ?>
                        
                    </div>
               
               <?php } ?>
        </div>
        <br>
                    </div>
                </main>
                <!-- Articulos mas comentado -->    
                <div style="background: #F1F1FF">
        
        <br>
        <br>
        <div class="container">
        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/
        $sql2=("SELECT publicacion.id_public,publicacion.titulo_public,publicacion.text_public,publicacion.link_imagen,publicacion.link_video,
        publicacion.link_audio,publicacion.link_archivo,DATE_FORMAT(publicacion.fecha_public,'%d/%m/%y') AS fecha,publicacion.categoria_public,publicacion.me_gusta_pu,publicacion.referencia_pu,
        medico.nombre_medico,medico.apellido_medico,especialidad.espec_descripsion FROM publicacion,medico,especialidad WHERE publicacion.id_medico_pu=medico.id_medico  AND publicacion.estado='A' AND publicacion.categoria_public=especialidad.id_espec ORDER BY publicacion.me_gusta_pu DESC LIMIT 0,10  ");
        $sql= $mysqli->query($sql2);
        //$numeroSql = mysqli_num_rows($sql);

        ?>

    <h3><i class="fa fa-stethoscope"></i> Artículo más comentado</h3>
        
               <main class="columno3">
                <?php while ($rowSql = mysqli_fetch_assoc($sql)){ 
                        
                        //$link_imagen = $res['link_imagen'];
                        $titulo_art = $rowSql['titulo_public'];
                        $audio = $rowSql['link_audio'];
                        $fecha = $rowSql['fecha'];
                        $archivo2 = $rowSql['link_archivo'];
                        $nombre = $rowSql['nombre_medico'];
                        $apellido = $rowSql['apellido_medico'];
                        ?>
                                
                        <div class="col-lg-12 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                        
                        <br>
                        
                        <h5 style="display: inline;"><?php echo (' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> '.$titulo_art. '</a>');?></h5>
                        <br><h5 style="display: inline;">Autor: </h5> <?php echo '' . $nombre . " " . $apellido . '' ?><?php echo(' <a href="memoriac.php?id='.$rowSql["id_public"].'" target="_blank"> <i class="fa fa-external-link"></i></a>');?>
                        <br>
                        <h5 style="display: inline;">Tema:</h5> <?php echo $rowSql['espec_descripsion']; ?> &nbsp;&nbsp; <?php  if ($archivo2 != '') { echo ('<h5 style="display: inline;"><a href="php/' . $archivo2 . '"download="sistema-difucion-medica-conferencia"><i class="fa fa-download"></i></a></h5>'); }?> </h5><?php echo $fecha; ?>
                        
                    </div>
               <?php } ?>
        </div>
        <br>
</div>
                </main>
                
                <!-- Articulos mas comentado -->   
                <div style="background: #FFF1FF">
        
        <br>
        <br>
        <div class="container">
                                
                        <div class="col-lg-12 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                        
                        <div class="inicio_ico">
                                            <a href="dash_mante.php" class="fa fa-bar-chart" aria-hidden="true"></a>
                                            <a href="#" class="fa fa-user-circle"></a>
                                            <a href="#" class="fa fa-h-square" aria-hidden="true"></a>
                                            
                                            <a href="./contador/dashboard.php" class="fa fa-eye" aria-hidden="true"></a>
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
</body>

</html>