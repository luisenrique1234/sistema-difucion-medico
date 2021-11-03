<?php

include('php/mante_consultas.php');
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
if ($_SESSION["s_admin"] === null) {
    header("Location: ./admin_login.php");
} else{
    if($_SESSION["s_idRol3"]==2){
        header("Location: ./index.php");
    }
    elseif($_SESSION["s_idRol3"]==3){
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
    <title>Mantenimiento de publicaciones</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <link href="css/dark.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.0.9/dist/sweetalert2.all.js"></script>

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

<body class="dark">
    <header id="header">
        <div>
            <div class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                            <h1><img src="images/admin-logo.png" alt="logo" width="100" height="100"></h1>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="admin_bien.php">Inicio</a></li>
                            <li  class="dropdown"><a href="mante_medico.php">Lista de Médico<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="mante_medico.php">Lista de médico</a></li>
                                    <li><a href="desativado_medico.php">lista desactivado médico</a></li>
                                </ul>
                            </li>
                            <li class="active" class="dropdown"><a href="mante_public.php">Lista de publicacion<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="mante_public.php">Lista de publicacion</a></li>
                                    <li><a href="blog.html">Comentario publicacion</a></li>
                                    <li><a href="blogtwo.html">Lista destivado publicacion</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="mante_inve.php">Lista  investigaciones<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                <li><a href="mante_inve.php">Lista investigaciones</a></li>
                                <li><a href="#">Comentario investigacio</a></li>
                                    <li><a href="#">Lista desativado investigaciones</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="mante_rol.php">Roles<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                <li><a href="mante_rol.php">Roles médico</a></li>
                                <li><a href="#">Especialidades médicos</a></li>
                                </ul>
                            </li>
                            <li>
                                <!-- <div >
                            <img src="images/predeterminado.jpg" width="100%" height="60">
                            </div>-->
                                <a href="portfolio.html" class="btn btn-info"><?php echo $_SESSION["s_admin"]; ?>. .<i class="fa fa-user"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="pefil_medico.php">Mi perfil</a></li>
                                    <li><a onclick="return alertaactivar();">Cerrar sesion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="search">
                    <div class="social-icons search">
                        <div class="oscuro">
                            <div class="modo" id="modo">
                                <i class="fa fa-adjust" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
        <!-- fin de la segunda parte-->
        <div>
            <div class="panel-heading">
                <h1> Listado de Publicacion</h1>
                <div class="panel-body">
                    
                        <a href="nuevoma_medico.php" class="btn btn-info pull-letf" style="background-color: #0d87ac;">NUEVO</a>
                    
                    <br>
                    <hr>
                    <table class="table" style="text-align: center;">
                        <thead>
                            <tr style="background-color: #0d87ac; color:#FFFFFF;">
                                <!-- fila-->
                                <th>Código public</th>
                                <!--th colunma-->
                                <th>Código médico</th>
                                <th>Tituo</th>
                                <th>_____Autor_____</th>
                                <th>___________________________Publicacion_________________________________</th>
                                <th>Referencia</th>
                                <th>Link archivo</th>
                                <th>Fecha publicacion</th>
                                <th>Categaria</th>
                                <th>Tipo de archivo</th>
                                <th>votos</th>
                                <th>Estado</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        
                        
                        $query = lista_public();
                        while ($row = $query->fetch_assoc()) {
                            //$fecha2=$row["fecha_public"];
                        //$final = date_create($fecha2)->format('d/m/y');
                            echo "
            <tr>
            <td>" . $row["id_public"] . "</td>
            <td>" . $row["id_medico_pu"] . "</td>
			<td>" . $row["titulo_public"]. "</td>
            <td>" . substr($row["autor_pu"],0,100). "</td>
			<td>" . substr($row["text_public"],0,300). "</td>
            <td>" . substr($row["referencia_pu"],0,100) . "</td>
            <td>" . $row["link_archivo"] . "</td>
            <td>" . $row["fecha_public"] . "</td>
            <td>" . $row["categoria_public"] . "</td>
            <td>" . $row["tipo_archivo"] . "</td>
            <td>" . $row["me_gusta_pu"] . "</td>
            <td>" . $row["estado"] . "</td>
			
            <td>
            <a href='actualizarma_public.php?id=" . $row["id_public"] . "' class='btn btn-info' style='background-color: #0d87ac;'>Editar</a>
            <br>
            <br>
            <a href='php/tablas_mantenimiento.php?accion=DLT&id=" . $row["id_public"] . "' class='btn btn-danger confirm'>Eliminar</a>
            </td>
            </tr>
            ";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        

        <script>
                $(".confirm").click(function(e) {
  e.preventDefault(); // Prevent the href from redirecting directly
  var linkURL = $(this).attr("href");
  warnBeforeRedirect(linkURL);
});

function warnBeforeRedirect(linkURL) {
  swal({
    title: "¿Estas seguro de Eliminar este usuario?",
    text: "" + linkURL,
    type: "warning",
    showCancelButton: true,
    confirmButtonText: 'Sí <i class="fa fa-user-times" aria-hidden="true"></i>',
        cancelButtonText: 'Cancelar <i class="fa fa-times" aria-hidden="true"></i>',
  }).then(function(result) {
    console.log(result);
    if (result.value) {
      window.location.href = linkURL;
    }
  });
}
            
            function alertaactivar() {

                Swal.fire({
        title: '<h3>¿Estas seguro de cerrar sesion?</h3>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: '<h5>Salir</h5>',
        cancelButtonText: '<h5>Cancelar</h5>',
    })
    .then((result) => {
   if (result.value) {
     window.location.href = 'bd/logout2.php'
   }
 }); 


    }
        </script>
        <!--boton flotante donde esta los diferentes acciones -->
        <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p> Sistema de difusion medica 2021. Todos los derechos reservados.</p>
                            <p>Diseñado por<a target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
        <div class="con">
                        <input type="checkbox" id="btn-mas">
                        <div class="redes">
                            <a href="#" class="fa fa-user-circle"></a>
                            
                            <a href="buscador_m.php" class="fa fa-search"></a>
                            <a href="cientifico.php" class="fa fa-h-square" aria-hidden="true"></a>
                            <a href="form_public.php" class="fa fa-stethoscope"></a>
                        </div>
                        <div class="btn-mas">
                            <label for="btn-mas" class="fa fa-plus"></label>
                        </div>
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