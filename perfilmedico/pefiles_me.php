<?php 
$id=$_GET['id'];

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
    <title>Ver perfil médico</title>
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
      $medicomo = "SELECT medico.id_medico, CONCAT(medico.nombre_medico,' ',medico.apellido_medico) nombreme,medico.user_medico,medico.link_foto,medico.contrasena_me,especialidad.espec_descripsion,
      medico.email_me,medico.lugar_trabajo,medico.area_me,medico.cargo_me,medico.experiencia_me FROM medico,especialidad 
      WHERE medico.id_medico ='$id' AND medico.especialidadm=especialidad.id_espec AND medico.estado='A'";
      $medicomo2 = $mysqli->query($medicomo);
      while ($res = mysqli_fetch_array($medicomo2)) {
        $link_foto =$res["link_foto"];
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
                        </spam>
                        <h4 class="text-secondary mb-1 mt-0 h3"><?php echo $res["user_medico"]; ?></h4>
                      <p class="text-secondary mb-1 h4"><?php echo $res["espec_descripsion"]; ?></p>
                    </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0"><i class="iconData fa fa-envelope "></i>Email:</h4>
                    <span class="text-secondary"><?php echo $res["email_me"]; ?></span>
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
                      <h4 class="mb-0"> <?php echo $res["nombreme"]; ?><h4>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-home "></i>Trabaja en:</h4>
                    </div>
                    <div class="col-sm-7 ">
                      <h4 class="mb-0"> <?php echo $res["lugar_trabajo"]; ?><h4>
                    </div>
                  </div>
                  <hr>
                 <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-user-md "></i>Area:</h4>
                    </div>
                    <div class="col-sm-7 ">
                      <h4 class="mb-0"><?php echo $res["area_me"]; ?><h4>
                    </div>
                  </div>
                  <hr>
               <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-compass"></i>Cargo:</h4>
                    </div>
                    <div class="col-sm-7 ">
                      <h4 class="mb-0"><?php echo $res["cargo_me"]; ?><h4>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-clock-o "></i>Años Ejercidos:</h4>
                    </div>
                    <div class="col-sm-7 ">
                      <h4 class="mb-0"><?php echo $res["experiencia_me"]; ?><h4>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
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
    </body>
</html>