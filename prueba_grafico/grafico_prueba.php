<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
  <script src="./chart.min.js"></script>
  <title>Document</title>
</head>
<body>

<?php 
  $con = new mysqli("localhost","root","","red_medica");
  $query = $con->query("
    SELECT titulo_public as categoria_public2,me_gusta_pu as me_gusta_pu2 FROM publicacion GROUP BY categoria_public
  ");
  foreach($query as $data)
  {
    $month[] = $data['categoria_public2'];
    $amount[] = $data['me_gusta_pu2'];
    echo $month[0];
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
      label: 'Tabla de artículo',
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
    type: 'bar',
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

</body>
</html>