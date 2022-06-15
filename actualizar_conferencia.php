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
<body class="dark" style="background: #F1F1F1">

<?php include_once "./php/menu_nada.php"; ?>
    <section  class="wow bounceInDown padding-top">
        <div style="display: flex; justify-content: center; width: 100%;">
        <div style="width: 50%;">
                    <div id="formc" class="post-thumb">
                            <div class="panel-dafault" style="margin-top: 12px">
                                <!--panel de crear -->
                                <div>
                                    <form action="php/conferencia_regi.php?accion=UDTCON" method="POST" enctype="multipart/form-data">
                                        <div>
                                            <div>
                                                <div style="margin-bottom: 2rem;" class="text-center col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                               <h1 class="title">Editar Conferencia</h1>
                                                </div>
                                                <div class="col-md-1 col-md-offset-1 col-sm-8 col-sm-offset-2 col-lg-2 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                            <div class="form-group">
                                            <input  type="hidden" 
                                            name="codiconfe" require=""  class="form-control" readonly="" value="<?php echo $row['id_confe']?>">
                                            </div>
				                            </div>
                                                <div class="col-md-5 col-md-offset-1 col-sm-4 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-header"></i>  Título de la conferencia<span
                                                                style="color: #20558A">*</span></label>
                                                        <input type="text" name="titulo" required="required"
                                                            placeholder="Titulo" class="form-control" value="<?php echo $row['titulo_confe']?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-5 col-md-offset-0 col-sm-4 col-sm-offset-2">
                                                    <div class="form-group">
                                                    <label class="control-label"><i class="fa fa-link" aria-hidden="true"></i> Link de la conferencia<span
                                                            style="color: #20558A">*</span></label>
                                                    <div class="form-group">
                                                    <input type="text" name="link" required="required"
                                                            placeholder="LInk conferencia" class="form-control" value="<?php echo $row['link_confe']?>">
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-lg-5 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de inicio<span
                                                                style="color: #20558A">*</span></label>
                                                                <input type="datetime-local" name="fechini" required="required"
                                                            placeholder="Fecha inicio" class="form-control" value="<?php echo $row['fachainicio']?>">
                                                    </div>
                                                    </div>

                                                    <div class="col-lg-5 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                    
                                                        <label class="control-label"><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Cierre<span
                                                                style="color: #20558A">*</span></label>
                                                                <input type="datetime-local" name="fechfinal" required="required"
                                                            placeholder="Fecha Cierre" class="form-control" value="<?php echo $row['fechafinal']?>">
                                                    
                                                </div>

                                                <div class="col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-users" aria-hidden="true"></i>  Participantes <span
                                                                style="color: #20558A">*</span></label>
                                                        <textarea name="parti" id="parti" required="required"
                                                            class="form-control" rows="3"
                                                            placeholder="Participantes"><?php echo $row['autores_confe']?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Estado de la conferencia<span
                                                                style="color: #20558A">*</span></label>
                                                                <select name="etapa" class="form-control" required="required">
                                                                    <option value="Programada" <?php if($row['etapa_confe']=='Programada'){echo "selected";} ?>>Programada</option>
                                                                    <option value="En vivo" <?php if($row['etapa_confe']=='En vivo'){echo "selected";} ?>>En vivo</option>
                                                
                                                                    </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                <div class="form-group">
                                                        <label  class="control-label"><i class="fa fa-tag"></i> Tema<span
                                                                style="color:#20558A">*</span> </label>
                                                    

                                                        <select name="tema" class="form-control" required="required">
                                                            <?php
					                                        include '../php/conexion.php';
					                                        $getAlumno1 = "SELECT * FROM  especialidad";
					                                        $gerAlumno2 = $mysqli->query ($getAlumno1);
					                                        while ($row2 = mysqli_fetch_array($gerAlumno2))
					                                        {
					                                            $id = $row2 ['id_espec'];
					                                        	$espe = $row2['espec_descripsion'];?>
                                                            <option value="<?php echo $id?>" <?php if($row['categoria_confe']==$id){echo "selected";} ?>><?php echo $espe;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div  class=" col-lg-4 col-lg-offset-1 col-xs-12 col-xs-offset-0" style="margin-top: -3%;">
                                                    <br>
                                                    <label class="control-label"><i class="fa fa-file-pdf-o"></i> Material de apoyo</label>
                                                    <input type="file" name="archivo" >
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
    </section>
                    <br>
    <footer id="footer">
        <div class="container">
            <div class="row footer">
                <div class="col-sm-12 ">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p>Sistema de difusión de información médica 2022. Todos los derechos reservados.</p>
                            <p>Diseñado por: <a  target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
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