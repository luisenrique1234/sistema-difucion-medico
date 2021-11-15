<?php

include('php/consultas.php');
/*esta fucion sirve para converti toddos los carateres como acentos en formato
uti-8 indenpedientemente de cual fuera su formato de  origen todo se convertira en 
utf-8 para que asi todos tengan el mismo formato*/
function mostrar($str)
{
    $codi = mb_detect_encoding($str, "ISO-8859-1,UTF-8");
    $str = iconv($codi, 'ISO-8859-1', $str);
    echo $str;
}

session_start();
if ($_SESSION["s_medico"] === null) {
    header("Location: ./login.php");
} else {
    if ($_SESSION["s_idRol2"] == 3) {
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
    <title>Sistama de divulgacion médico</title>
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
<!--/head-->

<body class="dark" >
<?php include_once "./php/menu.php"; ?>
        <!-- fin de la segunda parte-->
        <div class="col-md-9 col-sm-7">
                    <div class="col-md-12 col-sm-12">
                        <div class="post-thumb">
                            <div class="panel-dafault" style="margin-top: 12px">
                                <!--panel de crear -->
                                <div class="wow fadeInDown">
                                <div class="panel-heading">
                                    <form action="php/registro_medico.php?accion=UDT" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                            <div class="col-lg-10 col-lg-offset-7 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                    <br>
                                                    <br>
                                                    <h1><img src="images/perfil/perfil.png"  width="150" height="150"></h1>
                                                    </div>
                                                </div>


                                                <div class="col-md-1 col-md-offset-1 col-sm-1 col-sm-offset-2 col-lg-2 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                            <div class="form-group">
                                                                <input style="background-color: #5cc4dc; color:#000000;" type="hidden" 
                                                                name="codigom" require="" placeholder="categoria" class="form-control" readonly="" value="<?php echo $row['id_medico']?>">
                                            </div>
				                            </div>
                                                <div class="col-md-1 col-md-offset-1 col-sm-1 col-sm-offset-2 col-lg-3 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">

                                                        <label class="control-label">Nombre<span
                                                                style="color: turquoise">*</span></label>
                                                        <input type="text" name="nombre" required="required"
                                                            placeholder="Nombre" class="form-control" value="<?php echo $_SESSION["s_nombre"]?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-3 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Apellido</label>
                                                        <input type="text" name="apellido" required="required" placeholder="Apellido" class="form-control" value="<?php echo $_SESSION["s_apellido"]?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-3 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                    <label class="control-label">Exequátur<span
                                                            style="color: turquoise">*</span></label>
                                                    <div class="form-group">
                                                    <input type="text" name="sqmedico" required="required" placeholder="Medioc" class="form-control" value="<?php echo $_SESSION["s_codime"]?>">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-3 col-lg-offset-5 col-xs-12 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label class="control-label">Provincia<span
                                                                style="color: turquoise">*</span></label>

                                                                
                                    <label for="usuario" class="text-dark"></label><br>
                                    <select name="provicia" class="form-control" required="required">
                                        <option value="La Vega" selected>La Vega</option>
                                        <option value="Santiago">Santiago</option>
                                        <option value="Valverde">Valverde</option>
                                        <option value="Valverde">Valverde</option>
                                        <option value="Santiago Rodríguez">Santiago Rodríguez</option>
                                    </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-1 col-lg-3 col-lg-offset-1 col-xs-10 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label  class="control-label">Nombre de usuario<span
                                                                style="color:turquoise">*</span> </label>
                                                        <input  type="text" name="userac" require="" placeholder="Contraseña" class="form-control"  value="<?php echo $_SESSION["s_medico"]?>">
                                                    </div>
                                                </div>
                                                <!--<div class="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-1 col-lg-3 col-lg-offset-5 col-xs-10 col-xs-offset-0">
                                                    <div class="form-group">
                                                        <label  class="control-label">Rol del médico<span
                                                                style="color:turquoise">*</span> </label>
                                                    </div>
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
                                    <a href="pefil_medico.php" class="btn btn-danger">Cancelar</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        

        
        <script>
            function alertaeliminar() {
                var respuesta = confirm("Estas seguro de Eliminar a este Publicación");
                if (respuesta == true) {
                    return true;
                } else {
                    return false;
                }
            }

            function alertaactivar() {

        var respuesta = confirm("Estas seguro de Cerrar Sesion");

        if (respuesta == true) {
            return true;
        } else {

            return false;

        }


    }
        </script>
        <!--boton flotante donde esta los diferentes acciones -->
        <div class="con">
        <?php include_once "./php/boton_medico.php"; ?>
                    </div>
                    <!--*******************************************************-->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/lightbox.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <!--LUgar donde esta el ativador del modo oscuro -->
        <script type="text/javascript" src="js/temad.js"></script>
    </body>
</html>