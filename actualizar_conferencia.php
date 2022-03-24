<?php

include('php/consultas.php');
$query=extraerconferencia($_GET['id']);
    $row=$query->fetch_assoc();


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
    <title>Actulizar de conferencia</title>
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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/ico.png">
</head>
<body class="dark wow fadeInDown">

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
    <section  class="padding-top">
        <div class="container">
                <div>
                <div id="formc" class="col-md-12 col-sm-7">
                    <div class="col-md-12 col-sm-7">
                        <div class="post-thumb">
                            <div class="panel-dafault" style="margin-top: 12px">
                                <!--panel de crear -->
                                <div  class="panel-heading">
                                    <form action="php/conferencia_regi.php?accion=UDTCON" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div >
                                                <div class="col-lg-10 col-lg-offset-2 col-xs-12 col-xs-offset-0">
                                               <h1 class="title">Actualizar Conferencia</h1>
                                                <br>
                                                </div>
                                                <div class="col-md-1 col-md-offset-1 col-sm-1 col-sm-offset-2 col-lg-2 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                            <div class="form-group">
                                            <input  type="hidden" 
                                            name="codiconfe" require=""  class="form-control" readonly="" value="<?php echo $row['id_confe']?>">
                                            </div>
				                            </div>
                                                <div class="col-lg-3 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-align-left" aria-hidden="true"></i> Titulo de la conferencia<span
                                                                style="color: turquoise">*</span></label>
                                                        <input type="text" name="titulo" required="required"
                                                            placeholder="Titulo" class="form-control" value="<?php echo $row['titulo_confe']?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                    <label class="control-label"><i class="fa fa-link" aria-hidden="true"></i> Link de la conferencia<span
                                                            style="color: turquoise">*</span></label>
                                                    <div class="form-group">
                                                    <input type="text" name="link" required="required"
                                                            placeholder="LInk conferencia" class="form-control" value="<?php echo $row['link_confe']?>">
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-lg-3 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de inicio<span
                                                                style="color: turquoise">*</span></label>
                                                                <input type="datetime-local" name="fechini" required="required"
                                                            placeholder="Fecha inicio" class="form-control" value="<?php echo $row['fachainicio']?>">
                                                    </div>
                                                    </div>

                                                    <div class="col-lg-3 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                    
                                                        <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Cierre<span
                                                                style="color: turquoise">*</span></label>
                                                                <input type="datetime-local" name="fechfinal" required="required"
                                                            placeholder="Fecha Cierre" class="form-control" value="<?php echo $row['fechafinal']?>">
                                                    
                                                </div>

                                                <div class="col-lg-6 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-users" aria-hidden="true"></i>  Participantes</label>
                                                        <textarea name="parti" id="parti" required="required"
                                                            class="form-control" rows="3"
                                                            placeholder="Participantes"><?php echo $row['autores_confe']?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Estado de la conferencia<span
                                                                style="color: turquoise">*</span></label>
                                                                <select name="etapa" class="form-control" required="required">
                                                                    <option value="Programada" <?php if($row['etapa_confe']=='Programada'){echo "selected";} ?>>Programada</option>
                                                                    <option value="En vivo" <?php if($row['etapa_confe']=='En vivo'){echo "selected";} ?>>En vivo</option>
                                                
                                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-3 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <!--<label  class="control-label">Categoria<span
                                                                style="color:turquoise">*</span> </label>-->
                                                                <input style="background-color: #45bcdb; color:#000000;" type="hidden"  name="categoria" require="" placeholder="categoria" class="form-control" readonly="" value="<?php echo $_SESSION["s_espeme"];?>">
                                                    </div>
                                                </div>
                                                <div  class="col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-3 col-lg-8 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <br>
                                                    <label class="control-label"><i class="fa fa-file-text" aria-hidden="true"></i> Material de apoyo</label>
                                                    <input type="file" name="archivo" >
                                                </div>
                                                <!-- parte que ocupada la pantalla completa -->
                                                <div
                                                    class=" col-sm-offset-6 col-lg-4 col-lg-offset-4 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <br>
                                                        <input type="submit" value="Actualizar" class="btn btn-submit">
                                    </form>
                                    <div class="cancelar col-sm-6 col-sm-offset-6 col-lg-7 col-lg-offset-8 col-xs-12 col-xs-offset-12">
                                    <a href="mis_conferencia.php" class="btn btn-danger">Cancelar</a>
                                    </div>
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
    <?php include_once "./php/boton_medico.php"; ?>
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
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/temad.js"></script>
    <script type="text/javascript" src="js/medico_alerta.js"></script>
</body>

</html>