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
    <title>Gráficos Médicos</title>
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
                
                <div class="">
                                <div class="col-md-11 col-sm-10">
                                <div class=" text-center">
                                    <h3>Médicos registrados por especialidades</h3>
                            </div>
                            <div style="display: flex; justify-content: center; width: 100%;">
                                <div style=" width: 500px;">
                                    <canvas id="myChart3"></canvas>
                                        </div>
                            </div>
                    </div>
                </div>
        </div>
    </section>

    

<?php 
  $con3 = new mysqli("localhost","root","","red_medica");
  $query3 = $con3->query("
    SELECT especialidad.espec_descripsion as especialidad, COUNT(*) as cantidad FROM medico,especialidad WHERE   medico.especialidadm=especialidad.id_espec  GROUP BY especialidad.espec_descripsion
  ");
  foreach($query3 as $data3)
  {
    $month3[] = $data3['especialidad'];
    $amount3[] = $data3['cantidad'];
  }

?>



<!-- Grfico3-->

 
<script>
  const labels3 = <?php echo json_encode($month3) ?>;
  const data3 = {
    labels: labels3,
    datasets: [{
      label: 'Recordatorio de conferencia por especialidad',
      data: <?php echo json_encode($amount3) ?>,
      backgroundColor: [
        '#097188',
        '#20558A',
        '#f0ee3d',
        '#9ae5f3',
        '#0c9351',
        '#a9aae8',
        '#f2985b'
      ],
      hoverOffset: 1
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