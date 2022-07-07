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

$id_med=$_SESSION["s_idme"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gráficos Artículos</title>
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
        .caja{
            background-color: #F1F1F1;
            box-shadow: 0 0 1px 1px #000000;
            padding: 15px;
        }
    </style>
</head>
<!--/head-->

<body>
    <?php include_once "../php/menu_nada.php"; ?>
    <!--/#header-->



    <!--/#page-breadcrumb-->

    <section class="padding-top">
        <div class="container">
                <div class="col-md-6 col-sm-12">
                                <div class="col-md-10 col-sm-9">
                                <div class="">
                                    <h3>Me gustas de los artículos</h3>
                            </div>
                            <div class="">
                                    <div style="width: 500px;">
                                        <canvas id="myChart"></canvas>
                                            </div>
                            </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                                <div class="col-md-10 col-sm-9">
                                <div class="">
                                    <h3>Artículos comentarios</h3>
                            </div>
                            <div class="">
                                <div style="width: 500px;">
                                    <canvas id="myChart2"></canvas>
                                        </div>
                            </div>
                    </div>
                </div>
        </div>
    </section>

    
    <!-- Grafico 1-->
<?php 
  $con = new mysqli("localhost","root","","red_medica");
  $query = $con->query("
    SELECT MONTHNAME(fecha_public) as meses,me_gusta_pu as me_gusta_pu2 FROM publicacion WHERE id_medico_pu='$id_med'
  ");
  foreach($query as $data)
  {
    $month[] = $data['meses'];
    $amount[] = $data['me_gusta_pu2'];
  }

?>





 
<script>
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Me gusta de los artículos',
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
      borderWidth: 2
    }]
  };

  

  const config = {
    type: 'line',
    data: data,
    options: {
        
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



<?php 
  $con2 = new mysqli("localhost","root","","red_medica");
  $query2 = $con2->query("
    SELECT MONTHNAME(fecha_public) as meses,me_gusta_pu as me_gusta_pu2 FROM publicacion WHERE id_medico_pu='$id_med'
  ");
  foreach($query2 as $data2)
  {
    $month2[] = $data2['meses'];
    $amount2[] = $data2['me_gusta_pu2'];
  }

?>



<!-- Grfico2-->

 
<script>
  const labels2 = <?php echo json_encode($month2) ?>;
  const data2 = {
    labels: labels2,
    datasets: [{
      label: 'Artículos Comentarios',
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

    <!--boton de subir -->
    <div class="con">
        <?php include_once "../php/boton_medico.php"; ?>
    </div>
    <footer id="footer">
        <div class="container">
            <div class="row footer">
                <div class="col-sm-12 ">
                    <div class="col-sm-12">
                        <div class=" copyright-text text-center ">
                        <p>HOW DOCTOR. Diseñado por: <a  target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
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