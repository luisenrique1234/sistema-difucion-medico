<?php include ('php/conexion.php'); ?>

<?php


// Desactivar toda notificación de error si quieres ver los errores tienes que quitar esta linea
error_reporting(0);



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
    <title>Buscador</title>
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
<body class="dark">

<header id="header">
        
        <div class="dark1">
            <div class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="index.php">Inicio</a></li>
                            <li class="dropdown"><a href="pediatria.php">Pediatria<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="aboutus.html">Enbarosos</a></li>
                                    <li><a href="aboutus2.html">Maltrato infantil</a></li>
                                    <li><a href="service.html">Salud infantil</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="Cardiologia.php">Cardiologia<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Ataques al corazon</a></li>
                                    <li><a href="blogtwo.html">Arritmia cardiaca</a></li>
                                    <li><a href="blogone.html">Taquicardia</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="cirugia_general.php">Cirugia general<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Anestecia</a></li>
                                    <li><a href="#">Anestecia Local</a></li>
                                </ul>
                            </li>
                            <li >
                        
                           <!-- <div >
                            <img src="images/predeterminado.jpg" width="100%" height="60">
                            </div>-->
                                <a href="portfolio.html" class="btn btn-info"><?php  echo $_SESSION["s_medico"];?>.  .<i class="fa fa-user"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="pefil_medico.php">Mi perfil</a></li>
                                    <li><a href="lista_publicm.php">Mis Publicaciones</a></li>
                                    <li><a href="bd/logout.php" onclick="return alertaactivar();">Cerrar sesion</a></li>
                                </ul>
                                 
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Buscar">
                        </div>
                    </form>
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



    <div class="col-lg-1 col-lg-offset-0 col-xs-12 col-xs-offset-0">
        <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="logo" width="100" height="100"></a>
        </div>

<div class="container mt-5">
    <div >
 


    <div>
<div >
<div class="card">
<div class="card-body">

        


<form id="form2" name="form2" method="POST" action="buscador_m.php">
        
        <div>

        


            <div class="col-lg-9 col-lg-offset-1 col-xs-12 col-xs-offset-0 ">
            
            <h3 class="card-title">Buscador</h3>
                    <label  class="form-label">Titulo a buscar</label>
                     
                    <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $_POST["buscar"]?>"  >
                    
            </div>

                <div >

                        <table class="table">
                                <thead>
                                        <div>
                                                <div class="col-lg-2 col-lg-offset-2 col-xs-12 col-xs-offset-0">    
                                                <label  class="control-label">Categoria </label>
                                                        <select id="assigned-tutor-filter" id="buscacategoria" name="buscacategoria" class="form-control mt-2">
                                                                <?php if ($_POST["buscacategoria"] != ''){ ?>
                                                                <option value="<?php echo $_POST["buscacategoria"]; ?>"><?php echo $_POST["buscacategoria"]; ?></option>
                                                                <?php } ?>
                                                                <option value="Todos">Todos</option>
                                                                <option value="radiología">radiología </option>
                                                                <option value="Pediatria">Pediatria</option>
                                                                <option value="Cardiología">Cardiología</option>
                                                        </select>
                                                </div>
                                                <div class=" col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                        
                                                        <label  class="control-label">Fecha desde:</label>
                                                        <input type="date" id="buscafechadesde" name="buscafechadesde" class="form-control mt-2" value="<?php echo $_POST["buscafechadesde"]; ?>" style="border: #bababa 1px solid; color:#0d87ac;">
                                                </div>
                                                <div class="col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                        
                                                        <label  class="control-label">Fecha hasta:</label>
                                                        <input type="date" id="buscafechahasta" name="buscafechahasta" class="form-control mt-2" value="<?php echo $_POST["buscafechahasta"]; ?>" style="border: #bababa 1px solid; color:#0d87ac;" >
                                                </div>
                                                <div class="col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                <label  class="control-label">Tipo de archivo</label>
                                                        <select id="subject-filter" id="tipo" name="tipo" class="form-control mt-2">
                                                                <?php if ($_POST["tipo"] != ''){ ?>
                                                                <option value="<?php echo $_POST["tipo"]; ?>"><?php echo $_POST["tipo"]; ?></option>
                                                                <?php } ?>
                                                                <option value="Todos">Todos</option>
                                                                <option value="pdf">PDF </option>
                                                                <option value="mp4">Mp4</option>
                                                                <option value="docx">DOCX</option>
                                                        </select>
                                                </div>
                                        </div>
                                </thead>
                        </table>
                </div>
                <div class="col-1">
                        <input type="submit" class="btn btn-success" value="Ver" style="margin-top: 38px;">
                </div>
        </div>

        
        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/

        if ($_POST["buscar"] == '' AND $_POST["buscacategoria"] =='Todos' AND $_POST["buscafechadesde"] =='' AND $_POST["tipo"] =='Todos' ){ $filtro = "";}else{
        if ($_POST["buscar"] != '' AND $_POST["buscacategoria"] =='Todos' AND $_POST["buscafechadesde"] =='' AND $_POST["tipo"] =='Todos'  ){ $filtro = "WHERE titulo_public LIKE '%".$_POST["buscar"]."%'";}
        
        
        if ($_POST["buscar"] == '' AND $_POST["buscacategoria"] !='Todos' AND $_POST["buscafechadesde"] =='' AND $_POST["tipo"] =='Todos'  ){ $filtro = "WHERE categoria_public = '".$_POST["buscacategoria"]."'";}
        
        //echo("<h4>$filtro</h4>");
        if ($_POST["buscar"] != '' AND $_POST["buscacategoria"] !='Todos' AND $_POST["buscafechadesde"] =='' AND $_POST["tipo"] =='Todos'  ){ $filtro = "WHERE titulo_public LIKE '%".$_POST["buscar"]."%' AND categoria_public = '".$_POST["buscacategoria"]."'";}

        if ($_POST["buscar"] == '' AND $_POST["buscacategoria"] !='Todos' AND $_POST["buscafechadesde"] !='' AND $_POST["tipo"] =='Todos'  ){ $filtro = "WHERE categoria_public= '".$_POST["buscacategoria"]."' AND fecha_public BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' ";}
        
        if ($_POST["buscar"] != '' AND $_POST["buscacategoria"] !='Todos' AND $_POST["buscafechadesde"] !='' AND $_POST["tipo"] =='Todos'  ){ $filtro = "WHERE titulo_public LIKE '%".$_POST["buscar"]."%' AND categoria_public = '".$_POST["buscacategoria"]."' AND fecha_public BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' ";}
        
        if ($_POST["buscar"] == '' AND $_POST["buscacategoria"] !='Todos' AND $_POST["buscafechadesde"] !='' AND $_POST["tipo"] !='Todos'  ){ $filtro = "WHERE categoria_public= '".$_POST["buscacategoria"]."' AND fecha_public BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' AND tipo_archivo = '".$_POST["tipo"]."' ";}
        
        if ($_POST["buscar"] != '' AND $_POST["buscacategoria"] !='Todos' AND $_POST["buscafechadesde"] !='' AND $_POST["tipo"] !='Todos'  ){ $filtro = "WHERE titulo_public LIKE '%".$_POST["buscar"]."%' AND categoria_public = '".$_POST["buscacategoria"]."' AND fecha_public  BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' AND tipo_archivo = '".$_POST["tipo"]."' ";}
        
        if ($_POST["buscar"] == '' AND $_POST["buscacategoria"] =='Todos' AND $_POST["buscafechadesde"] !='' AND $_POST["tipo"] =='Todos'  ){ $filtro = "WHERE fecha_public BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."'  ";}
        
        if ($_POST["buscar"] != '' AND $_POST["buscacategoria"] =='Todos' AND $_POST["buscafechadesde"] !='' AND $_POST["tipo"] =='Todos'  ){ $filtro = "WHERE titulo_public LIKE '%".$_POST["buscar"]."%' AND fecha_public BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."'  ";}
        
        if ($_POST["buscar"] == '' AND $_POST["buscacategoria"] =='Todos' AND $_POST["buscafechadesde"] !='' AND $_POST["tipo"] !='Todos'  ){ $filtro = "WHERE fecha_public BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' AND tipo_archivo = '".$_POST["tipo"]."' ";}
        
        if ($_POST["buscar"] != '' AND $_POST["buscacategoria"] =='Todos' AND $_POST["buscafechadesde"] !='' AND $_POST["tipo"] !='Todos'  ){ $filtro = "WHERE titulo_public LIKE '%".$_POST["buscar"]."%' AND fecha_public BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' AND tipo_archivo = '".$_POST["tipo"]."' ";}
        
        if ($_POST["buscar"] == '' AND $_POST["buscacategoria"] !='Todos' AND $_POST["buscafechadesde"] =='' AND $_POST["tipo"] !='Todos'  ){ $filtro = "WHERE categoria_public = '".$_POST["buscacategoria"]."' AND tipo_archivo = '".$_POST["tipo"]."' ";}
        
        if ($_POST["buscar"] != '' AND $_POST["buscacategoria"] !='Todos' AND $_POST["buscafechadesde"] =='' AND $_POST["tipo"] !='Todos'  ){ $filtro = "WHERE titulo_public LIKE '%".$_POST["buscar"]."%' AND categoria_public = '".$_POST["buscacategoria"]."' AND tipo_archivo = '".$_POST["tipo"]."' ";}
        
        if ($_POST["buscar"] == '' AND $_POST["buscafechadesde"] !='' AND $_POST["buscacategoria"] =='Todos' AND $_POST["tipo"] =='Todos' ){ $filtro = "WHERE fecha_public BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."'";}
        
        if ($_POST["buscar"] != '' AND $_POST["buscafechadesde"] !='' AND $_POST["buscacategoria"] =='Todos' AND $_POST["tipo"] =='Todos' ){ $filtro = "WHERE titulo_public LIKE '%".$_POST["buscar"]."%' AND fecha_public BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."'";}
        
        if ($_POST["buscar"] == '' AND $_POST["tipo"] !='Todos' AND $_POST["buscafechadesde"] =='' AND $_POST["buscacategoria"] =='Todos' ){ $filtro = "WHERE tipo_archivo = '".$_POST["tipo"]."'";}
        
        if ($_POST["buscar"] != '' AND $_POST["tipo"] !='Todos' AND $_POST["buscafechadesde"] =='' AND $_POST["buscacategoria"] =='Todos' ){ $filtro = "WHERE titulo_public LIKE '%".$_POST["buscar"]."%' AND tipo_archivo = '".$_POST["tipo"]."'";}
        
        }

        $sql2=("SELECT * FROM publicacion $filtro ");
        $sql= $mysqli->query($sql2);
        $numeroSql = mysqli_num_rows($sql);

        ?>
        <p style="font-weight: bold; color:rgb(94, 200, 214);"><i class="fa fa-area-chart" aria-hidden="true"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
</form>


<div class="table-responsive">
        <table class="table">
                <thead>
                        <tr style="background-color: #0d87ac; color:#FFFFFF;">
                                <th style=" text-align: center;"> Tilulo </th>
                                <th style=" text-align: center;"> publicacion</th>
                                <th style=" text-align: center;"> Categoria </th>
                                <th style=" text-align: center;"> Fecha </th>
                                <th style=" text-align: center;"> tipo </th>
                                <th style="text-align: center;">Ver</th>
                        </tr>
                </thead>
                <tbody>
                <?php while ($rowSql = mysqli_fetch_assoc($sql)){ 
                        
                        $fecha2=$rowSql["fecha_public"];
                        $final = date_create($fecha2)->format('d/m/y');
                        ?>
               
                        <tr>
                        <td style="text-align: center;"><?php echo $rowSql["titulo_public"]; ?></td>
                        <td style="text-align: center;"><?php echo $rowSql["text_public"]; ?></td>
                        <td style="text-align: center;"><?php echo $rowSql["categoria_public"]; ?></td>
                        <td style=" text-align: center;"><?php echo $final; ?></td>
                        <td style=" text-align: center;"><?php echo $rowSql["tipo_archivo"]; ?></td>
                        <td style="text-align: center;"><?php echo("<a class='btn btn-info' href='memoriac.php?id=".$rowSql["id_public"]."'  role='button'>Ver Publicacion</a>");?></td>
                        </tr>
               
               <?php } ?>
                </tbody>
        </table>
</div>


</div>
</div>
</div>
</div>

<!--boton flotante donde esta los diferentes acciones -->
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


    </div>
</div>

<script>
    function alertaactivar() {

        var respuesta = confirm("Estas seguro de Cerrar Sesion");

        if (respuesta == true) {
            return true;
        } else {

            return false;

        }


    }
    </script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <!--LUgar donde esta el ativador del modo oscuro -->
    <script type="text/javascript" src="js/temad.js"></script>

</body>
</html>