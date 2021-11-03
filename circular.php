<?php
require_once "php/conexion_grafico.php";
$conexion=conexion();

 $sql2="SELECT provincia_me, COUNT(*) AS total FROM medico GROUP BY provincia_me";
$result2=mysqli_query($conexion,$sql2);
$valoresy=array();//cantida de cliente de una ciudad
$valoresz=array();// ciudad


 while($ver2=mysqli_fetch_row($result2)){

    
    $valoresy[]=$ver2[1];
    $valoresz[]=$ver2[0];

}

 $datosy=json_encode($valoresy);
 $datosz=json_encode($valoresz);
 

 

?>
<div id="graficacircular"></div>

<script type="text/javascript">
 function crearCadenacirCular(json){

     var parsed = JSON.parse(json);
     var arr =[];
     for(var x in parsed){
         arr.push(parsed[x]);
     }
     return arr;
 }

</script>

             
<script type="text/javascript">

datosy=crearCadenacirCular('<?php echo $datosy?>')
datosz=crearCadenacirCular('<?php echo $datosz?>')

var data = [{
  type: "pie",
  values: datosy,
  labels: datosz,
  textinfo: "label+percent",
  textposition: "outside",
  automargin: true
}]

var layout = {
  height: 180,
  width: 338,
  margin: {"t": 0, "b": 0, "l": 0, "r": 0},
  showlegend: false
  }

Plotly.newPlot('graficacircular', data, layout);


</script>