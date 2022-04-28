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
$id=$_GET['id'];

session_start();
if ($_SESSION["s_medico"] === null){
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
    <title>Artículos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">
    <script src="js/sweetalert2@11.js"></script>
    <link rel="stylesheet" href="css/boton.css">
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

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
        .logocom{
  position: relative;
  font-size: 19px;
  right: 50px;
  top: 50px;
}
        .comentario{
            right: 107px;
        }
        .cojacom{
            right: 80px;
        }
    </style>
</head>
<!--/head-->

<body>
<?php include_once "./php/menu_nada.php"; ?>
    <!--/#header-->



    <!--/#page-breadcrumb-->

    <section  class="padding-top wow fadeInDown">
        <div class="container">
                <div class="col-md-12 col-sm-12">
                        <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    <?php
                                $public = "SELECT publicacion.id_public,publicacion.titulo_public,publicacion.text_public,publicacion.link_imagen,publicacion.link_video,
                    publicacion.link_audio,publicacion.link_archivo,DATE_FORMAT(publicacion.fecha_public,'%d/%m/%y') AS fecha,publicacion.categoria_public,publicacion.me_gusta_pu,publicacion.referencia_pu,
                    CONCAT(medico.nombre_medico,' ',medico.apellido_medico) nombreme,especialidad.espec_descripsion FROM publicacion,medico,especialidad WHERE publicacion.id_public=$id AND publicacion.id_medico_pu=medico.id_medico  AND publicacion.estado='A' AND publicacion.estado_articulo='Publico'
                    AND publicacion.categoria_public=especialidad.id_espec";
                    $public2 = $mysqli->query($public);
                    while ($res = mysqli_fetch_array($public2)) {
                        $link_imagen = $res['link_imagen'];
                        $video = $res['link_video'];
                        $audio = $res['link_audio'];
                        $fecha = $res['fecha'];
                        $archivo = $res['link_archivo'];
                        $nombre = $res['nombreme'];

                    ?>
                                <!--animacion js wow fadeInDowm de las publicaciones-->
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="single-blog two-column">
                                    <div class="post-thumb">
                                        <?php
                                            if ($link_imagen != '') {
                                                $elcha='\\';

                                                echo ('<a href="blogdetails.html"><img src="php'.$elcha.'imagenes'.$elcha.''. $link_imagen . '" class="img-responsive" alt="">');
                                                //echo ("<h4>$link_imagen </h4>");
                                            } ?></a>
                                    </div>
                                    <div class="post-content overflow">
                                        <h2><?php mostrar($res['titulo_public']); ?></h2>
                                        <h3>Resumen</h3>
                                        <p><?php mostrar($res['text_public']); ?></p>
                                        <?php echo '<h3 class="post-author"><a href="#">Subido por: ' .$nombre. '</a></h3>' ?>
                                        <h4>Bibliografia</h4>
                                        <p><?php mostrar($res['referencia_pu']); ?></p>
                                        
                                        
                                        <?php
                                            if ($archivo != '') {
                                                echo ('<h4 style="display: inline;" class="post-author"><a href="php/' . $archivo . '"download="sistema-difucion-medica"><i class="fa fa-download"></i> Descargar Archivo</a> </h4>                    
                                                &nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size: 17px;" title="Contenido del pdf" target="__blank" href="contenido_pdf.php?id='.$res["id_public"].'"><i class="fa fa-external-link"></i>');
                                            }?>
                                            <br>
                                        <div class="">
                                            <ul class="nav navbar-nav post-nav">
                                                <li>
                                                    <h4><a href="#"><i class="fa fa-comments"></i>3 Comentarios</a></h4>
                                                </li>
                                                <li>
                                                <h4><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>Me
                                                            gustas
                                                            <?php mostrar($res['me_gusta_pu']); ?></a></h4>
                                                </li>
                                                <li>
                                                    <h4>
                                                   <a href="#">Categoría: <?php mostrar($res['espec_descripsion']); ?> <i class="fa fa-tag"></i></a>
                                                    </h4>
                                                </li>
                                                <li>
                                                    <h4>
                                                    <a href=""><?php echo ("Publicado el: $fecha "); ?> <i class="fa fa-clock-o"></i></a>
                                                    </h4>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                                    
                                    <h2 class="bold">Comentarios</h2>

                                    <div class="container">
    <div class=" col-lg-7 col-lg-offset-1 cojacom">
                    <div class="contact-form bottom">
                        <form <?php echo "action='php/comentariop.php?id2=".$id."&accion=INS'  method='post'"; ?> >
                        <a class="pull-left logocom" href="#">
                            <img class="media-object" src="images/imagenes_guardadas/dibu1.png" alt="logo" width="45" height="45">
                        </a>
                            <div class="form-group">
                                <textarea name="comentario"  required="required" class="form-control" rows="1" placeholder="Añadir un comentario..."></textarea>
                            </div>
                        </div>                        
                            <div class="col-lg-4 col-lg-offset-8">
                                <input type="submit" name="submit" class="btn btn-submit" value="Comentar">
                            </div>
                        </form>
                    
                </div>
            </div>

                                    <?php 
                                    include 'php/conexion.php';
                                    $comen ="SELECT comentario.text_comen,DATE_FORMAT(comentario.fecha_comen,'%d/%m/%y') AS fecha2,medico.nombre_medico,medico.apellido_medico FROM medico,publicacion,comentario WHERE comentario.id_public_com=publicacion.id_public 
                                    AND comentario.id_medico_com=medico.id_medico  AND comentario.id_public_com=$id ORDER BY fecha2 DESC";

                                    $comen2 = $mysqli->query($comen);
                                    while ($resco = mysqli_fetch_array($comen2)) {
                                        $nombre2 = $resco['nombre_medico'];
                                        $apellido2 = $resco['apellido_medico'];
                                        $fecha2 =$resco['fecha2'];

                                    
                                    ?>
                                    <div class="col-lg-12 col-lg-offset-1 comentario">

                                        <ul class="media-list">
                                            <li class="">
                                                <div class="">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object" src="images/imagenes_guardadas/dibu1.png" alt="logo" width="45" height="45">
                                                    </a>
                                                    <div class="media-body">
                                                        <?php echo '<h6 style="display: inline;" class="post-author"><a href="#">' . $nombre2 . " " . $apellido2 . '</a></h6>' ?>
                                                        <h5><?php mostrar($resco['text_comen']);?></h5>
                                                        <ul class="nav navbar-nav post-nav">
                                                            <li><a href="#"><i class="fa fa-thumbs-up"></i> 25</a></li>
                                                            <li><a href="#">RESPONDER</a></li>
                                                            <li><a href="#">  <?php echo("<spam>$fecha2</spam>");?> <i class="fa fa-clock-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <?php
                                        }
                                        ?>

                                        
                   
                    <!--*******************************************************-->
                                    <!--/Response-area-->
                                </div>
                            </div>
                        </div>
                </div>
        </div>
    </section>
    
    <!--/#blog-->
    <!--boton flotante donde esta los diferentes acciones -->
    <div class="con">
                    <?php include_once "./php/boton_medico.php"; ?>
                    </div>
    <footer id="footer">
        <div class="container">
            <div class="row footer">
                <div class="col-sm-12 ">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p>Sistema de difusión de información medica 2022. Todos los derechos reservados.</p>
                            <p>Diseñado por: <a target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>

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