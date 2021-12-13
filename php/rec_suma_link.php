<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="../codigo.js"></script>
</head>
 
<?php
    include 'conexion2p.php';
    $i = '';
    $S ='';
if (isset($_GET['accion']) OR isset($_GET['acciones'])) {
    $i = $_GET['accion'];
    $S = $_GET['acciones'];
}



if($S=="SUMA"){
    $msj='';
    $suma=$_GET['rec'];
    $codigo=$_GET['id'];

    $sql="
    UPDATE `conferencia` SET
        `recordatorio`='$suma'
    WHERE
    id_confe='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
}

if ($i == "INSREC") {

    $id=$_GET['id'];
    //echo ("<h4>coferecia $id</h4>");
    //exit;
    session_start();
    $id_me=$_SESSION["s_idme"];

    
    //$date = (new DateTime())->format('y-m-d');
    //echo ("<h4>$date</h4>");
    //echo ("<h4>$new_imgen</h4>");
    //exit;


    $sql = " INSERT INTO `recordatorio` ( `id_medicorec`,`id_confererec`,`estado`) 
    VALUES (

        '$id_me',
        '$id',
        'A')";
    

      
    if ($mysqli->query($sql)) {
        
        $status = 'success';
    } else {
        $status = 'error';
        echo "error" . mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$status);
     
    header("Refresh: 2; URL= ../conferencia_me.php?s=" .$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Recordatorio Activado",
		icon: "success",
	  })
});


</script>

' ;

}

if($S=="VISITA"){
    $msj='';
    $suma=$_GET['rec'];
    $codigo=$_GET['id'];

    $sql="
    UPDATE `conferencia` SET
        `recordatorio`='$suma'
    WHERE
    id_confe='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
}



?>
