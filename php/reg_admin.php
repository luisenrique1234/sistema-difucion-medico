<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../codigo.js"></script>
</head>

<?php
include 'conexion2p.php';
$i = '';
if (isset($_GET['accion'])) {
    $i = $_GET['accion'];
}

if ($i == "UDT") {
    $msj = '';

    $codigoadm = $_POST['codigoa'];
    $admin = $_POST['nombre'];



    $sql = "
    UPDATE `administrador` SET
        `adminis`='$admin'
        
    WHERE
        id_admin ='$codigoadm'";

    if ($mysqli->query($sql)) {
        $status = 'successudt';
    } else {
        $status = 'errorudt';
        echo "error" . mysqli_error($mysqli);
    }

    header("Refresh: 2; URL= /medico-red/perfiladmin/pefil_admin.php?s=" . $status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Nombre editado",
		icon: "success",
		
	  })
});


</script>

';
}

if($i=="UDTCONTRA"){
    $msj='';

    $codigoa2=$_POST['codigoad'];
    $contra = base64_encode ($_POST['contra']);
    //echo"<h4> ".base64_decode($contra). "</h4>";
    $sql="
    UPDATE `administrador` SET
        `pass`='$contra'
    WHERE
        id_admin='$codigoa2'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }

    header("Refresh: 2; URL= /medico-red/perfiladmin/pefil_admin.php?s=".$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Contraseña cambiada",
		icon: "success",
		
	  })
});


</script>

';
}


?>