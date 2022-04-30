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
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Estadisticas Artículos</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="../css/dark.css" rel="stylesheet">
    <script src="../js/sweetalert2@11.js"></script>
    <script type="text/javascript" src="../js/fontawesome.js"></script>
    <script src="./chart.min.js"></script>
    <link rel="shortcut icon" href="../images/ico/ico.png">
    
</head>
<!--/head-->

<body>
    <?php include_once "../php/menu_nada.php"; ?>
    <!--/#header-->



    <!--/#page-breadcrumb-->

    <section class="padding-top">
        <div class="container">
                
                
                                <div class="col-md-11 col-sm-10">
                                <div class=" text-center">
                                    <h3>Cantidad de artículos realizadas al mes</h3>
                            </div>
                            <div style="display: flex; justify-content: center; width: 100%;">
                                <div style=" width: 800px;">
                                    <canvas id="myChart2"></canvas>
                                        </div>
                            </div>
                    </div>
                
        </div>
    </section>





 



<?php 
  $con2 = new mysqli("localhost","root","","red_medica");
  $query2 = $con2->query("
  SELECT MONTHNAME(fecha_public) as meses,COUNT(*) as cantidad FROM publicacion GROUP BY meses
  ");
  foreach($query2 as $data2)
  {
    $month2[] = $data2['meses'];
    $amount2[] = $data2['cantidad'];
  }

?>



<!-- Grfico2-->

 
<script>
  const labels2 = <?php echo json_encode($month2) ?>;
  const data2 = {
    labels: labels2,
    datasets: [{
      label: 'Cantidad de artículos realizadas al mes',
      data: <?php echo json_encode($amount2) ?>,
      backgroundColor: [
        '#20558A'
      ],
      borderColor: [
        '#20558A'
      ],
      borderWidth: 1
    }]
  };

  const config2 = {
    type: 'bar',
    data: data2,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart2'),
    config2
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