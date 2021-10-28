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
    <title>Sistama de divulgacion medico</title>
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

<body class="dark">
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
                            <h1><img src="images/logo.png" alt="logo" width="100" height="100"></h1>
                        </a>

                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="index.php">Inicio</a></li>
                            <li class="dropdown"><a href="pediatria.php">Pediatria<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="aboutus.html">Enbarosos</a></li>
                                    <li><a href="aboutus2.html">Maltrato infantil</a></li>
                                    <li><a href="service.html">Salud infantil</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="Cardiologia.php">Cardiologia<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Ataques al corazon</a></li>
                                    <li><a href="blogtwo.html">Arritmia cardiaca</a></li>
                                    <li><a href="blogone.html">Taquicardia</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="cirugia_general.php">Cirugia general<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Anestecia</a></li>
                                    <li><a href="#">Anestecia Local</a></li>
                                </ul>
                            </li>
                            <li >
                        
                           <!-- <div >
                            <img src="images/predeterminado.jpg" width="100%" height="60">
                            </div>-->
                                <a href="portfolio.html" class="btn btn-info"><?php  echo $_SESSION["s_medico"];?>.  .<i class="fa fa-user"></i></a>
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
                    <!--<form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Buscar">
                        </div>
                    </form>-->
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


    <section id="noticia" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item categories">
                            <h3>Especialidades</h3>
                            <ul class="nav navbar-stacked">
                                <li><a href="#">Pediatria</a></li>
                                <li class="active"><a href="#">Cardiologia</a></li>
                                <li><a href="#">Cirugia general</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-7">

                    <?php
                    include 'php/conexion.php';
                    $public = "SELECT inv_cientifica.id_inv,inv_cientifica.titulo_inv,inv_cientifica.autor_inv,inv_cientifica.resume_inv,inv_cientifica.introducion_inv,
                    inv_cientifica.pclave_inv,inv_cientifica.Antecedente_inv,DATE_FORMAT(inv_cientifica.fecha_inv,'%d/%m/%y') AS fecha,inv_cientifica.objetivoge_inv,inv_cientifica.objetivoes_inv,
                    inv_cientifica.cotegoria_inv,medico.nombre_medico,medico.apellido_medico FROM inv_cientifica,medico WHERE inv_cientifica.id_medico_inv=medico.id_medico ORDER BY fecha DESC";
                    $public2 = $mysqli->query($public);
                    while ($res = mysqli_fetch_array($public2)) {
                       /* $link_imagen = $res['link_imagen'];
                        $video = $res['link_video'];
                        $audio = $res['link_audio'];*/
                        $fecha = $res['fecha'];
                        $autor = $res['autor_inv'];
                        $nombre = $res['nombre_medico'];
                        $apellido = $res['apellido_medico'];

                    ?>
                    <!--animacion js wow fadeInDowm de las inv_cientificaes-->
                    <div class="wow fadeInDown">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="single-blog two-column">
                                    <div class="post-thumb">
                                        


                                        <div class="post-overlay">
                                            <span class="uppercase"><a href="#">
                                                    <h4><?php mostrar($res['fecha']); ?></h4>
                                                </a></span>
                                        </div>

                                    </div>
                                   

                                    <div class="post-content overflow">
                                        <h2><?php mostrar($res['titulo_inv']); ?></h2>
                                        <?php echo '<h3 class="post-author"><a href="#">Publicador:' . $nombre . " " . $apellido . '</a></h3>' ?>
                                        <h3>Resumen</h3>
                                        <p><?php mostrar($res['resume_inv']); ?></p>
                                        <?php echo("<p>Escrito por:$autor</p>");?>
                                        <?php echo ("<h5>Publicado el: $fecha </h5>"); ?>
                                        
                                        <?php echo("<a href='con_cientifico.php?id=".$res["id_inv"]."' class='read-more'>ver Investigacion completa</a>");?>
                                        
                                        <div class="post-bottom overflow">
                                            <ul class="nav navbar-nav post-nav">
                                                <li>
                                                    <h4><a href="#"><i
                                                                class="fa fa-tag"></i><?php mostrar($res['cotegoria_inv']); ?></a>
                                                    </h4>
                                                </li>
                                                <li>
                                                    <h4><a href="#"><i class="fa fa-download"></i>Descargas
                                                            </a></h4>
                                                </li>
                                                <li>
                                                    <h4><a href="#"><i class="fa fa-comments"></i>3 comentarios</a></h4>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <!--boton flotante donde esta los diferentes acciones -->
                    <div class="con">
                        <input type="checkbox" id="btn-mas">
                        <div class="redes">
                            <a href="#" class="fa fa-user-circle"></a>
                            <a href="cientifico.php" class="fa fa-h-square" aria-hidden="true"></a>
                            <a href="buscador_m.php" class="fa fa-search"></a>
                            <a href="form_public.php" class="fa fa-stethoscope"></a>
                        </div>
                        <div class="btn-mas">
                            <label for="btn-mas" class="fa fa-plus"></label>
                        </div>
                    </div>
                    <!--*******************************************************-->
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p> Red medica 2021. Todos los derechos reservados.</p>
                            <p>Diseñado por<a target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <!--/#footer-->

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