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
//$id=$_GET['id'];

session_start();
if ($_SESSION["s_medico"] === null) {
    header("Location: ../login.php");
} else {
    if ($_SESSION["s_idRol2"] == 3) {
        header("Location: ../vistas/pag_error.php");
    }
}
$id_med = $_SESSION["s_idme"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gráficos Conferencia</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="../css/dark.css" rel="stylesheet">
    <script src="../js/sweetalert2@11.js"></script>
    <script type="text/javascript" src="../js/fontawesome.js"></script>
    <link rel="stylesheet" href="../css/boton.css">
    <script src="./chart.min.js"></script>
    <link rel="shortcut icon" href="../images/ico/ico.png">
    <style>
        .caja {
            background-color: #F1F1F1;
            box-shadow: 0 0 1px 1px #000000;
            padding: 15px;
        }
    </style>
</head>
<body>
    <?php include_once "../php/menu_nada.php"; ?>
    <section class="padding-top">
        <div class="container">
            <div class=" text-center">
                <h3>Visitas de las conferencias</h3>
            </div>
            <div style="display: flex; justify-content: center; width: 100%;">
                <div style="width: 800px;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </section>
    <!-- Grafico 1-->
    <?php
    /*visitas por año SELECT DATE_FORMAT(fecha,'%Y')  as ano ,COUNT(*) AS visita1 FROM visitas GROUP BY ano*/
    $con = new mysqli("localhost", "root", "", "red_medica");
    $query = $con->query("
    SELECT MONTHNAME(fecha)  as meses,COUNT(*) AS visita1 FROM visitas GROUP BY meses
  ");
    foreach ($query as $data) {
        $month[] = $data['meses'];
        $amount[] = $data['visita1'];
    }

    ?>
    <script>
        const labels = <?php echo json_encode($month) ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Visitas de las conferencia',
                data: <?php echo json_encode($amount) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    '#20558A'
                ],
                tension: 0.4,
                spanGaps: true,
                borderWidth: 1
            }]
        };
        const config = {
            type: 'line',
            data: data,
            options: {
                fill: {
                    target: 'origin',
                    above: '#20558A'
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
    
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
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/lightbox.min.js"></script>
    <script type="text/javascript" src="../js/wow.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../js/medico_alerta.js"></script>
    <!--LUgar donde esta el ativador del../ modo oscuro -->
    <script type="text/javascript" src="../js/temad.js"></script>
</body>

</html>