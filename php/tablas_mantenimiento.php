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

    header("Refresh: 2; URL= ../mantenimiento/mante_medico.php?s=".$status);
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

if ($i == "INSPU") {
    include 'conexion2p.php';
    /*Esta es la parte encargada de subir los arichivo a una carperta de terminada 
    donde despues los tors medicos podran descargarla*/
    $file_name = $_FILES['archivo']['name'];

    $new_name_file = null;
    $new_imgen= null;
    $new_video=null;
    $new_audio=null;
    $new_archivo=null;

    if ($file_name != '' || $file_name != null) {
        $file_type = $_FILES['archivo']['name'];
        list($type, $extension) = explode('.', $file_type);
        if ($extension == 'pdf') {
            $dir = 'documento-pdf/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['archivo']['tmp_name'];
            //$new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
                $new_archivo=$new_name_file;
            }
        }elseif ($extension == 'docx') {
            $dir = 'documento-word/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['archivo']['tmp_name'];
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
                $new_archivo=$new_name_file;
                //echo ("<h4>$new_name_file</h4>");

            }
        }elseif ($extension == 'mp4') {
            $dir = 'videos/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['archivo']['tmp_name'];
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
                $new_video=$new_name_file;

            }
        }elseif ($extension == 'jpg' || $extension == 'png') {
            $dir = 'imagenes/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['archivo']['tmp_name'];
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
                $new_imgen =  str_replace('imagenes/', '',$new_name_file);
                
                
                

            }
        }elseif ($extension == 'mp3') {
            $dir = 'audio/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['archivo']['tmp_name'];
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
                $new_audio=$new_name_file;
                
                

            }
        }else{
            header("Refresh: 4; URL= ../mantenimiento/nuevoma_public.php");
        echo '
            <script type="text/javascript">


            $(document).ready(function(){

	        swal({
	        title: "Tipo de archivo no admitido, Solo se permiten jpg,png,pdf,docx,mp4,mp3",
		    icon: "warning",
	        })
            });


            </script>'
            ; exit;
        }
    }else{
        header("Refresh: 3; URL= ../mantenimiento/nuevome_public.php");
        echo '
            <script type="text/javascript">


            $(document).ready(function(){

	        swal({
	        title: "No se ha seleccionado ningun archivo",
		    icon: "error",
	        })
            });


            </script>'; exit;

    }
    //echo ("<h4>$extension</h4>");
    //exit;

    //$archivo=['archivo']['name'];
    session_start();
    $id_me=$_SESSION["s_idme"];
    $titulo = $_POST['titulo'];
    $public = $_POST['public'];
    $categoria = $_POST['categoria'];
    $autor1 = $_POST['autor'];
    $refe = $_POST['referencia'];

    
    $date = (new DateTime())->format('y-m-d');
    //echo ("<h4>$date</h4>");
    //echo ("<h4>$new_imgen</h4>");
    //exit;


    $sql = " INSERT INTO `publicacion` ( `id_medico_pu`,`titulo_public`,`autor_pu`,`text_public`,`referencia_pu`, `link_imagen`,`link_video`,`link_audio`,`link_archivo`,`fecha_public`,`categoria_public`,`tipo_archivo`,`me_gusta_pu`, `estado`) 
    VALUES (

        '$id_me',
        '$titulo',
        '$autor1',
        '$public',
        '$refe',
        '$new_imgen',
        '$new_video',
        '$new_audio',
        '$new_archivo',
        '$date',
        '$categoria',
        '$extension',
        '10',
        'A')";
        //echo ("<h4>$new_imgen</h4>");
        //exit;
    

      
    if ($mysqli->query($sql)) {
        
        $status = 'success';
    } else {
        $status = 'error';
        echo "error" . mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$status);
     
    header("Refresh: 2; URL= ../mantenimiento/mante_public.php?=" . $status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Publicado",
		icon: "success",
	  })
});


</script>

' ;

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

    header("Refresh: 2; URL= ../mantenimiento/mante_medico.php?s=".$msj);
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

if($i=="UDTPU"){
    $msj='';


    $titulo2=$_POST['titulo'];
    $autor2=$_POST['autor'];

    $public2=$_POST['public'];
    $refer=$_POST['referencia'];
    $categoria2=$_POST['categoria'];
    $codigo2=$_POST['codigop'];
    
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
        $status='successu';
    }
    else{
        $status='errorudt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/mante_public.php?s=".$status);
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

if($i=="UDTROL"){
    $msj='';


    $idrol=$_POST['idrol'];
    $descrip=$_POST['descrip'];
    
    $sql="
    UPDATE `rol` SET
        `descripcion` ='$descrip'
    WHERE
        id_roles='$idrol'";

    if($mysqli->query($sql)){
        $status='successu';
    }
    else{
        $status='errorudt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/mante_rol.php?s=".$status);
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

if($i=="UDTEPC"){
    $msj='';


    $idespe=$_POST['espeid'];
    $descriesp=$_POST['descriesp'];
    
    $sql="
    UPDATE `especialidad` SET
        `espec_descripsion` ='$descriesp'
    WHERE
        id_espec='$idespe'";

    if($mysqli->query($sql)){
        $status='successu';
    }
    else{
        $status='errorudt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/mante_espec.php?s=".$status);
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


if($i=="UDTINV"){
    $msj='';


    $titulo = $_POST['titulo'];

    $autor = $_POST['autor'];
    $resumen= $_POST['resumen'];
    $intro =$_POST['intro'];
    $pclave =$_POST['pclave'];
    $antece =$_POST['antece'];
    $objeng =$_POST['objegen'];
    $objees =$_POST['objees'];
    $justifi =$_POST['justifi'];
    $hipo =$_POST['hipo'];
    $metodo =$_POST['metodo'];
    $biblio =$_POST['biblio'];


    $categoria = $_POST['categoria'];
    $refe = $_POST['referencia'];



    $codigo2=$_POST['codigoinv'];
    
    $sql="
    UPDATE `inv_cientifica` SET
        `titulo_inv` ='$titulo',
        `autor_inv` ='$autor',
        `resume_inv` ='$resumen',
        `introducion_inv`='$intro',
        `pclave_inv`='$pclave',
        `Antecedente_inv`='$antece',
        `objetivoge_inv`='$objeng',
        `objetivoes_inv`='$objees',
        `justificasion_inv`='$justifi',
        `hipotesis_inv`='$hipo',
        `metodologia_inv`='$metodo',
        `bibliografia`='$biblio',
        `referencias_inv`='$refe',
        `cotegoria_inv`='$categoria'
        
    WHERE
        id_inv='$codigo2'";

    if($mysqli->query($sql)){
        $status='successudt';
    }
    else{
        $status='errorudt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/mante_inve.php?s=".$status);
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

if($i=="ACTINV"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `inv_cientifica` SET
        `estado`='A'
    WHERE
    id_inv='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/desacti_inve.php?s=".$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Activado",
		icon: "success",
		
	  })
});


</script>

';
}

if($i=="ACTPU"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `publicacion` SET
        `estado`='A'
    WHERE
    id_public='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/desativado_public.php?s=".$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Activivado",
		icon: "success",
		
	  })
});


</script>

';
}



if($i=="ACTME"){
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

    header("Refresh: 2; URL= ../mantenimiento/desativado_medico.php?s=".$status);
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

    header("Refresh: 2; URL= ../mantenimiento/mante_medico.php?s=".$msj);
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


if($i=="DLTPU"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `publicacion` SET
        `estado`='I'
    WHERE
    id_public='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/mante_public.php?s=".$status);
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

if($i=="DLTINV"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `inv_cientifica` SET
        `estado`='I'
    WHERE
    id_inv='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/mante_inve.php?s=".$status);
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


if($i=="DLTROL"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `rol` SET
        `estado`='I'
    WHERE
    id_roles='$codigo'";

    if($mysqli->query($sql)){
        $status='success';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/mante_rol.php?s=".$status);
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

if($i=="DLTESP"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `especialidad` SET
        `estado`='I'
    WHERE
    id_espec='$codigo'";

    if($mysqli->query($sql)){
        $status='success';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/mante_espec.php?s=".$status);
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
