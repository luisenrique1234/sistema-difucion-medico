<?php

include('./php/consultas.php');
$query=extraerpublic($_GET['id']);
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
    <title>Ver Artículo Completo</title>
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
<body class="dark" style="background: #F1F1F1">

<?php include_once "./php/menu_nada.php"; ?>
    <section   class="wow bounceInDown padding-top">
        <div style="display: flex; justify-content: center; width: 100%;">
        <div style="width: 50%;">
                <div>
                    <div>
                        <div id="cienfico" class="post-thumb">
                            <div class="panel-dafault" style="margin-top: 12px">
                                <!--panel de crear -->
                                <div>
                                        
                                            <div >
                                                <div style="margin-bottom: 2rem;" class=" text-center  col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                               <h1 class="title">Aríticulo</h1>
                                                </div>
                                                
                                                
                                            <input type="hidden" name="codioarti" class="form-control" readonly="" value="<?php echo $row['id_public']?>">
                                            

                                                <div class="col-md-5 col-md-offset-1 col-sm-4 col-sm-offset-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-header"></i> Titulo del Artículo<span
                                                                style="color: #20558A">*</span></label>
                                                        <input type="text" name="titulo" required="required"
                                                        class="form-control" readonly="" value="<?php echo $row['titulo_public']?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                <div class="form-group">
                                                        <label  class="control-label">Tema<span
                                                                style="color:turquoise">*</span> </label>
                                                    

                                                        <select name="tema" class="form-control" readonly="" required="required">
                                                            <?php
					                                        include '../php/conexion.php';
					                                        $getAlumno1 = "SELECT * FROM  especialidad";
					                                        $gerAlumno2 = $mysqli->query ($getAlumno1);
					                                        while ($row2 = mysqli_fetch_array($gerAlumno2))
					                                        {
					                                            $id = $row2 ['id_espec'];
					                                        	$espe = $row2['espec_descripsion'];?>
                                                            <option value="<?php echo $id?>" <?php if($row['categoria_public']==$id){echo "selected";} ?>><?php echo $espe;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-10 col-md-offset-1 col-sm-4 col-sm-offset-2">
                                                <div class="form-group">
                                                    <label class="control-label"><i class="fa fa-pencil-square-o"></i> Resumen<span
                                                            style="color: turquoise">*</span></label>
                                                    <div class="form-group">
                                                        <textarea name="resumen"  readonly="" required="required"
                                                            class="form-control" rows="4"
                                                            ><?php echo $row['text_public']?></textarea>
                                                    </div>
                                                    </div>
                                                </div>

                                               
                                                
                                                <div class="col-lg-5 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-users"></i> Autores</label>
                                                        <textarea name="autor"  required="required"
                                                            class="form-control" readonly="" rows="3"><?php echo $row['autor_pu']?></textarea>
                                                    </div>
                                                </div>

                                                    <div class="col-lg-5 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label"><i class="fa fa-book"></i> Bibliografía<span
                                                                style="color: turquoise">*</span></label>
                                                        <textarea name="biblio"  required="required"
                                                            class="form-control" readonly="" rows="3"><?php echo $row['referencia_pu']?></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <!-- parte que ocupada la pantalla completa -->
                                                <div style="display: flex; flex-direction:row; width: 100%; justify-content: center; padding-top: 2rem; padding-bottom: 2rem;">
                                                <div >
                                                    <a href="mis_articulos.php" class="btn btn-danger btn-lg ">Cancelar</a>
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