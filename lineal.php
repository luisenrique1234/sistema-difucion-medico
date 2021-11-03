<?php
require_once "php/conexion_grafico.php";
$conexion=conexion();
$sql="SELECT fecha_public,me_gusta_pu from publicacion ";
$result=mysqli_query($conexion,$sql);
$valoresy=array();//montos
$valoresx=array();//ventas

while($ver=mysqli_fetch_row($result)){

    $valoresy[]=$ver[1];
    $valoresx[]=$ver[0];

}

 $datosx=json_encode($valoresx);
 $datosy=json_encode($valoresy);

?>
<div id="graficalineal"></div>

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

Plotly.newPlot('graficalineal', data);

</script>