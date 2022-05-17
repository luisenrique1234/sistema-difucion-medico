<?php
include('../php/mante_consultas.php');
$query = extraadmin($_GET['id']);
$row=$query->fetch_assoc();

function mostrar($str)
{
  $codi = mb_detect_encoding($str, "ISO-8859-1,UTF-8");
  $str = iconv($codi, 'ISO-8859-1', $str);
  echo $str;
}
session_start();
if ($_SESSION["s_admin"] === null) {
    header("Location: ../admin_login.php");
} else{
    if($_SESSION["s_idRol3"]==2){
        header("Location: ../index.php");
    }
    elseif($_SESSION["s_idRol3"]==3){
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
  <title>Editar perfil admin</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/font-awesome.min.css" rel="stylesheet">
  <link href="../css/lightbox.css" rel="stylesheet">
  <link href="../css/animate.min.css" rel="stylesheet">
  <link href="../css/main.css" rel="stylesheet">
  <link href="pefil_medico_edit.css" rel="stylesheet">
  <link href="../css/responsive.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="../css/dark.css" rel="stylesheet">

  <link rel="stylesheet" href="../css/boton.css">
  <!--Icon-Font-->
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

  <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
  <link rel="shortcut icon" href="/medico-red/images/ico/ico.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/ico.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/ico.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/ico.png">
  <link rel="apple-touch-icon-precomposed" href="images/ico/ico.png">


</head>
<!--/head-->

<body>
  <?php include_once "../php/mante_menu.php"; ?>
  <div class="container">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-2 mb-1">
          <div class="card">
            
          </div>

        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-5">
                <form action="../php/reg_admin.php?accion=UDT" method="POST" enctype="multipart/form-data">
                  <input  type="hidden" name="codigoa" require="" placeholder="ID"  readonly value="<?php echo $row['id_admin']?>">
                  <h4 class="mb-0"><i class="iconData fa fa-user "></i>Nombre:</h4>
                </div>
                <div class="col-sm-7 ">
                  <input placeholder="Escribir Nombres y Apellidos..." type="text" name="nombre" class="form-control" value="<?php echo $row['adminis'] ?>">
                </div>
              </div>
              <hr>
              <!--
              <div class="row">
                <div class="col-sm-5">
                  <h4 class="mb-0"><i class="iconData fa fa-user "></i>Apellido:</h4>
                </div>
                <div class="col-sm-7 ">
                  <input placeholder="Escribir Nombres y Apellidos..." type="text" name="apellidome" class="form-control" value="<?php //echo $row['apellido_medico'] ?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <h4 class="mb-0"><i class="iconData fa fa-home "></i>Trabaja en:</h4>
                </div>
                <div class="col-sm-7 ">
                  <input placeholder="Ej. Clinica Nombre" type="text" name="trabajo" id="work" class="form-control" value="<?php //echo $row['lugar_trabajo'] ?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <h4 class="mb-0"><i class="iconData fa fa-user-md "></i>Area:</h4>
                </div>
                <div class="col-sm-7 ">
                  <select class="form-control" id="inputGroupSelect01" name="area">
                    <option value="Asistencial" <?php //if($row['area_me']=='Asistencial'){echo "selected";} ?>>Asistencial</option>
                    <option value="Investigación" <?php //if($row['area_me']=='Investigación'){echo "selected";} ?>>Investigación</option>
                    <option value="Docencia" <?php //if($row['area_me']=='Docencia'){echo "selected";} ?>>Docencia</option>
                    <option value="Administrativa"<?php //if($row['area_me']=='Administrativa'){echo "selected";} ?>>Administrativa</option>
                    <option value="Informativa" <?php //if($row['area_me']=='Informativa'){echo "selected";} ?>>Informativa</option>
                  </select>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <h4 class="mb-0"><i class="iconData fa fa-compass"></i>Cargo:</h4>
                </div>
                <div class="col-sm-7 ">
                  <input placeholder="Ej. Medico Enterino" type="text" name="cargo" id="work" class="form-control" value="<?php //echo $row['cargo_me'] ?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <h4 class="mb-0"><i class="iconData fa fa-clock-o "></i>Años Ejercidos:</h4>
                </div>
                <div class="col-sm-7 ">
                  <input placeholder="Cantidad de años" type="number" name="exper" id="work" class="form-control" value="<?php //echo $row['experiencia_me'] ?>">
                </div>
              </div>-->
              <hr>
              <div class="row">
                <div class="col-sm-12 formButtonsContainer">

                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="iconButton fa fa-unlock-alt"></i> Cambiar Contraseña
                  </button>
                  <div>
                    <a class="btn btn-danger"  href="pefil_admin.php"><i class="iconButton fa fa-ban"></i>Cancelar</a>

                    <input type="submit" class="btn btn-info mb-4" value="Guardar">
                    <!-- Button trigger modal -->
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modalClass modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="mb-0"><i class="iconData fa fa-unlock-alt"></i> Cambiar Contraseña</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-sm-3">
              <form action="../php/reg_admin.php?accion=UDTCONTRA" method="POST">
              <input  type="hidden" name="codigoad" required placeholder="ID"  readonly value="<?php echo $row['id_admin'];?>">
                <label>Contraseña Actual</label>
                <div class="form-group pass_show">
                  <input type="password" id="password" required class="form-control" value="<?php echo base64_decode($row['pass']); ?>">
                  
                </div>
                <label>Nueva Contraseña</label>
                <div class="form-group pass_show">
                  <input type="password" id="password2" required class="form-control">
                </div>
                <label>Confirmar Contraseña</label>
                <div class="form-group pass_show">
                  <input type="password" name="contra" required id="password3" class="form-control">
                </div>
                <div style="margin-top:15px;">
                  <input style="margin-left:20px;" type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña"/>
                  &nbsp;&nbsp;Mostrar Contraseñas
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <input type="submit" class="btn btn-info mb-4" value="Guardar">
          </form>
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

  <script>
    function mostrar() {
      var archivo = document.getElementById("file").files[0];
      var reader = new FileReader();
      if (file) {
        reader.readAsDataURL(archivo);
        reader.onloadend = function() {
          document.getElementById("img").src = reader.result;
        }
      }
    }
    /* mostra contraseña de los input de cambio de contraseña*/
    $(document).ready(function () {
  $('#mostrar_contrasena').click(function () {
    if ($('#mostrar_contrasena').is(':checked')) {
      $('#password').attr('type', 'text');
    } else {
      $('#password').attr('type', 'password');
    }
  });
});

$(document).ready(function () {
  $('#mostrar_contrasena').click(function () {
    if ($('#mostrar_contrasena').is(':checked')) {
      $('#password2').attr('type', 'text');
    } else {
      $('#password2').attr('type', 'password');
    }
  });
});

$(document).ready(function () {
  $('#mostrar_contrasena').click(function () {
    if ($('#mostrar_contrasena').is(':checked')) {
      $('#password3').attr('type', 'text');
    } else {
      $('#password3').attr('type', 'password');
    }
  });
});
  </script>
</body>

</html>