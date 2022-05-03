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
        

        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $codime2=$_POST['codime'];
        $user=$_POST['usurio'];

        $provi=$_POST['provicia'];
        $pass = md5($_POST['password']);
        

        $espec=$_POST['espec'];
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
                echo "<h4>$new_imgen</h4>";
                exit;
            }
        }else{
            header("Refresh: 4; URL= ../perfil_medico.php?id=".$codigom2);
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
    

    
    $sql="
    UPDATE `publicacion` SET
        `titulo_public` ='$titulo2',
        `autor_pu` ='$autor2',
        `text_public` ='$public2',
        `referencia_pu`='$refer',
        `categoria_public`='$categoria2'
        
    WHERE
        id_public='$codigom2'";

    if($mysqli->query($sql)){
        $status='successudt';
    }
    else{
        $status='errorudt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../perfil_medico.php?s=".$status);
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
exit;
    }
    


    $nombre2=$_POST['nombre'];
    $apellido2=$_POST['apellido'];

    $especi=$_POST['especiali'];
    
    
    $sql="
    UPDATE `publicacion` SET
        `titulo_public` ='$titulo2',
        `autor_pu` ='$autor2',
        `text_public` ='$public2',
        `referencia_pu`='$refer',
        `categoria_public`='$categoria2'
        
    WHERE
        id_public='$codigom2'";

    if($mysqli->query($sql)){
        $status='successudt';
    }
    else{
        $status='errorudt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../pefil_medico.php?s=".$status);
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
