<?php


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
    <title>Gráficos Médico</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">

    <link rel="stylesheet" href="css/boton.css">

    <script src="js/plotly-latest.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://vjs.zencdn.net/7.5.4/video-js.css" rel="stylesheet">
    <script src='https://vjs.zencdn.net/7.5.4/video.js'></script>
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

<body>

<?php include_once "./php/menu.php"; ?>


    <!--/#header-->
    <br>
    <br>
    <br>
    <br>
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div>
                        <div class="col-sm-12">
                            <h3>Gráficos de Publicaciónes</h3>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </section>



    <!--/#page-breadcrumb-->

    <section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                  
                                <div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h4 class="m-0 font-weight-bold text-primary"><i class="fa fa-heartbeat" aria-hidden="true"></i> Me gustas de la publicación</h4>
    </div>
    <!-- Cuerpo de la grafica lineas -->
    <!-- Cuerpo de la grafica lineas -->
    <!-- Cuerpo de la grafica lineas -->
    <!-- Cuerpo de la grafica lineas -->
    <!-- Cuerpo de la grafica lineas -->
    <div class="card-body">
      <div  id="graficalinealme">
      
      </div>
    </div>
  </div>
</div>


<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h4 class="m-0 font-weight-bold text-primary"><i class="fa fa-map-marker" aria-hidden="true"></i> Fuente de trafico</h4>
    </div>
    <!-- Cuerpo de la grafica  circular -->
    <!-- Cuerpo de la grafica circular -->
    <!-- Cuerpo de la grafica circular -->
    <!-- Cuerpo de la grafica circula -->
    <!-- Cuerpo de la grafica circular -->
    <div class="card shadow mb-4">
      <div id="graficacircular_me">
      
        
      </div>
      
    </div>
  </div>
</div>


<div class="col-xl-4 col-lg-5">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h4 class="m-0 font-weight-bold text-primary"><i class="fa fa-stethoscope" aria-hidden="true"></i> Especialidades medicas</h4>
    </div>
    <!-- Cuerpo de la grafica  circular -->
    <!-- Cuerpo de la grafica circular -->
    <!-- Cuerpo de la grafica circular -->
    <!-- Cuerpo de la grafica circula -->
    <!-- Cuerpo de la grafica circular -->
    <div class="card shadow mb-4">
      <div id="cargacircular_me2">
      
        
      </div>
      
    </div>
  </div>
</div>


</div>

<div class="col-xl-8 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h4 class="m-0 font-weight-bold text-primary"><i class="fa fa-heartbeat" aria-hidden="true"></i> Me gustas de la Investigacion</h4>
    </div>
    <!-- Cuerpo de la grafica lineas -->
    <!-- Cuerpo de la grafica lineas -->
    <!-- Cuerpo de la grafica lineas -->
    <!-- Cuerpo de la grafica lineas -->
    <!-- Cuerpo de la grafica lineas -->
    <div class="card-body">
      <div  id="graficalineal_me2">
      
      </div>
    </div>
  </div>
</div>


                                
                                    

                                        <!--boton flotante donde esta los diferentes acciones -->
                    <div class="con">
                    <?php include_once "./php/boton_medico.php"; ?>
                    </div>
                    <!--*******************************************************-->
                                    <!--/Response-area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                        </div>
                        <div class="sidebar-item categories">
                            <h3>Especialidades</h3>
                            <ul class="nav navbar-stacked">
                                <li><a href="#">Pediatria</a></li>
                                <li class="active"><a href="#">Cardiologia</a></li>
                                <li><a href="#">Cirugia general</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--<div class="  col-lg-4 col-lg-offset-7">
                    <div class="contact-form bottom">
                        <h2>Deja tu comentario</h2>
                        <form <?php /*echo "action='php/comentariop.php?id2=1&accion=INS'  method='post'"; */ ?> >
                            <div class="form-group">
                                <textarea name="comentario" id="message" required="required" class="form-control" rows="8" placeholder="Tu texto aqui"></textarea>
                            </div>                        
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Comentar">
                            </div>
                        </form>
                    </div>
                </div>-->
    <!--/#blog-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p> Sistema de difusión medica 2021. Todos los derechos reservados.</p>
                            <p>Diseñado por<a target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <!--/#footer-->

    <!--codigo del mesange cierre jj de sesion-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/medico_alerta.js"></script>
    <!--LUgar donde esta el ativador del modo oscuro -->
    <script type="text/javascript" src="js/temad.js"></script>


    <script type="text/javascript">
$(document).ready(function(){
	$('#graficalinealme').load('graficos/lineal_medico.php');
  $('#graficacircular_me').load('graficos/circular_medico.php');
  $('#cargacircular_me2').load('graficos/circular_medico2.php');
  $('#graficalineal_me2').load('graficos/lineal_medico2.php');

});

</script>
</body>

</html>