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
        $codime2=$_POST['codime'];
        $user=$_POST['usurio'];
        $pass = md5($_POST['password']);
        

        $espec=$_POST['espec'];
        //$date = (new DateTime())->format('y-m-d');

    
    $sql = " INSERT INTO `medico` ( `nombre_medico`,`apellido_medico`,`user_medico`, `codigo_medico`,`especialidadm`,`idRol`,`contrasena_me`, `estado`) 
    VALUES (

        '$nombre',
        '$apellido',
        '$user',
        '$codime2',
        '$espec',
        '3',
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

    header("Refresh: 2; URL= ../login.php?s=".$status);
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

    $especi=$_POST['especiali'];
    
    session_start();
    $codigo2=$_SESSION["s_idme"];
    echo ("<h4>$codigo2</h4>");

    
    $sql="
    UPDATE `publicacion` SET
        `titulo_public` ='$titulo2',
        `autor_pu` ='$autor2',
        `text_public` ='$public2',
        `referencia_pu`='$refer',
        `categoria_public`='$categoria2'
        
    WHERE
        id_public='$codigo2'";

    if($mysqli->query($sql)){
        $status='successudt';
    }
    else{
        $status='errorudt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../lista_publicm.php?s=".$msj);
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

?>
