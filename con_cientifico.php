<?php


/*esta fucion sirve para converti toddos los carateres como acentos en formato
uti-8 indenpedientemente de cual fuera su formato de  origen todo se convertira en 
utf-8 para que asi todos tengan el mismo formato*/
function mostrar($str)
{
    $codi = mb_detect_encoding($str, "ISO-8859-1,UTF-8");
    $str = iconv($codi, 'ISO-8859-1', $str);
    echo "<font face='Times New Roman' size=4>$str </font>";
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
    <title>publicacion cientifica</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">

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
</head>
<!--/head-->

<body>
    <header id="header">
        <div class="dark1">
            <div class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="index.php">
                            <img src="images/logo.png" alt="logo" width="70" height="70">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="index.php">Inicio</a></li>
                            <li class="dropdown"><a href="#">Pediatria<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="aboutus.html">Enbarosos</a></li>
                                    <li><a href="aboutus2.html">Maltrato infantil</a></li>
                                    <li><a href="service.html">Salud infantil</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="blog.html">Cardiologia<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Ataques al corazon</a></li>
                                    <li><a href="blogtwo.html">Arritmia cardiaca</a></li>
                                    <li><a href="blogone.html">Taquicardia</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Cirugia general<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Anestecia</a></li>
                                    <li><a href="#">Anestecia Local</a></li>
                                </ul>
                            </li>
                            <li>

                                <!-- <div >
                            <img src="images/predeterminado.jpg" width="100%" height="60">
                            </div>-->
                                <a href="portfolio.html" class="btn btn-info"><?php  echo $_SESSION["s_medico"];?>. .<i
                                        class="fa fa-user"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="pefil_medico.php">Mi perfil</a></li>
                                    <li><a href="lista_publicm.php">Mis Publicaciones</a></li>
                                    <li><a href="bd/logout.php" onclick="return alertaactivar();">Cerrar sesion</a></li>
                                </ul>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                    <div class="social-icons search">
                        <div class="oscuro">
                            <div class="modo" id="modo">
                                <i class="fa fa-adjust" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->



    <!--/#page-breadcrumb-->

    <section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    <?php
                    include 'php/conexion.php';
                    $public = "SELECT inv_cientifica.id_inv,inv_cientifica.titulo_inv,inv_cientifica.autor_inv,inv_cientifica.resume_inv,inv_cientifica.introducion_inv,
                    inv_cientifica.pclave_inv,inv_cientifica.Antecedente_inv,DATE_FORMAT(inv_cientifica.fecha_inv,'%d/%m/%y') AS fecha,inv_cientifica.objetivoge_inv,inv_cientifica.objetivoes_inv,
                    inv_cientifica.cotegoria_inv,inv_cientifica.justificasion_inv,inv_cientifica.hipotesis_inv,inv_cientifica.metodologia_inv,inv_cientifica.referencias_inv,inv_cientifica.bibliografia,medico.nombre_medico,
                    medico.apellido_medico FROM inv_cientifica,medico WHERE inv_cientifica.id_inv=$id AND  inv_cientifica.id_medico_inv=medico.id_medico";
                    $public2 = $mysqli->query($public);
                    for ($i = 1; $i <= 1; $i++) {
                        $res = mysqli_fetch_array($public2);
                        $fecha = $res['fecha'];
                        $autor = $res['autor_inv'];
                        $nombre = $res['nombre_medico'];
                        $apellido = $res['apellido_medico'];
                        $intro = $res['introducion_inv'];
                        $pclave =$res['pclave_inv'];
                        $antes =$res['Antecedente_inv'];
                        $objeg =$res['objetivoge_inv'];
                        $objesp =$res['objetivoes_inv'];
                        $espe =$res['justificasion_inv'];
                        $hipo =$res['hipotesis_inv'];
                        $metod =$res["metodologia_inv"];
                        $refe =$res['referencias_inv'];
                        $titulo =$res['titulo_inv'];
                        $biblo =$res['bibliografia'];
                        

                    ?>
                                    <!--animacion js wow fadeInDowm de las publicaciones-->
                                    <div class="wow fadeInDown">
                                        <div class="row">
                                            <div class="col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="single-blog two-column">
                                                    <div class="post-thumb">
                                                        
                                                    </div>
                                                    <div class="post-content overflow" class="wow fadeInDown">
                                                        <h2><?php echo("<font face='Times New Roman' size=6>$titulo</font>"); ?></h2>
                                                        <?php echo '<h3 class="post-author"><a href="#">Publicado por: ' . $nombre . " " . $apellido . '</a></h3>' ?>
                                                        <font face="times new roman" size=6>Resumen</font>
                                                        <br>
                                                        <br>
                                                        <p><?php mostrar($res['resume_inv']); ?></p>
                                                        <br>
                                                        
                                                        
                                                        <font face="times new roman" size=6>Introduccion</font>
                                                        <br>
                                                        <br>
                                                        <?php echo("<font face='Times New Roman' size=4>$intro</font>");?>
                                                        <br>
                                                        <br>
                                                        <font face="tines new roma" size=6>Palbras Claves</font>
                                                        <br>
                                                        <br>
                                                        <?php echo ("<font face='Times New Roman' size=4>$pclave</font>"); ?>
                                                        <br>
                                                        <br>

                                                        
                                                        <font face="times new roman" size=6>Antecedentes</font>
                                                        <br>
                                                        <br>
                                                        <?php echo("<font face='Times New Roman' size=4>$antes</font>"); ?>
                                                        <br>
                                                        <br>

                                                        <font face="times new toman" size=6>Objetivo General</font>
                                                        <br>
                                                        <br>
                                                        <?php echo("<font face='Times New Roman' size=4>$objeg</font>"); ?>
                                                        <br>
                                                        <br>
                                                        
                                                        <font face="times new toman" size=6>Objetivo Espesifico</font>
                                                        <br>
                                                        <br>
                                                        
                                                        <?php echo("<font face='Times New Roman' size=4>$objesp</font>"); ?>
                                                        <br>
                                                        <br>
                                                        
                                                        <font face="times new toman" size=6>Justificasion</font>
                                                        <br>
                                                        <br>
                                                        
                                                        <?php echo("<font face='Times New Roman' size=4>$espe</font>"); ?>
                                                        <br>
                                                        <br>

                                                        
                                                        <font face="times new toman" size=6>Hipòtesis</font>
                                                        <br>
                                                        <br>
                                                        <?php echo("<font face='Times New Roman' size=4>$hipo</font>"); ?>
                                                        <br>
                                                        <br>
                                                        <font face="times new toman" size=6>Metodologia</font>
                                                        <br>
                                                        <br>
                                                        <?php echo("<font face='Times New Roman' size=4>$metod</font>"); ?>
                                                        <br>
                                                        <br>
                                                        <?php
                                                         if ($biblo != '') { echo"
                                                        <font face='times new toman' size=6>Bibliografia</font>
                                                        <br>
                                                        <br>
                                                        <font face='Times New Roman' size=4>$biblo</font>);
                                                        <br>
                                                        <br>"; }?>
                                                        
                                                        <font face="times new toman" size=6>Referencias otros investigaciones</font>
                                                        <br>
                                                        <br>
                                                        <?php echo("<font face='Times New Roman' size=4>$refe</font>"); ?>
                                                        <br>
                                                        <br>


                                                        <h4>Autor:<?php echo $autor;?></h4>
                                                        <?php echo ("<h5>Publicado el: $fecha </h5>"); ?>
                                                        
                                                    
                                                        <!--<div class="post-bottom overflow">
                                                            <ul class="nav navbar-nav post-nav">
                                                                <li>
                                                                    <h4><a href="#"><i
                                                                                class="fa fa-tag"></i></a>
                                                                    </h4>
                                                                </li>
                                                                <li>
                                                                    <h4><a href="#"><i
                                                                                class="fa fa-download"></i>Descargas
                                                                            </a>
                                                                    </h4>
                                                                </li>
                                                                <li>
                                                                    <h4><a href="#"><i class="fa fa-comments"></i>3
                                                                            comentarios</a></h4>
                                                                </li>
                                                            </ul>-->
                                                        </div>

                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                    }
                    ?>
                                    <h2 class="bold">Comentarios</h2>
                                    <?php 
                                    include 'php/conexion.php';
                                    $comen ="SELECT inv_comentario.tex_cominv,DATE_FORMAT(inv_comentario.fecha_inv,'%d/%m/%y') AS fecha3,medico.nombre_medico,medico.apellido_medico FROM medico,inv_cientifica,inv_comentario WHERE inv_comentario.id_inve_com=inv_cientifica.id_inv 
                                    AND inv_comentario.id_medico_com=medico.id_medico  AND inv_comentario.id_inve_com=$id ORDER BY fecha3 DESC";

                                    $comen2 = $mysqli->query($comen);
                                    while ($resco = mysqli_fetch_array($comen2)) {
                                        $nombre2 = $resco['nombre_medico'];
                                        $apellido2 = $resco['apellido_medico'];
                                        $fecha2 =$resco['fecha3'];

                                    
                                    ?>
                                    <div class="response-area">

                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="post-comment">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object" src="images/blogdetails/2.png" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                        <?php echo '<h5 class="post-author"><a href="#">Comentario de: ' . $nombre2 . " " . $apellido2 . '</a></h5>' ?>
                                                        <p><?php mostrar($resco['tex_cominv']);?></p>
                                                        <ul class="nav navbar-nav post-nav">
                                                            <li><a href="#"><i class="fa fa-clock-o"></i><?php echo("<spam>$fecha2</spam>");?></a></li>
                                                            <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <?php
                                        }
                                        ?>

                                        <!--boton flotante donde esta los diferentes acciones -->
                    <div class="con">
                        <input type="checkbox" id="btn-mas">
                        <div class="redes">
                            <a href="#" class="fa fa-user-circle"></a>
                            <a href="buscador_m.php" class="fa fa-search"></a>
                            <a href="cientifico.php" class="fa fa-h-square" aria-hidden="true"></a>
                            <a href="form_public.php" class="fa fa-stethoscope"></a>
                        </div>
                        <div class="btn-mas">
                            <label for="btn-mas" class="fa fa-plus"></label>
                        </div>
                    </div>
                    <!--*******************************************************-->
                                    <!--/Response-area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--<div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                        </div>
                        <div class="sidebar-item categories">
                            <h3>especialidades</h3>
                            <ul class="nav navbar-stacked">
                                <li><a href="#">Pediatria</a></li>
                                <li class="active"><a href="#">Cardiologia</a></li>
                                <li><a href="#">Cirugia general</a></li>
                            </ul>
                        </div>
                    </div>
                </div>-->

            </div>
        </div>
    </section>
    <div class="  col-lg-4 col-lg-offset-7">
                    <div class="contact-form bottom">
                        <h2>Deja tu comentario</h2>
                        <form <?php echo "action='php/comentariop.php?id3=".$id."&accion=INS2'  method='post'"; ?> >
                            <div class="form-group">
                                <textarea name="comentarioinv" id="comentarioinv" required="required" class="form-control" rows="8" placeholder="Tu texto aqui"></textarea>
                            </div>                        
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Comentar">
                            </div>
                        </form>
                    </div>
                </div>
    <!--/#blog-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p> Sistema de difusion medica 2021. Todos los derechos reservados.</p>
                            <p>Diseñado por<a target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <!--/#footer-->

    <!--codigo del mesange cierre de sesion-->
    <script>
    function alertaactivar() {
        var respuesta = confirm("Estas seguro de Cerrar Sesion");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
    </script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <!--LUgar donde esta el ativador del modo oscuro -->
    <script type="text/javascript" src="js/temad.js"></script>
</body>

</html>