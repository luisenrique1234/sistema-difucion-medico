<?php

include('php/mante_consultas.php');
$query=extraerpubic($_GET['id']);
	
    $row=$query->fetch_assoc();
/*esta fucion sirve para converti toddos los carateres como acentos en formato
uti-8 indenpedientemente de cual fuera su formato de  origen todo se convertira en 
utf-8 para que asi todos tengan el mismo formato*/
function mostrar ($str){
$codi= mb_detect_encoding($str,"ISO-8859-1,UTF-8");
            $str=iconv($codi,'utf-8',$str);
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
    <title>Actulizar publicacion</title>
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
                            <h1 class="title">Publicar</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!--/#action-->
    <section  class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="col-md-12 col-sm-12">
                        <div class="post-thumb">
                            <div class="panel-dafault" style="margin-top: 12px">
                                <!--panel de crear -->
                                <div class="panel-heading">
                                    <form action="php/public.php?accion=UDT" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="wow fadeInDown">
                                            <div class="col-md-4 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-3 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                            <div class="form-group">
                                            <label class="control-label">ID publicacion<span style="color: turquoise">*</span></label>
                                            <input type="text" name="codigop" require="" placeholder="codigo" class="form-control" readonly="" value="<?php echo $row['id_public']?>">
                                            </div>
				                            </div>
                                                <div class="col-lg-6 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Titulo<span
                                                                style="color: turquoise">*</span></label>
                                                        <input type="text" name="titulo" required="required"
                                                            placeholder="Titulo" class="form-control" value="<?php echo $row['titulo_public']?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Autor</label>
                                                        <input type="text" name="autor" required="required" placeholder="Autor" class="form-control" value="<?php echo $row['autor_pu']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-8 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                    <label class="control-label">Resumen<span
                                                            style="color: turquoise">*</span></label>
                                                    <div class="form-group">
                                                        <textarea name="public" id="message" required="required"
                                                            class="form-control" rows="8"
                                                            placeholder="Escribe una publicacion"><?php echo $row['text_public']?></textarea>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Referencias<span
                                                                style="color: turquoise">*</span></label>
                                                        <input type="text" name="referencia" required="required" placeholder="Referencias" class="form-control" value="<?php echo $row['referencia_pu']?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-4 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label  class="control-label">Link archivo<span
                                                                style="color:turquoise">*</span> </label>
                                                        <input  type="text" name="linkar" require="" placeholder="categoria" class="form-control"  value="<?php echo $row['link_archivo']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-2 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label  class="control-label">Fecha publicacion<span
                                                                style="color:turquoise">*</span> </label>
                                                        <input  type="text" name="fechapu" require="" placeholder="categoria" class="form-control"  value="<?php echo $row['fecha_public']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-2 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label  class="control-label">Tipo archivo<span
                                                                style="color:turquoise">*</span> </label>
                                                        <input  type="text" name="tipoar" require="" placeholder="categoria" class="form-control"  value="<?php echo $row['tipo_archivo']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-3 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label  class="control-label">Categoria<span
                                                                style="color:turquoise">*</span> </label>
                                                        <input style="background-color: #5dcfcf; color:#000000;" type="text" name="categoria" require="" placeholder="categoria" class="form-control" readonly="" value="<?php echo $row['categoria_public']?>">
                                                    </div>
                                                </div>
                                                <!--<div  class="col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                    <br>
                                                    
                                                    <input type="file" name="archivo"  required="required" />
                                                </div>-->
                                                <!-- parte que ocupada la pantalla completa -->
                                                <div
                                                    class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <br>
                                                        <input type="submit" value="Actualizar" class="btn btn-submit">
                                    </form>
                                    <br>
                                    <br>
                                    <a href="mante_public.php" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

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
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p>Sistema de difusion medica 2021. Todos los derechos reservados.</p>
                            <p>Diseñado por <a target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
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
    <script type="text/javascript" src="js/temad.js"></script>
</body>

</html>