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
    <title>Graficos Conferencia</title>
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
                                    <h3>Visitas conferencia</h3>
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
                                    <h3>Conferencia recordatorio</h3>
                            </div>
                            <div class="">
                                <div style="width: 500px;">
                                    <canvas id="myChart2"></canvas>
                                        </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                                <div class="col-md-10 col-sm-9">
                                <div class="">
                                    <h3>Conferencia recordatorio</h3>
                            </div>
                            <div class="">
                                <div style="width: 500px;">
                                    <canvas id="myChart3"></canvas>
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
    SELECT MONTHNAME(fachainicio) as meses,visttas_confe as visitas FROM conferencia WHERE id_userme='$id_med'
  ");
  foreach($query as $data)
  {
    $month[] = $data['meses'];
    $amount[] = $data['visitas'];
  }

?>





 
<script>
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Visitas conferencia',
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
      spanGaps:true,
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
              }
      ,scales: {
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
    SELECT MONTHNAME(conferencia.fachainicio) as meses,recordatorio as cantidad_recorda FROM conferencia WHERE id_userme='$id_med'
  ");
  foreach($query2 as $data2)
  {
    $month2[] = $data2['meses'];
    $amount2[] = $data2['cantidad_recorda'];
  }

?>



<!-- Grfico2-->

 
<script>
  const labels2 = <?php echo json_encode($month2) ?>;
  const data2 = {
    labels: labels2,
    datasets: [{
      label: 'Conferencia recordatorio',
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


<?php 
  $con3 = new mysqli("localhost","root","","red_medica");
  $query3 = $con3->query("
    SELECT medico.nombre_medico,especialidad.espec_descripsion as especialidad, COUNT(especialidad.espec_descripsion) as cantidad FROM conferencia,recordatorio,medico,especialidad WHERE conferencia.id_confe=recordatorio.id_confererec 
    AND medico.id_medico=recordatorio.id_medicorec AND medico.especialidadm=especialidad.id_espec AND conferencia.id_userme='$id_med'
  ");
  foreach($query3 as $data3)
  {
    $month3[] = $data3['especialidad'];
    $amount3[] = $data3['cantidad'];
    $amount4[] = $data3['nombre_medico'];
    echo "<h4>".$amount3[0]." </h4>";
    echo "<h4>".$month3[0]." </h4>";
    echo "<h4>".$amount4[0]." </h4>";
  }

?>



<!-- Grfico3-->

 
<script>
  const labels3 = <?php echo json_encode($month3) ?>;
  const data3 = {
    labels: labels3,
    datasets: [{
      label: 'Artículos Comentarios',
      data: <?php echo json_encode($amount3) ?>,
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 4
    }]
  };

  const config3 = {
    type: 'doughnut',
    data: data3,
    options: {
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart3'),
    config3
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