<?php


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
    <title>Formulario de conferencia</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/boton.css">
    <link rel="stylesheet" href="css/cientifico.css">
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/ico.png">
</head>
<body class="dark wow fadeInDown" style="background: #F1F1F1">

<?php include_once "./php/menu.php"; ?>
    <!--/#header-->
    <!--id la imagen de triangulor que se usa para el inicio
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="col-lg-6 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                    <div>
                        <div class="col-sm-12">
                            <h1 class="title">Formulario de publicacion</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!--/#action-->
    <section   class="padding-top">
        <div style="display: flex; justify-content: center; width: 100%;">
        <div style="width: 50%;">
                <div>
                    <div>
                        <div id="cienfico" class="post-thumb">
                            <div class="panel-dafault" style="margin-top: 12px">
                                <!--panel de crear -->
                                <div >
                                    <form action="php/conferencia_regi.php?accion=INSCON" method="POST" enctype="multipart/form-data">
                                        
                                            <div >
                                                <div style="margin-bottom: 2rem;" class=" text-center  col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                               <h1 class="title">Crear Conferencia</h1>
                                                </div>
                                                
                                                <div class="col-md-5 col-md-offset-1 col-sm-4 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-header"></i> Titulo de la conferencia<span
                                                                style="color: #20558A">*</span></label>
                                                        <input type="text" name="titulo" required="required"
                                                            placeholder="Mí conferencia" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-5 col-md-offset-0 col-sm-4 col-sm-offset-2">
                                                    <div class="form-group">
                                                    <label class="control-label"><i class="fa fa-link"></i> Link de la conferencia<span
                                                            style="color: #20558A"> *</span></label>
                                                    <div class="form-group">
                                                    <input type="text" name="link" required="required"
                                                            placeholder="https://www.youtube.com/mi-conferecia" class="form-control">
                                                    </div>
                                                    </div>
                                                </div>

                                               
                                                
                                                <div class="col-lg-5 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-calendar"></i> Fecha de inicio<span
                                                                style="color: turquoise">*</span></label>
                                                                <input type="datetime-local" name="fechini" required="required"
                                                            placeholder="Fecha inicio" class="form-control">
                                                    </div>
                                                </div>

                                                    <div class="col-lg-5 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                        <label class="control-label"><i class="fa fa-calendar"></i> Fecha de Cierre<span
                                                                style="color: turquoise">*</span></label>
                                                                <input type="datetime-local" name="fechfinal" required="required"
                                                            placeholder="Fecha Cierre" class="form-control">
                                                </div>

                                                <div class="col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-users"></i> Participantes</label>
                                                        <textarea name="parti" id="parti" required="required"
                                                            class="form-control" rows="3"
                                                            placeholder="Agregar participante"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-3 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    
                                                                <input style="background-color: #20558A; color:#000000;" type="hidden"  name="categoria" require="" placeholder="categoria" class="form-control" readonly="" value="<?php echo $_SESSION["s_espeme"];?>">
                                                    
                                                </div>
                                                <div  class="col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-3 col-lg-8 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                                    <label class="control-label"><i class="fa fa-file-pdf-o"></i> Subir material de apoyo</label>
                                                    <input type="file" name="archivo" >
                                                </div>
                                                <br>
                                                <!-- parte que ocupada la pantalla completa -->
                                                <div style="display: flex; flex-direction:row; width: 100%; justify-content: center; padding-top: 2rem; padding-bottom: 2rem;">
                                                <div style="margin-right: 30px;">
                                                    <a href="mis_conferencia.php" class="btn btn-danger btn-lg ">Cancelar</a>
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
                        
                    </div>
            </div>
    </section>

    <!--boton flotante donde esta los diferentes acciones -->
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
            </div>
    </footer>
    <!--/#footer-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/temad.js"></script>
    <script type="text/javascript" src="js/medico_alerta.js"></script>
</body>

</html>