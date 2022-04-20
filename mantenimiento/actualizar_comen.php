<?php

include('../php/mante_consultas.php');
$query=extraercomentario($_GET['id']);
    $row=$query->fetch_assoc();


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
                                    <form action="../php/tablas_mantenimiento.php?accion=UDTCOM" method="POST" enctype="multipart/form-data">
                                        <div>
                                            <div>
                                                <div style="margin-bottom: 2rem;" class="text-center col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                               <h1 class="title">Editar Comentario</h1>
                                                </div>
                                                <div class="col-md-1 col-md-offset-1 col-sm-8 col-sm-offset-2 col-lg-2 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                            <div class="form-group">
                                            <input  type="hidden" 
                                            name="codicome" require=""  class="form-control" readonly="" value="<?php echo $row['id_comen']?>">
                                            </div>
				                            </div>
                                                <div class="col-md-5 col-md-offset-1 col-sm-4 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-header"></i>  Titulo del Artículo <span
                                                                style="color: #20558A">*</span></label>
                                                        <input type="text"  required="required" readonly
                                                            placeholder="Titulo" class="form-control" value="<?php echo $row['titulo_public']?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-5 col-md-offset-0 col-sm-4 col-sm-offset-2">
                                                    <div class="form-group">
                                                    <label class="control-label"><i class="fa fa-user"></i> Médico<span
                                                            style="color: #20558A">*</span></label>
                                                    <div class="form-group">
                                                    <input type="text"  required="required" readonly
                                                            placeholder="LInk conferencia" class="form-control" value="<?php echo $row['nombre']?>">
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                

                                                <div class="col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-comment"></i> Comentario <span
                                                                style="color: #20558A">*</span></label>
                                                        <textarea name="comentario" id="parti" required="required"
                                                            class="form-control" rows="3"
                                                            placeholder="Participantes"><?php echo $row['text_comen']?></textarea>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-3 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <!--<label  class="control-label">Categoria<span
                                                                style="color:turquoise">*</span> </label>-->
                                                                <input style="background-color: #45bcdb; color:#000000;" type="hidden"  name="categoria" require="" placeholder="categoria" class="form-control" readonly="" value="<?php echo $_SESSION["s_espeme"];?>">
                                                    </div>
                                                </div>
                                                
                                                <!-- parte que ocupada la pantalla completa -->
                                                <div style="display: flex; flex-direction:row; width: 100%; justify-content: center; padding-top: 2rem; padding-bottom: 2rem;">
                                                <div style="margin-right: 30px;">
                                                    <a href="mante_comentario.php" class="btn btn-danger btn-lg ">Cancelar</a>
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