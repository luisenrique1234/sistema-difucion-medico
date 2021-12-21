<?php

include('../php/mante_consultas.php');
$query=extraerrol($_GET['id']);
	
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
    header("Location: ../admin_login.php");
} else{
    if($_SESSION["s_idRol3"]==2){
        header("Location: ../index.php");
    }
    elseif($_SESSION["s_idRol3"]==3){
        header("Location: ../vistas/pag_error.php");
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
    <title>Actualizar Rol</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="../css/dark.css" rel="stylesheet">

    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="../css/boton.css">
    <!--Icon-Font-->
    

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/ico.png">
</head>
<body class="dark">
<?php include_once "../php/mante_menu.php"; ?>
    <!--/#header-->
    <!--id la imagen de triangulor que se usa para el inicio-->
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div>
                        <div class="col-sm-12">
                            <br>
                            <br>
                            <br>
                            <h1 class="title">Actualizar Rol</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                                    <form action="php/tablas_mantenimiento.php?accion=UDTROL" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="wow fadeInDown">
                                                
                                            <div class="col-md-1 col-md-offset-1 col-sm-1 col-sm-offset-2 col-lg-2 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                            <div class="form-group">
                                            <label class="control-label">ID Rol<span
                                                                style="color: turquoise">*</span></label>
                                                                <input style="background-color: #5cc4dc; color:#000000;" type="text" 
                                                                name="idrol" require="" placeholder="Rol" class="form-control" readonly="" value="<?php echo $row['id_roles']?>">
                                            </div>
				                            </div>
                                                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-3 col-lg-offset-2 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">

                                                        <label class="control-label">Descripción<span
                                                                style="color: turquoise">*</span></label>
                                                        <input type="text" name="descrip" required="required"
                                                            placeholder="Descripción" class="form-control" value="<?php echo $row['descripcion']?>">
                                                    </div>
                                                </div>
                                                <!--<div  class="col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                    <br>
                                                    
                                                    <input type="file" name="archivo"  required="required" />
                                                </div>-->
                                                <!-- parte que ocupada la pantalla completa -->
                                                <div
                                                    class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-1 col-lg-5 col-lg-offset-6 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <br>
                                                        <input type="submit" value="Actualizar" class="btn btn-info btn-lg btn-block"">
                                    </form>
                                    <br>
                                
                                    <a href="mante_rol.php" class="btn btn-danger">Cancelar</a>
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
    <?php include_once "../php/boton.php"; ?>
    </div>
                    <!--*******************************************************-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p>Sistema de difusión medica 2021. Todos los derechos reservados.</p>
                            <p>Diseñado por <a target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <!--/#footer-->

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/lightbox.min.js"></script>
    <script type="text/javascript" src="../js/wow.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../js/temad.js"></script>
    <script type="text/javascript" src="../js/mante_alertas.js"></script>
</body>

</html>