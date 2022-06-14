<?php


include('php/consultas.php');
$query=extraerinvestigacion($_GET['id']);
	
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
    <title>Investigacion Cientifica</title>
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

<body class="dark">
    
<?php include_once "./php/menu.php"; ?>

    <!--/#header-->

    <!--/#action-->
    <section class="padding-top">
        <div id="formc" class="container">
            <div class="col-lg-6 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                <h3>Formulario de investigacion medica</h3>
            </div>

            <div class="row">
                <div class="col-md-10 col-sm-7">
                    <div class="col-md-12 col-sm-12">
                        <div class="post-thumb">
                            <div class="panel-dafault" style="margin-top: 12px">
                                <!--panel de crear -->
                                <div class="panel-heading">
                                    <form action="php/pcientifico.php?accion=UDT" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="wow fadeInDown">

                                            <div class="col-md-4 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-3 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                            <div class="form-group">
                                            <input type="hidden" name="codigoinv" require="" placeholder="codigoinv" class="form-control" readonly="" value="<?php echo $row['id_inv']?>">
                                            </div>
				                            </div>
                                                <div class="col-lg-6 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Titulo<span
                                                                style="color: turquoise">*</span></label>
                                                        <input type="text" name="titulo" required="required"
                                                            placeholder="Titulo" class="form-control" value="<?php echo $row['titulo_inv']?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Autor</label>
                                                        <input type="text" name="autor" required="required"
                                                            placeholder="Autor" class="form-control" value="<?php echo $row['autor_inv']?>">
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-8 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Resumen<span
                                                                style="color: turquoise">*</span></label>
                                                        <div class="form-group">
                                                            <textarea name="resumen" id="resumen" required="required"
                                                                class="form-control" rows="8"
                                                                placeholder="Escribe una publicacion"><?php echo $row['resume_inv'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-8 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Introducción<span
                                                                style="color: turquoise">*</span></label>
                                                        <div class="form-group">
                                                            <textarea name="intro" id="intro" required="required"
                                                                class="form-control" rows="8"
                                                                placeholder="Escribe la introducciòn"><?php echo $row['introducion_inv'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Palabras Claves<span
                                                                style="color: turquoise">*</span></label>
                                                        <input type="text" name="pclave" id="pclave" required="required"
                                                            placeholder="Plabras Claves" class="form-control" value="<?php echo $row['pclave_inv'];?>">
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-8 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group" >
                                                        <label class="control-label">Antecedentes<span
                                                                style="color: turquoise">*</span></label>
                                                        <div class="form-group">
                                                            <textarea name="antece" id="antece" required="required"
                                                                class="form-control" rows="8"
                                                                placeholder="Escribe Antecedentes"><?php echo $row['Antecedente_inv'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-6 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Objetivo general<span
                                                                style="color: turquoise">*</span></label>
                                                        <div class="form-group">
                                                            <textarea name="objegen" id="objegen" required="required"
                                                                class="form-control" placeholder="objetivo general"
                                                                cols="40" rows="2" style="resize: both;"><?php echo $row['objetivoge_inv'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-6 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Objetivo Espesificos<span
                                                                style="color: turquoise">*</span></label>
                                                        <div class="form-group">
                                                            <textarea name="objees" id="objees" required="required"
                                                                class="form-control"
                                                                placeholder="objetivo Espesisificos" cols="40" rows="2"
                                                                style="resize: both;"><?php echo $row['objetivoes_inv'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-8 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Justificacion<span
                                                                style="color: turquoise">*</span></label>
                                                        <div class="form-group">
                                                            <textarea name="justifi" id="justifi" required="required"
                                                                class="form-control" rows="8"
                                                                placeholder="Escribe Justificacion"><?php echo $row['justificasion_inv'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-6 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Hipòtesis<span
                                                                style="color: turquoise">*</span></label>
                                                        <div class="form-group">
                                                            <textarea name="hipo" id="hipo" required="required"
                                                                class="form-control" placeholder="Hipotesis" cols="40"
                                                                rows="2" style="resize: both;"><?php echo $row['hipotesis_inv'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-6 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Metodologia<span
                                                                style="color: turquoise">*</span></label>
                                                        <div class="form-group">
                                                            <textarea name="metodo" id="metodo" required="required"
                                                                class="form-control" placeholder="Metodologia" cols="40"
                                                                rows="2" style="resize: both;"><?php echo $row['metodologia_inv'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-6 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Bibliografía<span
                                                                style="color: turquoise">*</span></label>
                                                        <div class="form-group">
                                                            <textarea name="biblio" id="biblio" 
                                                                class="form-control" placeholder="Bibliografía" cols="40"
                                                                rows="2" style="resize: both;"><?php echo $row['bibliografia'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Referencias<span
                                                                style="color: turquoise">*</span></label>
                                                        <!--<input type="text" name="referencia" required="required" placeholder="Referencias" class="form-control">-->
                                                        <input type="text" name="referencia" require="" placeholder="referencia" class="form-control"  value="<?php echo $row['referencias_inv']?>">
                                                        
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-lg-3 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                                <input style="background-color: #5dcfcf; color:#000000;" type="hidden" name="categoria" require="" placeholder="categoría" class="form-control" readonly="" value="<?php echo $row['cotegoria_inv']?>">
                                                    </div>
                                                </div>
                                                <!-- parte que ocupada la pantalla completa -->
                                                <div
                                                    class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-3 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <br>
                                                        <input type="submit" value="Actualizar" class="btn btn-submit">
                                    </form>
                                    <br>
                                    <br>
                                    <a href="lista_publicm.php" class="btn btn-danger">Cancelar</a>
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
    <script type="text/javascript" src="js/medico_alerta.js"></script>
    <script type="text/javascript" src="js/temad.js"></script>
</body>

</html>