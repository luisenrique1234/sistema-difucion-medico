<?php

include('../php/mante_consultas.php');
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
    header("Location: ../admin_login.php");
} else{
    if($_SESSION["s_idRol3"]==2){
        header("Location: ../index.php");
    }
    elseif($_SESSION["s_idRol3"]==3){
        header("Location: ../vistas/pag_error.php");
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
    <title>Mantenimiento de comentario</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">

    <link href="../css/dark.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="../css/boton.css">
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="../images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/ico.png">
</head>
<!--/head-->

<body class="">
<?php include_once "../php/mante_menu.php"; ?>
        <!-- fin de la segunda parte-->
        <div>
        <br>
        <br>
        <br>
            <div class="panel-heading">
                <h1> Listado de Comentario</h1>
                <div class="panel-body">
                    
                        <a title="Nuevo Médico" href="nuevoman_articulo.php" class="btn btn-info pull-letf" style='right: 24%;  font-size: 19px;'><i class="fa fa-user-plus"></i></a>
                        <a title="Reporte" href="#" class="btn btn-success" style='  font-size: 19px;'> <i class="fa fa-print" aria-hidden="true"></i></a>
                    
                    <hr>
                    <table class="table tabla1" style="text-align: center;">
                        <thead>
                            <tr style="background-color: #20558A; color:#FFFFFF;">
                                <!-- fila-->
                                <th data-hidden="true">Código comentarios</th>
                                <th data-hidden="true">Artículos</th>
                                <th data-hidden="true">Médicos</th>
                                <th data-hidden="true">_____Comentarios_____</th>
                                <th data-hidden="true">Fechas</th>
                                <th data-hidden="true">Estados</th>
                                <th data-hidden="true"></th>
                            </tr>
                        </thead>
                        <?php
                        
                        
                        $query = lista_comentario();
                        while ($row = $query->fetch_assoc()) {
                            //$fecha2=$row["fecha_public"];
                        //$final = date_create($fecha2)->format('d/m/y');
                            echo "
            <tr>
            <td>" . $row["id_comen"] . "</td>
            <td>" . substr($row["titulo_public"],0,300). "</td>
			<td>" . $row["nombre"]. "</td>
            <td>" . substr($row["text_comen"],0,300). "</td>
            
            <td>" . $row["fecha_comen"] . "</td>
            <td>" . $row["estado"] . "</td>
			
            <td>
            <a title='Editar Artículo' href='actualizar_comen.php?id=" . $row["id_comen"] . "' class='btn btn-info' style='  font-size: 19px;'><i class='fa fa-pencil' aria-hidden='true'></i></a>
            
            <a title='Eliminar Artículo' onclick='return alercomentario(".$row['id_comen'].");' class='btn btn-danger confirm' style='  font-size: 19px;'><i class='fa fa-trash' aria-hidden='true'></i></a>
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
        <footer id="footer">
        <div class="container">
            <div class="row footer">
                <div class="col-sm-12 ">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                            <p>Sistema de difusión de información medica 2022. Todos los derechos reservados.</p>
                            <p>Diseñado por: <a target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
        <div class="con">
        <?php include_once "../php/boton_medico.php"; ?>
                    </div>
                    <!--*******************************************************-->
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/lightbox.min.js"></script>
        <script type="text/javascript" src="../js/wow.min.js"></script>
        <script type="text/javascript" src="../js/main.js"></script>
        <script type="text/javascript" src="../js/mante_buscador.js"></script>
        <script type="text/javascript" src="../js/mante_alertas.js"></script>
        <!--LUgar donde esta el ativador del modo oscuro -->
        <script type="text/javascript" src="../js/temad.js"></script>
    </body>
</html>