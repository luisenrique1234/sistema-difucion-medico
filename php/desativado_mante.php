<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="../codigo.js"></script>
</head>

<?php 
include 'conexion.php';
$i='';
if (isset($_GET['accion'])){
    $i=$_GET['accion'];

}


if($i=="ACT"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `medico` SET
        `estado`='A'
    WHERE
    id_medico='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../desativado_medico.php?s=".$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "ACTIVADO",
		icon: "success",
		
	  })
});


</script>

';
}

?>