<?php 
include('../php/consultas.php');
/*esta fucion sirve para converti toddos los carateres como acentos en formato
uti-8 indenpedientemente de cual fuera su formato de  origen todo se convertira en 
utf-8 para que asi todos tengan el mismo formato*/
function mostrar($str)
{
    $codi = mb_detect_encoding($str, "ISO-8859-1,UTF-8");
    $str = iconv($codi, 'ISO-8859-1', $str);
    echo $str;
}

session_start();
if ($_SESSION["s_medico"] === null) {
    header("Location: ../login.php");
} else {
    if ($_SESSION["s_idRol2"] == 3) {
        header("Location: ../vistas/pag_error.php");
    }
}

?>

<!-- pefil_medico -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Perfil médico </title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="perfilMedico.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="../css/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/boton.css">
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/medico-red/images/ico/ico.png">
</head>
<!--/head as-->
<body  >
  <?php include_once "../php/menu_nada.php"; ?>
 <div class="container">
    <div class="main-body">
      <?php
      $query = perfil_medico();
      while ($row = $query->fetch_assoc()) {
          $link_foto =$row["link_foto"];
           
       ?>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body d-flex flex-column align-items-center text-center">
                    <div class="col-md-12">
                        <spam class="profile-img">
                          <?php 
                          $backslash='\\';
                          
                            echo '<img id="img"src="'.$backslash.'medico-red'.$backslash.'php'.$backslash.'imagenes-perfil'.$backslash.''.$link_foto. '" alt=""/>';
                            ?>
                              <button class="btn btn-default fileinput-button" onclick="document.getElementById('file').click()">Actualizar</button>
                              <input type='file'   style="display:none" id="file" accept="image/*" onchange="mostrar()">
                        </spam>
                        <h4 class="text-secondary mb-1 mt-0 h3"><?php echo $row["user_medico"]; ?></h4>
                      <p class="text-secondary mb-1 h4"><?php echo $row["espec_descripsion"]; ?></p>
                    </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0"><i class="iconData fa fa-envelope "></i>Email:</h4>
                    <span class="text-secondary">MariaCardenas@gmail.com</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-user "></i>Nombre Completo:</h4>
                    </div>
                    <div class="col-sm-7 ">
                      <h4 class="mb-0"> <?php echo $row["nombreme"]; ?><h4>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-home "></i>Trabaja en:</h4>
                    </div>
                    <div class="col-sm-7 ">
                      <h4 class="mb-0"> Clínica San Agustinian<h4>
                    </div>
                  </div>
                  <hr>
                 <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-user-md "></i>Area:</h4>
                    </div>
                    <div class="col-sm-7 ">
                      <h4 class="mb-0">Asistencial<h4>
                    </div>
                  </div>
                  <hr>
               <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-compass"></i>Cargo:</h4>
                    </div>
                    <div class="col-sm-7 ">
                      <h4 class="mb-0">Medico<h4>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-clock-o "></i>Años Ejercidos:</h4>
                    </div>
                    <div class="col-sm-7 ">
                      <h4 class="mb-0">5<h4>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <?php echo("<a class='btn btn-info' target='__blank' href='pefil_medico_edit.php?id=".$row["id_medico"]."'><i class='iconButton fa fa-pencil'></i>Editar Perfil</a>");?>
                      <?php }?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
                    <!--*******************************************************-->
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/lightbox.min.js"></script>
        <script type="text/javascript" src="../js/wow.min.js"></script>
        <script type="text/javascript" src="../js/main.js"></script>
        <script type="text/javascript" src="../js/medico_alerta.js"></script>
        <!--LUgar donde esta el ativador del modo oscuro -->
        <script type="text/javascript" src="../js/temad.js"></script>
 <script >
        function mostrar(){
  var archivo = document.getElementById("file").files[0];
  var reader = new FileReader();
  if (file) {
    reader.readAsDataURL(archivo );
    reader.onloadend = function () {
      document.getElementById("img").src = reader.result;
    }
  }
}
</script>
    </body>
</html>