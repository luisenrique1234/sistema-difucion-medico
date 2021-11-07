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
if ($_SESSION["s_admin"] === null) {
    header("Location: ./admin_login.php");
} else{
    if($_SESSION["s_idRol3"]==2){
        header("Location: ./index.php");
    }
    elseif($_SESSION["s_idRol3"]==3){
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
    <title>Graficos Médico</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">

    <link rel="stylesheet" href="css/boton.css">

    <script src="js/plotly-latest.min.js"></script>

    <link href="https://vjs.zencdn.net/7.5.4/video-js.css" rel="stylesheet">
    <script src='https://vjs.zencdn.net/7.5.4/video.js'></script>
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
        <div>
            <div class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">
                            <img src="images/admin-logo.png" alt="logo" width="70" height="70">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="admin_bien.php">Inicio</a></li>
                            <li class="active" class="dropdown"><a href="mante_medico.php">Lista de Medico<i
                                        class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="mante_medico.php">Lista de médico</a></li>
                                    <li><a href="desativado_medico.php">lista desactivado médico</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="mante_public.php">Lista de publicacion<i
                                        class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="mante_public.php">Lista de publicacion</a></li>
                                    <li><a href="#">Comentario publicacion</a></li>
                                    <li><a href="desativado_public.php">Lista destivado publicacion</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="mante_inve.php">Lista investigaciones<i
                                        class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="mante_inve.php">Lista investigaciones</a></li>
                                    <li><a href="#">Comentario investigacio</a></li>
                                    <li><a href="desacti_inve.php">Lista desativado investigaciones</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="mante_rol.php">Roles<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="mante_rol.php">Roles médico</a></li>
                                    <li><a href="mante_espec.php">Especialidades médicos</a></li>
                                </ul>
                            </li>
                            <li>
                                <!-- <div >
                            <img src="images/predeterminado.jpg" width="100%" height="60">
                            </div>-->
                                <a href="#" class="btn btn-info"><?php echo $_SESSION["s_admin"]; ?>. .<i
                                        class="fa fa-user"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="pefil_medico.php">Mi perfil</a></li>
                                    <li><a onclick="return alertaactivar();">Cerrar sesion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="search">
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
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div>
                        <div class="col-sm-12">
                            <br>
                            <br>
                            <br>
                            <h2>Graficoss</h2>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>



    <!--/#page-breadcrumb-->

    <section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">

                                    <div class="row">

                                        <!-- Area Chart -->
                                        <div class="col-xl-8 col-lg-7">
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Dropdown -->
                                                <div
                                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h4 class="m-0 font-weight-bold text-primary">Visitas de la pagina</h4>
                                                </div>
                                                <!-- Cuerpo de la grafica lineas -->
                                                <!-- Cuerpo de la grafica lineas -->
                                                <!-- Cuerpo de la grafica lineas -->
                                                <!-- Cuerpo de la grafica lineas -->
                                                <!-- Cuerpo de la grafica lineas -->
                                                <div class="card-body">
                                                    <div id="cargalineal">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Pie Chart -->
                                        <div class="col-xl-4 col-lg-5">
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Dropdown -->
                                                <div
                                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h4 class="m-0 font-weight-bold text-primary">Fuente de trafico</h4>
                                                </div>
                                                <!-- Cuerpo de la grafica  circular -->
                                                <!-- Cuerpo de la grafica circular -->
                                                <!-- Cuerpo de la grafica circular -->
                                                <!-- Cuerpo de la grafica circula -->
                                                <!-- Cuerpo de la grafica circular -->
                                                <div class="card shadow mb-4">
                                                    <div id="cargacircular">


                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-4 col-lg-5">
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Dropdown -->
                                                <div
                                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h4 class="m-0 font-weight-bold text-primary">Especialidades medicas</h4>
                                                </div>
                                                <!-- Cuerpo de la grafica  circular -->
                                                <!-- Cuerpo de la grafica circular -->
                                                <!-- Cuerpo de la grafica circular -->
                                                <!-- Cuerpo de la grafica circula -->
                                                <!-- Cuerpo de la grafica circular -->
                                                <div class="card shadow mb-4">
                                                    <div id="cargacircular_2">


                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-xl-8 col-lg-7">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Dropdown -->
                                            <div
                                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h4 class="m-0 font-weight-bold text-primary">visitas de la publicacion</h4>
                                            </div>
                                            <!-- Cuerpo de la grafica lineas -->
                                            <!-- Cuerpo de la grafica lineas -->
                                            <!-- Cuerpo de la grafica lineas -->
                                            <!-- Cuerpo de la grafica lineas -->
                                            <!-- Cuerpo de la grafica lineas -->
                                            <div class="card-body">
                                                <div id="graficalineal_2">

                                                </div>
                                            </div>
                                        </div>
                                    </div>





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
                                    <!--/Response-area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                        </div>
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
            </div>
        </div>
    </section>
    <!--<div class="  col-lg-4 col-lg-offset-7">
                    <div class="contact-form bottom">
                        <h2>Deja tu comentario</h2>
                        <form <?php /*echo "action='php/comentariop.php?id2=1&accion=INS'  method='post'"; */ ?> >
                            <div class="form-group">
                                <textarea name="comentario" id="message" required="required" class="form-control" rows="8" placeholder="Tu texto aqui"></textarea>
                            </div>                        
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Comentar">
                            </div>
                        </form>
                    </div>
                </div>-->
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
    </script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <!--LUgar donde esta el ativador del modo oscuro -->
    <script type="text/javascript" src="js/temad.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {
        $('#cargalineal').load('lineal.php');
        $('#cargacircular').load('circular.php');
        $('#cargacircular_2').load('circular_2.php');
        $('#graficalineal_2').load('lineal_2.php');

    });
    </script>
</body>

</html>