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
if ($_SESSION["s_medico"] === null ){
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
    <title>Articulos cientificos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/boton.css">
    <!--<script src="./contador.js"></script>-->
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
   

<!-- menu de la parte superior-->
<?php include_once "./php/menu.php"; ?>
    <!--/#header-->
    <!--/#action-->


    <section  class="padding-top">
        <div class="container">
            <div class="row">
            <div>
                
<div class="col-lg-9 col-lg-offset-1 col-xs-12 col-xs-offset-0 ">
        <label  class="form-label">Titulo a buscar</label>
         
        <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $busca=$_POST["buscar"];?>"  >
        
</div>

    <div >

            <table class="table">
                    <thead>
                            <div>
                                    <div class="col-lg-2 col-lg-offset-2 col-xs-12 col-xs-offset-0">    
                                    <label  class="control-label">Categoria </label>
                                            <select id="assigned-tutor-filter" id="buscacategoria" name="buscacategoria" class="form-control mt-2">
                                                    <?php if ($_POST["buscacategoria"] != ''){ ?>
                                                    <option value="<?php echo $_POST["buscacategoria"]; ?>"><?php echo $buscacategoria=$_POST["buscacategoria"]; ?></option>
                                                    <?php } ?>
                                                    <option value="Todos">Todos</option>
                                                    <option value="radiología">radiología </option>
                                                    <option value="Pediatria">Pediatria</option>
                                                    <option value="Cardiología">Cardiología</option>
                                            </select>
                                    </div>
                                    <div class=" col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                            
                                            <label  class="control-label">Fecha desde:</label>
                                            <input type="date" id="buscafechadesde" name="buscafechadesde" class="form-control mt-2" value="<?php echo $buscafechadesde=$_POST["buscafechadesde"]; ?>" style="border: #bababa 1px solid; color:#0d87ac;">
                                    </div>
                                    <div class="col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                            
                                            <label  class="control-label">Fecha hasta:</label>
                                            <input type="date" id="buscafechahasta" name="buscafechahasta" class="form-control mt-2" value="<?php echo $buscafechahasta=$_POST["buscafechahasta"]; ?>" style="border: #bababa 1px solid; color:#0d87ac;" >
                                    </div>
                                    <div class="col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                    <label  class="control-label">Tipo de archivo</label>
                                            <select id="subject-filter" id="tipo" name="tipo" class="form-control mt-2">
                                                    <?php if ($_POST["tipo"] != ''){ ?>
                                                    <option value="<?php echo $_POST["tipo"]; ?>"><?php echo $tipo=$_POST["tipo"]; ?></option>
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

                <div class="col-md-2 col-sm-5">
                    <div class="sidebar blog-sidebar">
                    </div>
                </div>
                
                <div class="col-md-9 col-sm-7">
                   

                    <?php
                    include 'php/conexion.php';
                    $espesicialidad =$_SESSION["s_espeme"];
                    $public = "SELECT publicacion.id_public,publicacion.titulo_public,publicacion.text_public,publicacion.link_imagen,publicacion.link_video,
                    publicacion.link_audio,publicacion.link_archivo,DATE_FORMAT(publicacion.fecha_public,'%d/%m/%y') AS fecha,publicacion.categoria_public,publicacion.me_gusta_pu,
                    medico.nombre_medico,medico.apellido_medico,especialidad.espec_descripsion FROM publicacion,medico,especialidad WHERE publicacion.id_medico_pu=medico.id_medico AND publicacion.categoria_public='$espesicialidad' AND publicacion.estado='A' AND publicacion.categoria_public=especialidad.id_espec	  ORDER BY publicacion.me_gusta_pu DESC";
                    $public2 = $mysqli->query($public);
                    while ($res = mysqli_fetch_array($public2)) {
                        $link_imagen = $res['link_imagen'];
                        $video = $res['link_video'];
                        $audio = $res['link_audio'];
                        $fecha = $res['fecha'];
                        $archivo = $res['link_archivo'];
                        $nombre = $res['nombre_medico'];
                        $apellido = $res['apellido_medico'];

                    ?>
                    <!--animacion js wow fadeInDowm de las publicaciones-->
                    <div class="wow fadeInDown">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="single-blog two-column">
                                    <div class="post-thumb">
                                        <?php
                                            if ($link_imagen != '') {
                                                $elcha='\\';

                                                echo ('<a href="blogdetails.html"><img src="php'.$elcha.'imagenes'.$elcha.''. $link_imagen . '" class="img-responsive" alt="">');
                                                //echo ("<h4>$link_imagen </h4>");
                                            } ?></a>
                                        <?php
                                            /*if ($video != '') {
                                                echo ('<video width="820" height="420"  controls src="' . $video . '" frameborder="0"></video>');
                                            } */?>


                                        

                                    </div>
                                    <?php
                                        /*
                                        if ($audio != '') {
                                            echo ('<audio src="' . $audio . '" preload="none" controls></audio>');
                                            echo ("<h4> $fecha </h4>");
                                        } */?>

                                    <div class="post-content overflow">
                                        <h2><?php mostrar($res['titulo_public']); ?></h2>
                                        <?php echo '<h3 class="post-author"><a href="#">Autor:' . $nombre . " " . $apellido . '</a></h3>' ?>
                                        <h3>Resumen</h3>
                                        <p><?php mostrar($res['text_public']); ?></p>
                                        <?php echo ("<h5>Publicado el: $fecha </h5>"); ?>
                                        <?php echo("<a href='memoriac.php?id=".$res["id_public"]."' class='read-more'>ver publica completa</a>");?>
                                        <br>
                                        <br>
                                        <?php
                                            if ($archivo != '') {
                                                echo ('<h4 class="post-author"><a href="php/' . $archivo . '"download="sistema-difucion-medica"><i class="fa fa-download"></i> Descargar Archivo</a></h4>');
                                            }elseif ($video !=''){
                                                echo ('<h4 class="post-author"><a href="php/' . $video . '"download="sistema-difucion-medica"><i class="fa fa-download"></i> Descargar Archivo</a></h4>');
                                            }elseif ($audio !=''){
                                                echo ('<h4 class="post-author"><a href="php/' . $audio . '"download="sistema-difucion-medica"><i class="fa fa-download"></i> Descargar Archivo</a></h4>');
                                            } ?>
                                        <div class="post-bottom overflow">
                                            <ul class="nav navbar-nav post-nav">
                                                <li>
                                                    <h4><a href="#"><i
                                                                class="fa fa-tag"></i><?php mostrar($res['espec_descripsion']); ?></a>
                                                    </h4>
                                                </li>
                                                <li>
                                                    <h4><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>Me gustas
                                                            <?php mostrar($res['me_gusta_pu']); ?></a></h4>
                                                </li>
                                                <li>
                                                    <h4><a href="#"><i class="fa fa-comments"></i>3 comentarios</a></h4>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                    <!--boton flotante donde esta los diferentes acciones -->
                    <div class="con">
                    <?php include_once "./php/boton_medico.php"; ?>
                    </div>
                    <!--*******************************************************-->
                    <div class="blog-pagination">
                        <ul class="pagination">
                            <li><a href="#">left</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">9</a></li>
                            <li><a href="#">right</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p> Red medica 2021. Todos los derechos reservados.</p>
                            <p>Diseñado por<a target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
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
    <!--LUgar donde esta el ativador del modo oscuro -->
    <script type="text/javascript" src="js/temad.js"></script>
</body>

</html>