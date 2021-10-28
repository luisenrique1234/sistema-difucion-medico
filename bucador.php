<?php


include 'php/conexion.php';
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
<body>
    <form action="" method="get">
        <input type="text" name="buscador"><br>
        <input type="submit" name="enviar" value="buscar">
    </form>
            <br><br>
            <?php 
            
            if (isset ($_GET['enviar'])) {
                $busacar= $_GET['buscador'];
                $consulta= "SELECT publicacion.id_public,publicacion.titulo_public,publicacion.text_public,publicacion.link_imagen,publicacion.link_video,
                publicacion.link_audio,publicacion.link_archivo,DATE_FORMAT(publicacion.fecha_public,'%d/%m/%y') AS fecha,publicacion.categoria_public,publicacion.me_gusta_pu,
                medico.nombre_medico,medico.apellido_medico FROM publicacion,medico WHERE publicacion.id_medico_pu=medico.id_medico AND publicacion.titulo_public LIKE '%$busacar%'";

                $consulta2 = $mysqli->query($consulta);
                    while ($res = mysqli_fetch_array($consulta2)){
                    echo $res['titulo_public'].'<br>';
                    echo $res['nombre_medico'].'<br>';
                }
            }
            ?>




</body>
</html>