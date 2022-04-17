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

/* En esta parte se registra lo nuevos medicos que 
     desen usar la plataforma y es coresponde al archivo public.php */

if ($i == "INSCON") {

    /*Esta es la parte encargada de subir los arichivo a una carperta de terminada 
    donde despues los tors medicos podran descargarla*/
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
            header("Refresh: 4; URL= ../formu_conferencia.php");
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
        header("Refresh: 3; URL= ../formu_conferencia.php");
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

    $titulocon = $_POST['titulo'];
    $partici = $_POST['parti'];
    $linkco = $_POST['link'];
    $fechini = $_POST['fechini'];
    $fechfinal = $_POST['fechfinal'];
    //$etapacon = $_POST['etapa'];
    $categoriacon = $_POST['tema'];

    
    //$date = (new DateTime())->format('y-m-d');
    //echo ("<h4>$date</h4>");
    //echo ("<h4>$new_imgen</h4>");
    //exit;


    $sql = " INSERT INTO `conferencia` ( `id_userme`,`titulo_confe`,`autores_confe`,`link_confe`,`material_confe`, `categoria_confe`,`fachainicio`,`fechafinal`,`etapa_confe`,`estado`) 
    VALUES (

        '$id_me',
        '$titulocon ',
        '$partici',
        '$linkco',
        '$new_archivo',
        '$categoriacon',
        '$fechini',
        '$fechfinal',
        'Programada',
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
     
    header("Refresh: 2; URL= ../mis_conferencia.php?s=" .$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Conferencia creada",
		icon: "success",
	  })
});


</script>

' ;

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
        }else{
            header("Refresh: 4; URL= ../actualizar_conferencia.php?id=".$codigocon);
        echo '
            <script type="text/javascript">


            $(document).ready(function(){

	        swal({
	        title: "Tipo de archivo no admitido, Solo se permiten .pdf",
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
    header("Refresh: 2; URL= ../mis_conferencia.php?s=".$status);
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
    header("Refresh: 2; URL= ../mis_conferencia.php?s=".$status);
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
    header("Refresh: 2; URL= ../mis_conferencia.php?s=".$status);
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
