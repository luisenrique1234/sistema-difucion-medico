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

     /* En esta parte se registra lo nuevos usuarios que 
     desen usar la plataforma y es coresponde al archivo registro.php */


     if ($i=="INS"){
        

        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $codime2=$_POST['sqmedico'];
        $user=$_POST['userac'];
        $pass = md5($_POST['contra']);
        $rol=$_POST['rolm'];
        

        $espec=$_POST['especial'];
        //$date = (new DateTime())->format('y-m-d');

    
    $sql = " INSERT INTO `medico` ( `nombre_medico`,`apellido_medico`,`user_medico`, `codigo_medico`,`especialidadm`,`idRol`,`contrasena_me`, `estado`) 
    VALUES (

        '$nombre',
        '$apellido',
        '$user',
        '$codime2',
        '$espec',
        '$rol',
        '$pass',
        'A')";
    

   if ($mysqli->query($sql))
    {
        $status='success';
    }
    else{
        $status='error';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$status);

    header("Refresh: 2; URL= ../mante_medico.php?s=".$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "REGISTRADO",
		icon: "success",
	  })
});


</script>

';
}





if($i=="UDT"){
    $msj='';


    $nombre2=$_POST['nombre'];
    $apellido2=$_POST['apellido'];

    $codigom2=$_POST['codigom'];
     $userac=$_POST['userac'];
    $sqmedico=$_POST['sqmedico'];
    $espcial=$_POST['especial'];
//$contra=$_POST['contra'];

    $especi=$_POST['especial'];
    $rolme=$_POST['rolm'];
    
    //$pass = md5($_POST['contra']);
    $pass = $_POST['contra'];
    

    
    $sql="
    UPDATE `medico` SET
        `nombre_medico` ='$nombre2',
        `apellido_medico` ='$apellido2',
        `user_medico` ='$userac',
        `codigo_medico` ='$sqmedico',
        `especialidadm`='$especi',
        `contrasena_me`='$pass',
        `idRol`='$rolme'
        
    WHERE
        id_medico='$codigom2'";

    if($mysqli->query($sql)){
        $status='successudt';
    }
    else{
        $status='errorudt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mante_medico.php?s=".$msj);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Actualizado",
		icon: "success",
		
	  })
});


</script>

';
}

if($i=="DLT"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `medico` SET
        `estado`='I'
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

    header("Refresh: 2; URL= ../mante_medico.php?s=".$msj);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "ELIMINADO",
		icon: "error",
		
	  })
});


</script>

';
}

?>
