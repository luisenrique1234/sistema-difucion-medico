<?php
session_start();
$codigome=$_SESSION["s_idme"];

require_once "../php/conexion_grafico.php";
$conexion=conexion();
$sql="SELECT fecha_public,me_gusta_pu from publicacion WHERE id_medico_pu='$codigome'";
$result=mysqli_query($conexion,$sql);
$valoresy=array();//montos1
$valoresx=array();//ventas2

while($ver=mysqli_fetch_row($result)){

    $valoresy[]=$ver[1];
    $valoresx[]=$ver[0];

}

 $datosx=json_encode($valoresx);
 $datosy=json_encode($valoresy);

 //echo ("<h4>$datosx</h4>");
 //echo ("<h4>$datosy</h4>");
?>
<div id="graficalinealme"></div>

<script type="text/javascript">
 function crearCadenaLineal(json){

     var parsed = JSON.parse(json);
     var arr =[];
     for(var x in parsed){
         arr.push(parsed[x]);
     }
     return arr;
 }

</script>

             
<script type="text/javascript">

datosx=crearCadenaLineal('<?php echo $datosx?>')
datosy=crearCadenaLineal('<?php echo $datosy?>')

var trace1 = {
  x: datosx,
  y: datosy,
  type: 'scatter'
};


var data = [trace1];

Plotly.newPlot('graficalinealme', data);

</script>