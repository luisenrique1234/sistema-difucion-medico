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

     /* donde se registra los medicos dese el area de los mantenimientos*/


     if ($i=="INS"){
        

        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $codime2=$_POST['sqmedico'];
        $user=$_POST['userac'];
        $pass = md5($_POST['contra']);
        $rol=$_POST['rolm'];
        $prov=$_POST["provicia"];

        $espec=$_POST['especial'];
        //$date = (new DateTime())->format('y-m-d');

    
    $sql = " INSERT INTO `medico` ( `nombre_medico`,`apellido_medico`,`user_medico`, `codigo_medico`,`especialidadm`,`provincia_me`,`idRol`,`contrasena_me`, `estado`) 
    VALUES (

        '$nombre',
        '$apellido',
        '$user',
        '$codime2',
        '$espec',
        '$prov',
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

if($i=="UDTCOM"){
    $msj='';

    $codigom2 =$_POST['codicome'];
    $comentario=$_POST['comentario'];
    

    
    $sql="
    UPDATE `comentario` SET
        `text_comen`='$comentario'
        
    WHERE
        id_comen='$codigom2'";

    if($mysqli->query($sql)){
        $status='successudt';
    }
    else{
        $status='errorudt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/mante_comentario.php?s=".$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Comentario editado",
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


if($i=="UDTCON"){
    $msj='';
    $codigocon=$_POST['codiconfe'];

    $file_nameconple = $_FILES['archivo']['name'];
    list( $file_name) = explode('.', $file_nameconple);
    $new_name_file = null;
    if ($file_name != '' || $file_name != null) {
        $file_type = $_FILES['archivo']['name'];
        list($type, $extension) = explode('.', $file_type);
        if ($extension == 'pdf') {
            $dir = 'documento-confe-pdf/';
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
            $dir = 'documento-confe-word/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['archivo']['tmp_name'];
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
                $new_archivo=$new_name_file;
                //echo ("<h4>$new_name_file</h4>");

            }
        }else{
            header("Refresh: 4; URL= ../actualizarman_conferencia.php?id=".$codigocon);
        echo '
            <script type="text/javascript">


            $(document).ready(function(){

	        swal({
	        title: "Tipo de archivo no admitido, Solo se permiten pdf,docx",
		    icon: "warning",
	        })
            });


            </script>'
            ; exit;
        }
    }else{
        $titulo=$_POST['titulo'];
    $partici=$_POST['parti'];

    $linkco2=$_POST['link'];

    $fechaini=$_POST['fechini'];
    $fechafinal=$_POST['fechfinal'];
    $etapacofe=$_POST['etapa'];
    $catego_tema=$_POST['tema'];

    
    $sql="
    UPDATE `conferencia` SET
        `titulo_confe` ='$titulo',
        `autores_confe` ='$partici',
        `link_confe` ='$linkco2',
        `categoria_confe` ='$catego_tema',
        `fachainicio`='$fechaini',
        `fechafinal`='$fechafinal',
        `etapa_confe`='$etapacofe'
        
    WHERE
        id_confe='$codigocon'";

    if($mysqli->query($sql)){
        $status='success';
    }
    else{
        $status='errorudt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);
    header("Refresh: 2; URL= ../mantenimiento/mante_confe.php?s=".$status);
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

    
    $titulo=$_POST['titulo'];
    $partici=$_POST['parti'];
    
    $linkco2=$_POST['link'];

    $fechaini=$_POST['fechini'];
    $fechafinal=$_POST['fechfinal'];
    $etapacofe=$_POST['etapa'];
    

    
    $sql="
    UPDATE `conferencia` SET
        `titulo_confe` ='$titulo',
        `autores_confe` ='$partici',
        `link_confe` ='$linkco2',
        `material_confe` ='$new_archivo',
        `fachainicio`='$fechaini',
        `fechafinal`='$fechafinal',
        `etapa_confe`='$etapacofe'
        
    WHERE
        id_confe='$codigocon'";

    if($mysqli->query($sql)){
        $status='success';
    }
    else{
        $status='errorudt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);
    header("Refresh: 2; URL= ../mantenimiento/mante_confe.php?s=".$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Conferencia Editada",
		icon: "success",
		
	  })
});


</script>

';
}


if($i=="ACTICONFE"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `conferencia` SET
        `estado`='A'
    WHERE
    id_confe='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/desacti_confe.php?s=".$status);
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

if($i=="ACTIROL"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `rol` SET
        `estado`='A'
    WHERE
    id_roles='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/desactivado_rol.php?s=".$status);
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

if($i=="ACTIESP"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `especialidad` SET
        `estado`='A'
    WHERE
    id_espec='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/desactivado_espec.php?s=".$status);
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

if($i=="ACTCOM"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `comentario` SET
        `estado`='A'
    WHERE
    id_comen='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/desativado_comen.php?s=".$status);
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

if($i=="COMDLT"){
    $msj='';
    $codigo=$_GET['id'];
    $sql="
    UPDATE `comentario` SET
        `estado`='I'
    WHERE
    id_comen='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/mante_comentario.php?s=".$status);
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

if($i=="DLTCON"){
    $msj='';
    $codigo=$_GET['id'];

    $sql="
    UPDATE `conferencia` SET
        `estado`='I'
    WHERE
    id_confe='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$msj);

    header("Refresh: 2; URL= ../mantenimiento/mante_confe.php?s=".$status);
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
