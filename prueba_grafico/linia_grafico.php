<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
  <script src="./chart.min.js"></script>
  <title>linia grafico</title>
</head>
<body>

<?php 
  $con2 = new mysqli("localhost","root","","red_medica");
  $query2 = $con2->query("
    SELECT MONTHNAME(fecha_public) as meses,me_gusta_pu as me_gusta_pu2 FROM publicacion WHERE id_medico_pu='7'
  ");
  foreach($query2 as $data2)
  {
    $month2[] = $data2['meses'];
    $amount2[] = $data2['me_gusta_pu2'];
    echo $amount2[0];
  }

?>


<div style="width: 600px;">
  <canvas id="myChart2"></canvas>
</div>


 
<script>
  // === include 'setup' then 'config' above ===
  const labels2 = <?php echo json_encode($month2) ?>;
  const data2 = {
    labels: labels2,
    datasets: [{
      label: 'Apoyo de los artículo',
      data: <?php echo json_encode($amount2) ?>,
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
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config2 = {
    type: 'line',
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


<!-- grafico  2  -->

<?php 
  $con = new mysqli("localhost","root","","red_medica");
  $query = $con->query("
    SELECT MONTHNAME(fecha_public) as meses,me_gusta_pu as me_gusta_pu2 FROM publicacion WHERE id_medico_pu='7'
  ");
  foreach($query as $data)
  {
    $month[] = $data['meses'];
    $amount[] = $data['me_gusta_pu2'];
    echo $amount[0];
  }

?>


<div style="width: 600px;">
  <canvas id="myChart"></canvas>
</div>


 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Apoyo de los artículo',
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
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
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

<!-- grafico 3 -->

<?php 
  $con3 = new mysqli("localhost","root","","red_medica");
  $query3 = $con3->query("
    SELECT MONTHNAME(fecha_public) as meses,me_gusta_pu as me_gusta_pu2 FROM publicacion WHERE id_medico_pu='7'
  ");
  foreach($query3 as $data3)
  {
    $month3[] = $data3['meses'];
    $amount3[] = $data3['me_gusta_pu2'];
    echo $amount3[0];
  }

?>


<div style="width: 600px;">
  <canvas id="myChart3"></canvas>
</div>


 
<script>
  // === include 'setup' then 'config' above ===
  const labels3 = <?php echo json_encode($month3) ?>;
  const data3 = {
    labels: labels3,
    datasets: [{
      label: 'Apoyo de los artículo',
      data: <?php echo json_encode($amount3) ?>,
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
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config3 = {
    type: 'bar',
    data: data3,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart3'),
    config3
  );
</script>



</body>
</html>