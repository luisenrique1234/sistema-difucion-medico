<head>
<script src="../js/jquery341.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
  
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
        
        $id2=$_GET['id2'];

        //echo ("<h4>$id2</h4>");
        //exit;
        $comenr=$_POST['comentario'];
        session_start();
        $id_me=$_SESSION["s_idme"];
        date_default_timezone_set('America/Santo_Domingo');
        $date2 = (new DateTime())->format('y-m-d');
        
    
    $sql = " INSERT INTO `comentario` ( `id_public_com`,`id_medico_com`, `text_comen`, `fecha_comen`, `estado`) 
    VALUES (

        '$id2',
        '$id_me',
        '$comenr',
        '$date2',
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

    header("Refresh: 2; URL= ../mostra_articulo.php?id=".$id2);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	swal({
		title: "Comentario Publicado",
		icon: "success",
	  })
});


</script>

';
}

if ($i=="INS2"){
        
    $id3=$_GET['id3'];

    //echo ("<h4>$id2</h4>");
    //exit;
    $comenr2=$_POST['comentarioinv'];
    session_start();
    $id_me2=$_SESSION["s_idme"];
    $date3 = (new DateTime())->format('y-m-d');
    

$sql = " INSERT INTO `inv_comentario` ( `id_inve_com`,`id_medico_com`, `tex_cominv`, `fecha_inv`, `estado`) 
VALUES (

    '$id3',
    '$id_me2',
    '$comenr2',
    '$date3',
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

header("Refresh: 2; URL= ../con_cientifico.php?id=".$id3);
echo '
<script type="text/javascript">


$(document).ready(function(){

swal({
    title: "Comentario Publicado",
    icon: "success",
  })
});


</script>

';
}
?>