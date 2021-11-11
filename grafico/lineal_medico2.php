<?php

session_start();
$codigome=$_SESSION["s_idme"];
require_once "../php/conexion_grafico.php";
$conexion=conexion();
$sql="SELECT fecha_inv,me_gusta_inv FROM inv_cientifica WHERE id_medico_inv='$codigome' ";
$result=mysqli_query($conexion,$sql);
$valoresy=array();//montos
$valoresx=array();//ventas

while($ver=mysqli_fetch_row($result)){

    $valoresy[]=$ver[1];
    $valoresx[]=$ver[0];

}

 $datosx=json_encode($valoresx);
 $datosy=json_encode($valoresy);

 //echo ("<h4>$datosy</h4>");
 
 //echo ("<h4>$datosx</h4>");

?>
<div id="graficalineal_me2"></div>

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

Plotly.newPlot('graficalineal_me2', data);

</script>