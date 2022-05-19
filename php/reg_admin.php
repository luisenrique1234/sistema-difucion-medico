<head>
    <script src="../js/jquery341.min.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <script src="../codigo.js"></script>
</head>

<?php
include 'conexion2p.php';
$i = '';
if (isset($_GET['accion'])) {
    $i = $_GET['accion'];
}

if ($i=="INS"){
        

    $nombread=$_POST['nombread'];
    $passwor= base64_encode ($_POST['pass']);
    $idrol=$_POST['roladmin'];
    //$date = (new DateTime())->format('y-m-d');


$sql = " INSERT INTO `administrador` ( `adminis`,`pass`,`idRolA`,`estado`) 
VALUES (

    '$nombread',
    '$passwor',
    '$idrol',
    'A')";


if ($mysqli->query($sql))
{
    $status='success';
}
else{
    $status='error';
    echo "error" .mysqli_error($mysqli);
}

header("Refresh: 2; URL= ../mantenimiento/mante_admin.php?s=".$status);
echo '
<script type="text/javascript">


$(document).ready(function(){

swal({
    title: "Administrador creado",
    icon: "success",
  })
});


</script>

';
}

if ($i == "UDT2") {
    $msj = '';

    $codigoadm = $_POST['codigoadm'];
    $admin = $_POST['nombread'];
    $roladm = $_POST['roladmin'];
    $pass = base64_encode ($_POST['pass']);


    $sql = "
    UPDATE `administrador` SET
        `adminis`='$admin',
        `pass`='$pass',
        `idRolA`='$roladm'
        
    WHERE
        id_admin ='$codigoadm'";

    if ($mysqli->query($sql)) {
        $status = 'successudt';
    } else {
        $status = 'errorudt';
        echo "error" . mysqli_error($mysqli);
    }

    header("Refresh: 2; URL= ../mantenimiento/mante_admin.php?s=" . $status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Administrador editado",
		icon: "success",
		
	  })
});


</script>

';
}

if ($i == "DLT") {
    $msj = '';

    $codigo=$_GET['id'];

    $sql = "
    UPDATE `administrador` SET
        `estado`='I'
        
    WHERE
        id_admin ='$codigo'";

    if ($mysqli->query($sql)) {
        $status = 'successudt';
    } else {
        $status = 'errorudt';
        echo "error" . mysqli_error($mysqli);
    }

    header("Refresh: 2; URL= ../mantenimiento/mante_admin.php?s=" . $status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Desactivado",
		icon: "error",
		
	  })
});


</script>

';
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