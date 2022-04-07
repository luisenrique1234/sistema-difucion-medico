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

if ($i == "INS") {

    /*Esta es la parte encargada de subir los arichivo a una carperta de terminada 
    donde despues los tors medicos podran descargarla*/
    $file_nameconple = $_FILES['archivo']['name'];
    list( $file_name) = explode('.', $file_nameconple);

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
            header("Refresh: 4; URL= ../form_public.php");
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
        header("Refresh: 3; URL= ../form_public.php");
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
    $public = $_POST['resumen'];
    $categoria = $_POST['tema'];
    $autor1 = $_POST['autor'];
    $refe = $_POST['biblio'];

    
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
     
    header("Refresh: 2; URL= ../mis_articulos.php?s=" . $status);
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


    $titulo2=$_POST['titulo'];
    $autor2=$_POST['autor'];

    $public2=$_POST['resumen'];
    $refer=$_POST['biblio'];
    $categoria2=$_POST['tema'];

    $codigo2=$_POST['codioarti'];
    
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

    header("Refresh: 2; URL= ../mis_articulos.php?s=".$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Artículo Editado",
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

    header("Refresh: 2; URL= ../mis_articulos.php?s=".$status);
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