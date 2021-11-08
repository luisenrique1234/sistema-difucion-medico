<?php

include('php/consultas.php');
$query=extraerpublic($_GET['id']);
	
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
    <title>actualizar Publicacion</title>
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
        <div>
            <div class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                            <img src="images/admin-logo.png" alt="logo" width="70" height="70">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="admin_bien.php">Inicio</a></li>
                            <li class="active" class="dropdown"><a href="mante_medico.php">Lista de Medico<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="mante_medico.php">Lista de médico</a></li>
                                    <li><a href="desativado_medico.php">lista desactivado médico</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="mante_public.php">Lista de publicacion<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="mante_public.php">Lista de publicacion</a></li>
                                    <li><a href="blog.html">Comentario publicacion</a></li>
                                    <li><a href="desativado_public.php">Lista destivado publicacion</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="mante_inve.php">Lista  investigaciones<i class="fa fa-angle-down"></i></a>
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
                                <a href="portfolio.html" class="btn btn-info"><?php echo $_SESSION["s_admin"]; ?>. .<i class="fa fa-user"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="pefil_medico.php">Mi perfil</a></li>
                                    <li><a  onclick="return alertaactivar();">Cerrar sesion</a></li>
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
    <!--id la imagen de triangulor que se usa para el inicio-->
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="center">
                    <div>
                        <div class="col-sm-12">
                            <br>
                            <br>
                            <br>
                            <h1 class="title">Actualizar Publicacion</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#action-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="col-md-12 col-sm-12">
                        <div class="post-thumb">
                            <div class="panel-dafault" style="margin-top: 12px">
                                <!--panel de crear -->
                                <div class="panel-heading">
                                    <form action="php/tablas_mantenimiento.php?accion=UDTPU" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="wow fadeInDown">
                                            <div class="col-md-4 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-3 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                            <div class="form-group">
                                            <label class="control-label">ID<span
                                                                style="color: turquoise">*</span></label>
                                            <input type="text" name="codigop" require="" placeholder="codigo" class="form-control" readonly="" value="<?php echo $row['id_public']?>">
                                            </div>
				                            </div>
                                                <div class="col-lg-6 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Titulo<span
                                                                style="color: turquoise">*</span></label>
                                                        <input type="text" name="titulo" required="required"
                                                            placeholder="Titulo" class="form-control" value="<?php echo $row['titulo_public']?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Autor</label>
                                                        <input type="text" name="autor" required="required" placeholder="Autor" class="form-control" value="<?php echo $row['autor_pu']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-8 col-lg-offset-3 col-xs-12 col-xs-offset-0">
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
                                                <div class="col-lg-5 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Referencias<span
                                                                style="color: turquoise">*</span></label>
                                                        <input type="text" name="referencia" required="required" placeholder="Referencias" class="form-control" value="<?php echo $row['referencia_pu']?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-3 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label  class="control-label">Categoria<span
                                                                style="color:turquoise">*</span> </label>
                                                    

                                                        <select name="categoria" class="form-control" required="required">
                                                            <?php
					                                        include 'php/conexion.php';
                                                            
					                                        $getAlumno1 = "SELECT * FROM  especialidad";
					                                        $gerAlumno2 = $mysqli->query ($getAlumno1);
                                                            
					                                        while ($row2 = mysqli_fetch_array($gerAlumno2))
					                                        {
					                                            $id = $row2 ['id_espec'];
					                                        	$espe = $row2['espec_descripsion'];
                                                            
                                                            
					                                        	?>
                                                            
                                                            
                                                            <option value="<?php echo $id?>" <?php if($row['categoria_public']==$id){echo "selected";} ?>><?php echo $espe;?></option>
                                                            


                                                            <?php

					}

					?>
                                                        </select>

                                                    </div>
                                                </div>
                                                <!--<div  class="col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                    <br>
                                                    
                                                    <input type="file" name="archivo"  required="required" />
                                                </div>-->
                                                <!-- parte que ocupada la pantalla completa -->
                                                <div
                                                    class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-3 col-xs-12 col-xs-offset-0">
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
                            <a href="./contador/dashboard.php" class="fa fa-bar-chart" aria-hidden="true"></a>
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