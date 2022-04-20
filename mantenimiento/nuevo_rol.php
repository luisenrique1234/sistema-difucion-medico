<?php



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
    <title>Actulizar comentario</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="../css/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/boton.css">
    <link rel="stylesheet" href="../css/cientifico.css">
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
<body class="dark" style="background: #F1F1F1">

<?php include_once "../php/mante_menu.php"; ?>
    <section  class="wow bounceInDown padding-top">
        <div style="display: flex; justify-content: center; width: 100%;">
        <div style="width: 50%;">
                    <div id="formc" class="post-thumb">
                            <div class="panel-dafault" style="margin-top: 12px">
                                <!--panel de crear -->
                                <div>
                                    <form action="../php/tablas_mantenimiento.php?accion=INSROL" method="POST" enctype="multipart/form-data">
                                        <div>
                                            <div>
                                                <div style="margin-bottom: 2rem;" class="text-center col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                               <h1 class="title">Nuevo Rol</h1>
                                                </div>
                                                <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-id-card-o"></i>  Rol<span
                                                                style="color: red">*</span></label>
                                                        <input type="text"  required="required" name="rol"
                                                            placeholder="Rol del usuario" class="form-control">
                                                    </div>
                                                </div>
                                                
                                                
                                                <!-- parte que ocupada la pantalla completa -->
                                                <div style="display: flex; flex-direction:row; width: 100%; justify-content: center; padding-top: 2rem; padding-bottom: 2rem;">
                                                <div style="margin-right: 30px;">
                                                    <a href="mante_rol.php" class="btn btn-danger btn-lg ">Cancelar</a>
                                                    </div>
                                                    <div>
                                                        <input type="submit" value="Guardar" class="btn btn-primary btn-lg">
                                                       </div> 
                                                    

                                                </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
        </div>
    </section>
                    <br>
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
        </footer>
    <!--/#footer-->
    <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/lightbox.min.js"></script>
        <script type="text/javascript" src="../js/wow.min.js"></script>
        <script type="text/javascript" src="../js/main.js"></script>
        <script type="text/javascript" src="../js/mante_buscador.js"></script>
        <script type="text/javascript" src="../js/mante_alertas.js"></script>
        <!--LUgar donde esta el ativador del modo oscuro -->
        <script type="text/javascript" src="../js/temad.js"></script>
</body>

</html>