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

$date = (new DateTime())->format('d/m/y');
//ob_start();


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mantenimiento de publicaciones</title>
    <link href="http://<?php echo $_SERVER["HTTP_HOST"]?>/medico-red/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://<?php echo $_SERVER["HTTP_HOST"]?>/medico-red/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://<?php echo $_SERVER["HTTP_HOST"]?>/medico-red/css/lightbox.css" rel="stylesheet">
    <link href="http://<?php echo $_SERVER["HTTP_HOST"]?>/medico-red/css/animate.min.css" rel="stylesheet">
    <link href="http://<?php echo $_SERVER["HTTP_HOST"]?>/medico-red/css/responsive.css" rel="stylesheet">
    

</head>
<!--/head-->

<body>
<a class="navbar-brand" href="index.php">
                            <h1><img src="http://<?php echo $_SERVER["HTTP_HOST"]?>/medico-red/images/logo.png" alt="logo" width="100" height="100"></h1>
                        </a>
        <!-- fin de la segunda parte-->
        <div>
        <div style="text-align: center;">
                <h3>Sistema de difusion de información médico</h3>
                <h3> Listado de Publicaciones</h3>
                
            </div>
            <h4 style="text-align: center;"> Fecha:  <?php echo $date;  ?></h4>
                <div class="panel-body">
                        
                    <br>
                    <hr>
                    <table class="table tabla1" style="text-align: center;">
                        <thead>
                            <tr style="background-color: #0d87ac; color:#FFFFFF;">
                                <!-- fila-->
                                <th>Código public</th>
                                <th>Tituo</th>
                                <th>_____Autor_____</th>
                                <th>___________________________Publicacion_________________________________</th>
                                <th>Referencia</th>
                                <th>Fecha publicacion</th>
                                <th>Categaria</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <?php
                        
                        
                        $query = lista_pudestivado();
                        while ($row = $query->fetch_assoc()) {
                            //$fecha2=$row["fecha_public"];
                        //$final = date_create($fecha2)->format('d/m/y');
                            echo "
            <tr>
            <td>" . $row["id_public"] . "</td>
			<td>" . $row["titulo_public"]. "</td>
            <td>" . substr($row["autor_pu"],0,100). "</td>
			<td>" . substr($row["text_public"],0,300). "</td>
            <td>" . substr($row["referencia_pu"],0,100) . "</td>
            <td>" . $row["fecha_public"] . "</td>
            <td>" . $row["categoria_public"] . "</td>
            <td>" . $row["estado"] . "</td>
			
            <td>
            </td>
            </tr>
            ";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<?php 

$html=ob_get_clean();


require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options -> set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A3', 'landscape');

$dompdf->render();

$dompdf->stream("lista_de_publicacion_desactivadas.pdf", array("Attachent" => true));

?>