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

/* donde se crea los nuevos articulos desde el mantenimiento*/

if ($i == "INSART") {
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
        }else{
            header("Refresh: 4; URL= ../mantenimiento/nuevoman_artiuculo.php");
        echo '
            <script type="text/javascript">


            $(document).ready(function(){

	        swal({
	        title: "Tipo de archivo no admitido, Solo se permiten pdf",
		    icon: "warning",
	        })
            });


            </script>'
            ; exit;
        }
    }else{
        header("Refresh: 3; URL= ../mantenimiento/nuevoman_articulo.php");
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
    $resumen = $_POST['resumen'];
    $contenidopdf =$_POST['contenido'];

    $categoria = $_POST['categoria'];
    $autor1 = $_POST['autor'];
    $biblio = $_POST['biblio'];
    $etiqueta =$_POST['etiqueta'];
    $estado_articulo =$_POST['estado'];

    
    $date = (new DateTime())->format('y-m-d');
    //echo ("<h4>$date</h4>");
    //echo ("<h4>$new_imgen</h4>");
    //exit;


    $sql = " INSERT INTO `publicacion` ( `id_medico_pu`,`titulo_public`,`autor_pu`,`text_public`,`contendio_pdf`,`referencia_pu`,`link_archivo`,`fecha_public`,`categoria_public`,`etiqueta`,`me_gusta_pu`,`estado_articulo`, `estado`) 
    VALUES (

        '$id_me',
        '$titulo',
        '$autor1',
        '$resumen',
        '$contenidopdf',
        '$biblio',
        '$new_archivo',
        '$date',
        '$categoria',
        '$etiqueta',
        '10',
        '$estado_articulo',
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


if($i=="UDTART"){
    $msj='';

    
    $codigo2=$_POST['codioarti'];

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
            header("Refresh: 4; URL= ../mantenimiento/mante_public.php?id=".$codigo2);
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

    $titulo2=$_POST['titulo'];
    $autor2=$_POST['autor'];
    $public2=$_POST['resumen'];
    $contenido=$_POST['contenido'];
    $refer=$_POST['biblio'];
    $categoria2=$_POST['categoria'];
    $etiqueta=$_POST['etiqueta'];
    $estado=$_POST['estado'];
    $sql="
    UPDATE `publicacion` SET
        `titulo_public` ='$titulo2',
        `autor_pu` ='$autor2',
        `text_public` ='$public2',
        `contendio_pdf` ='$contenido',
        `referencia_pu`='$refer',
        `categoria_public`='$categoria2',
        `etiqueta`='$etiqueta',
        `estado_articulo`='$estado'
        
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
		title: "Artículo editado",
		icon: "success",
		
	  })
});


</script>

';
exit;
}


    $titulo2=$_POST['titulo'];
    $autor2=$_POST['autor'];
    $public2=$_POST['resumen'];
    $contenido=$_POST['contenido'];
    $refer=$_POST['biblio'];
    $categoria2=$_POST['categoria'];
    $etiqueta=$_POST['etiqueta'];
    $estado=$_POST['estado'];
    $sql="
    UPDATE `publicacion` SET
        `titulo_public` ='$titulo2',
        `autor_pu` ='$autor2',
        `text_public` ='$public2',
        `contendio_pdf` ='$contenido',
        `referencia_pu`='$refer',
        `link_archivo`='$new_archivo',
        `categoria_public`='$categoria2',
        `etiqueta`='$etiqueta',
        `estado_articulo`='$estado'
        
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
		title: "Artículo editado",
		icon: "success",
		
	  })
});


</script>

';

}

?>