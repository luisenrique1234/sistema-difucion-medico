<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="../codigo.js"></script>
</head>
 
<?php
    include 'conexion2p.php';
    $i='';
    if (isset($_GET['accion'])){
        $i=$_GET['accion'];
    
    }

     /* En esta parte se registra lo nuevos usuarios que 
     desen usar la plataforma y es coresponde al archivo registro.php */

    if ($i=="INS"){
        

        $userme=$_POST['userne'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $trabajo=$_POST['trabajo'];
        $area=$_POST['area'];
        $cargo=$_POST['cargo'];
        $exqua=$_POST['exequ'];
        $especialida=$_POST['espec'];
        $email=$_POST['email'];
        $experiencia=$_POST['exper'];
        $pass = base64_encode($_POST['password']);

        echo"<h4>
        $userme
        $nombre
        $apellido
        $trabajo
        $area
        $cargo
        $exqua
        $especialida
        $email
        $experiencia
        $pass
        </h4>";
        exit;
        //$date = (new DateTime())->format('y-m-d');

    
    $sql = " INSERT INTO `medico` ( `nombre_medico`,`apellido_medico`,`user_medico`, `codigo_medico`,`especialidadm`,`provincia_me`,`idRol`,`contrasena_me`, `estado`) 
    VALUES (

        '$nombre',
        '$apellido',
        '$user',
        '$codime2',
        '$espec',
        '$provi',
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

    $codigom2=$_POST['codigom'];

    $file_nameconple = $_FILES['imagen']['name'];
    list( $file_name) = explode('.', $file_nameconple);

    $new_name_file = null;
    $new_imgen= null;

    if ($file_name != '' || $file_name != null) {
        $file_type = $_FILES['imagen']['name'];
        list($type, $extension) = explode('.', $file_type);
        if ($extension == 'jpg' || $extension == 'png') {
            $dir = 'imagenes-perfil/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['imagen']['tmp_name'];
            //$new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
                $new_imgen =  str_replace('imagenes-perfil/', '',$new_name_file);
                
            }
        }else{
            header("Refresh: 4; URL= /medico-red/perfilmedico/pefil_medico_edit.php?id=".$codigom2);
        echo '
            <script type="text/javascript">


            $(document).ready(function(){

	        swal({
	        title: "Tipo de archivo no permitido, Solo se permiten .jpg y .png",
		    icon: "warning",
	        })
            });


            </script>'
            ; exit;
        }

    }else{
        $userme=$_POST['user_me'];
        $especialida=$_POST['especial'];
        $nombre2=$_POST['nombreme'];
        $apellido2=$_POST['apellidome'];
        $email=$_POST['email'];
        $trabajo=$_POST['trabajo'];
        $area=$_POST['area'];
        $cargo=$_POST['cargo'];
        $experiencia=$_POST['exper'];

    

    
    $sql="
    UPDATE `medico` SET
        `nombre_medico` ='$nombre2',
        `apellido_medico` ='$apellido2',
        `user_medico` ='$userme',
        `email_me` ='$email',
        `lugar_trabajo` ='$trabajo',
        `area_me` ='$area',
        `cargo_me` ='$cargo',
        `experiencia_me` ='$experiencia',
        `especialidadm`='$especialida'
        
        
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

    header("Refresh: 2; URL= /medico-red/perfilmedico/pefil_medico.php?s=".$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Editado",
		icon: "success",
		
	  })
});


</script>

';
exit;
    }
    

    $userme=$_POST['user_me'];
    $especialida=$_POST['especial'];
    $nombre2=$_POST['nombreme'];
    $apellido2=$_POST['apellidome'];
    $email=$_POST['email'];
    $trabajo=$_POST['trabajo'];
    $area=$_POST['area'];
    $cargo=$_POST['cargo'];
    $experiencia=$_POST['exper'];
    
    $sql="
    UPDATE `medico` SET
        `nombre_medico` ='$nombre2',
        `apellido_medico` ='$apellido2',
        `user_medico` ='$userme',
        `link_foto` ='$new_imgen',
        `email_me` ='$email',
        `lugar_trabajo` ='$trabajo',
        `area_me` ='$area',
        `cargo_me` ='$cargo',
        `experiencia_me` ='$experiencia',
        `especialidadm`='$especialida'
        
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

    header("Refresh: 2; URL= /medico-red/perfilmedico/pefil_medico.php?s=".$status);
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


if($i=="UDTCONTRA"){
    $msj='';

    $codigom2=$_POST['codigom'];
    $contra = base64_encode ($_POST['contra']);
    //echo"<h4> ".base64_decode($contra). "</h4>";
    $sql="
    UPDATE `medico` SET
        `contrasena_me`='$contra'
    WHERE
        id_medico='$codigom2'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= /medico-red/perfilmedico/pefil_medico.php?s=".$status);
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
