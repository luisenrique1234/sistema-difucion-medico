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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="css/dark.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    
<?php include_once "./php/menu.php"; ?>
        <!-- fin de la segunda parte-->
        <div>
            <div class="panel-heading">
                <br>
                <br>
                <br>
                <h1> Listado Publicaciones</h1>
                <div class="panel-body">
                    
                        <!--<a href="crea_alumnos.php" class="btn btn-info pull-letf" style="background-color: #0d87ac;">NUEVO</a>-->
                    
                    <br>
                    <hr>
                    <table class="table" style="text-align: center;">
                        <thead>
                            <tr style="background-color: #45bcdb; color:#FFFFFF;">
                                <!-- fila-->
                                <th>Titulo</th>
                                <!--th colunma-->
                                <th>Autor</th>
                                <th>Resumen</th>
                                <th>Referencia</th>
                                <th>Tipo de archivo</th>
                                <th>Fecho de publicacion</th>
                                
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        
                        $query = lista_publicacion();
                        while ($row = $query->fetch_assoc()) {
                            $fecha2=$row["fecha_public"];
                        $final = date_create($fecha2)->format('d/m/y');
                            echo "
            <tr>
            <td>" . $row["titulo_public"] . "</td>
            <td>" . substr($row["autor_pu"],0,300) . "</td>
			<td>" . substr($row["text_public"],0,300). "</td>
			<td>" . substr($row["referencia_pu"],0,300). "</td>
            <td>" . $row["tipo_archivo"] . "</td>
            <td>" . $final . "</td>
			
            <td>
            <a href='actualizar_public.php?id=" . $row["id_public"] . "' class='btn btn-info' style='background-color: #45bcdb;'>Editar</a>
            
            <a onclick='return alereliminarpub(".$row["id_public"].");' class='btn btn-danger' onclick='return alertaeliminar();'>Eliminar</a>
            </td>
            </tr>
            ";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <div>
            <div class="panel-heading">
                <h1> Listado Investigaciones</h1>
                <div class="panel-body">
                    
                        <!--<a href="crea_alumnos.php" class="btn btn-info pull-letf" style="background-color: #0d87ac;">NUEVO</a>-->
                    
                    <br>
                    <hr>
                    <table class="table" style="text-align: center;">
                        <thead>
                            <tr style="background-color: #45bcdb; color:#FFFFFF;">
                                <!-- fila-->
                                <th>Titulo</th>
                                <!--th colunma-->
                                <th>Autor</th>
                                <th>Resumen</th>
                                <th>Introducion</th>
                                <th>Palabras Calves</th>
                                <th>Antecedentes</th>
                                <th>Fecho de publicacion</th>
                                
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        
                        $query = lista_invstigacion();
                        while ($row = $query->fetch_assoc()) {
                            $fecha2=$row["fecha_inv"];
                        $final = date_create($fecha2)->format('d/m/y');
                            echo "
            <tr>
            <td>" . $row["titulo_inv"] . "</td>
            <td>" . substr($row["autor_inv"],0,300) . "</td>
			<td>" . substr($row["resume_inv"],0,300). "</td>
			<td>" . substr($row["introducion_inv"],0,300). "</td>
            <td>" . $row["pclave_inv"] . "</td>
            <td>" . substr($row["Antecedente_inv"],0,300) . "</td>
            <td>" . $final . "</td>
			
            <td>
            <a href='actualizar_invest.php?id=" . $row["id_inv"] . "' class='btn btn-info' style='background-color: #45bcdb;'>Editar</a>
            <br>
            <br>
            <a onclick='return alereliminarinv(".$row["id_inv"].");' class='btn btn-danger'>Eliminar</a>
            </td>
            </tr>
            ";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
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
        <script type="text/javascript" src="js/medico_alerta.js"></script>
        <!--LUgar donde esta el ativador del modo oscuro -->
        <script type="text/javascript" src="js/temad.js"></script>
    </body>
</html>