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

    
    //echo ("<h4>$extension</h4>");
    //exit;

    //$archivo=['archivo']['name'];
   session_start();
    $id_me=$_SESSION["s_idme"];

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

    
    $date = (new DateTime())->format('y-m-d');
    //echo ("<h4>$id_me</h4>");
    //echo ("<h4>$new_imgen</h4>");
    //exit;


    $sql = " INSERT INTO `inv_cientifica` ( `id_medico_inv`,`titulo_inv`,`autor_inv`,`resume_inv`,`introducion_inv`, `pclave_inv`,`Antecedente_inv`,`objetivoge_inv`,`objetivoes_inv`,`justificasion_inv`,`hipotesis_inv`,`metodologia_inv`,`bibliografia`,`referencias_inv`,`cotegoria_inv`,`fecha_inv`, `estado`) 
    VALUES (

        '$id_me',
        '$titulo',
        '$autor',
        '$resumen',
        '$intro',
        '$pclave',
        '$antece',
        '$objeng',
        '$objees',
        '$justifi',
        '$hipo',
        '$metodo',
        '$biblio',
        '$refe',
        '$categoria',
        '$date',
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
     
    header("Refresh: 2; URL= ../pu_cientifico.php?s=" . $status);
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

    header("Refresh: 2; URL= ../lista_publicm.php?s=".$status);
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

    header("Refresh: 2; URL= ../lista_publicm.php?s=".$status);
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