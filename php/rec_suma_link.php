<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../codigo.js"></script>
</head>
<?php 
include ('conexion.php');

$id=$_GET['id'];
    session_start();
    $id_me=$_SESSION["s_idme"];
    $cambio=false;

$sql2=("SELECT* FROM recordatorio");
        $sql= $mysqli->query($sql2);

while ($rowSql = mysqli_fetch_assoc($sql)){ 

  $medio=$rowSql['id_medicorec'];
  $conferc=$rowSql['id_confererec'];
  
  if ($id==$rowSql['id_confererec'] AND $id_me==$rowSql['id_medicorec']) {
    $cambio=true;
  }

  
}


//exit;
?>


<?php
    include 'conexion2p.php';
    $i = '';
    $S ='';
if (isset($_GET['accion']) OR isset($_GET['acciones'])) {
    $i = $_GET['accion'];
    $S = $_GET['acciones'];
}






if($cambio==false){
if($S=="SUMA"){
    $msj='';
    $suma=$_GET['rec'];
    $codigo=$_GET['id'];

    $sql="
    UPDATE `conferencia` SET
        `recordatorio`='$suma'
    WHERE
    id_confe='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }
}

if ($i == "INSREC") {

    $id=$_GET['id'];
    //echo ("<h4>coferecia $id</h4>");
    //exit;
    $id_me=$_SESSION["s_idme"];

    
    //$date = (new DateTime())->format('y-m-d');
    //echo ("<h4>$date</h4>");
    //echo ("<h4>$new_imgen</h4>");
    //exit;


    $sql = " INSERT INTO `recordatorio` ( `id_medicorec`,`id_confererec`,`estado`) 
    VALUES (

        '$id_me',
        '$id',
        'A')";
    

      
    if ($mysqli->query($sql)) {
        
        $status = 'success';
    } else {
        $status = 'error';
        echo "error" . mysqli_error($mysqli);
    }
    // echo("erro descripcion:" .mysqli_error($mysqli));
    //header("Location: ../propietarip_mant.php?s=".$status);
     
    header("Refresh: 2; URL= ../conferencia_me.php?s=" .$status);
    echo '
<script type="text/javascript">


$(document).ready(function(){

	Swal.fire({
        icon: "success",
        title: "Recordatorio Activado"
      })
});


</script>

' ;

}

}elseif ($cambio==true) {

  header("Refresh: 2; URL= ../conferencia_me.php");
    echo '
<script type="text/javascript">


$(document).ready(function(){

	Swal.fire({
        icon: "success",
        title: "Ya Tiene el recordatorio activado para esta conferencia"
      })
});


</script>

' ;
}


if($i=="VISITA"){
    $sumavist=$_GET['vist'];
    $linkd=$_GET['linkd'];
    $codigo=$_GET['id'];
    //exit;
    $sql="
    UPDATE `conferencia` SET
        `visttas_confe`='$sumavist'
    WHERE
    id_confe='$codigo'";

    if($mysqli->query($sql)){
        $status='successdlt';
    }
    else{
        $status='errordlt';
        echo "error" .mysqli_error($mysqli);
    }

    header("Refresh: 2; URL=$linkd");
    echo '
<script type="text/javascript">


$(document).ready(function(){

    let timerInterval
Swal.fire({
  title: "Redirigiendo",
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector("b")
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log("I was closed by the timer")
  }
})
    
});


</script>

' ;

}



?>
