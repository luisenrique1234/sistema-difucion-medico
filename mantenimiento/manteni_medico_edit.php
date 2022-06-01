<?php
include('../php/mante_consultas.php');
$query = extraermedico($_GET['id']);

$row = $query->fetch_assoc();
function mostrar($str)
{
  $codi = mb_detect_encoding($str, "ISO-8859-1,UTF-8");
  $str = iconv($codi, 'ISO-8859-1', $str);
  echo $str;
}

session_start();
if ($_SESSION["s_admin"] === null) {
  header("Location: ../admin_login.php");
} else {
  if ($_SESSION["s_idRol3"] == 2) {
    header("Location: ../index.php");
  } elseif ($_SESSION["s_idRol3"] == 3) {
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
  <title>Editar  medico mantenimiento</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/font-awesome.min.css" rel="stylesheet">
  <link href="../css/lightbox.css" rel="stylesheet">
  <link href="../css/animate.min.css" rel="stylesheet">
  <link href="../css/main.css" rel="stylesheet">
  <link href="/medico-red/perfilmedico/pefil_medico_edit.css" rel="stylesheet">
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
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body d-flex flex-column align-items-center text-center">
              <div class="col-md-12">
                <form action="../php/tablas_mantenimiento.php?accion=UDT" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="codigom" require="" placeholder="ID" readonly value="<?php echo $row['id_medico'] ?>">
                  <spam class="profile-img">
                    <?php
                    $link_foto = $row["link_foto"];
                    $backslash = '\\';
                    echo '<img id="img"src="' . $backslash . 'medico-red' . $backslash . 'php' . $backslash . 'imagenes-perfil' . $backslash . '' . $link_foto . '" alt=""/>';
                    ?>
                    <a class="btn btn-default fileinput-button" onclick="document.getElementById('file').click()">Actualizar</a>
                    <input type='file' style="display:none" id="file" name="imagen" accept="image/*" onchange="mostrar()">
                  </spam>
                  <h4 class="mb-0 text-left"><i class="iconData fa fa-id-card-o"></i> Rol médico:</h4>
                  <select name="rolm" class="form-control" required="required">
                    <?php
                    include '../php/conexion.php';
                    $getAlumno1 = "SELECT * FROM rol";
                    $gerAlumno2 = $mysqli->query($getAlumno1);
                    while ($row2 = mysqli_fetch_array($gerAlumno2)) {
                      $id2 = $row2['id_roles'];
                      $espe2 = $row2['descripcion'];
                    ?>
                      <option value="<?php echo $id2 ?>" <?php if ($row['idRol'] == $id2) {
                                                          echo "selected";
                                                        } ?>><?php echo $espe2; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <h4 class="mb-0 text-left"><i class="iconData fa fa-user-circle  "></i>Nombre de Usuario:</h4>
                  <input placeholder="Nombre que las demas personas verán" type="text" name="user_me" class="form-control" value="<?php echo $row['user_medico'] ?>">
                  <h4 class="mb-0 text-left"><i class="iconData fa fa-graduation-cap  "></i>Especialidad:</h4>
                  <select name="especial" class="form-control" required="required">
                    <?php
                    include '../php/conexion.php';

                    $getAlumno1 = "SELECT * FROM  especialidad";
                    $gerAlumno2 = $mysqli->query($getAlumno1);

                    while ($row2 = mysqli_fetch_array($gerAlumno2)) {
                      $id = $row2['id_espec'];
                      $espe = $row2['espec_descripsion'];
                    ?>
                      <option value="<?php echo $id ?>" <?php if ($row['especialidadm'] == $id) {
                                                          echo "selected";
                                                        } ?>><?php echo $espe; ?></option>

                    <?php
                    }
                    ?>
                  </select>
                  <h4 class="text-left mb-0"><i class="iconData fa fa-envelope "></i>Email:</h4>
                  <input placeholder="MiEmail@gmail.com" type="text" name="email" id="work" class="form-control" value="<?php echo $row['email_me'] ?>">

                  
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-5">
                  <h4 class="mb-0"><i class="iconData fa fa-user "></i>Nombre:</h4>
                </div>
                <div class="col-sm-7 ">
                  <input placeholder="Escribir Nombres y Apellidos..." type="text" name="nombreme" class="form-control" value="<?php echo $row['nombre_medico'] ?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <h4 class="mb-0"><i class="iconData fa fa-user "></i>Apellido:</h4>
                </div>
                <div class="col-sm-7 ">
                  <input placeholder="Escribir Nombres y Apellidos..." type="text" name="apellidome" class="form-control" value="<?php echo $row['apellido_medico'] ?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <h4 class="mb-0"><i class="iconData fa fa-home "></i>Trabaja en:</h4>
                </div>
                <div class="col-sm-7 ">
                  <input placeholder="Ej. Clinica Nombre" type="text" name="trabajo" id="work" class="form-control" value="<?php echo $row['lugar_trabajo'] ?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <h4 class="mb-0"><i class="iconData fa fa-user-md "></i>Area:</h4>
                </div>
                <div class="col-sm-7 ">
                  <select class="form-control" id="inputGroupSelect01" name="area">
                    <option value="Asistencial" <?php if ($row['area_me'] == 'Asistencial') {
                                                  echo "selected";
                                                } ?>>Asistencial</option>
                    <option value="Investigación" <?php if ($row['area_me'] == 'Investigación') {
                                                    echo "selected";
                                                  } ?>>Investigación</option>
                    <option value="Docencia" <?php if ($row['area_me'] == 'Docencia') {
                                                echo "selected";
                                              } ?>>Docencia</option>
                    <option value="Administrativa" <?php if ($row['area_me'] == 'Administrativa') {
                                                      echo "selected";
                                                    } ?>>Administrativa</option>
                    <option value="Informativa" <?php if ($row['area_me'] == 'Informativa') {
                                                  echo "selected";
                                                } ?>>Informativa</option>
                  </select>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <h4 class="mb-0"><i class="iconData fa fa-compass"></i>Cargo:</h4>
                </div>
                <div class="col-sm-7 ">
                  <input placeholder="Ej. Medico Enterino" type="text" name="cargo" id="work" class="form-control" value="<?php echo $row['cargo_me'] ?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-5">
                  <h4 class="mb-0"><i class="iconData fa fa-clock-o "></i>Años Ejercidos:</h4>
                </div>
                <div class="col-sm-7 ">
                  <input placeholder="Cantidad de años" type="number" name="exper" id="work" class="form-control" value="<?php echo $row['experiencia_me'] ?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12 formButtonsContainer">

                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="iconButton fa fa-unlock-alt"></i> Cambiar Contraseña
                  </button>
                  <div>
                    <a class="btn btn-danger" href="mante_medico.php"><i class="iconButton fa fa-ban"></i>Cancelar</a>

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
                <form action="../php/tablas_mantenimiento.php?accion=UDTCONTRA" method="POST">
                  <input type="hidden" name="codigom" required placeholder="ID" readonly value="<?php echo $row['id_medico']; ?>">
                  <label>Contraseña Actual</label>
                  <div class="form-group pass_show">
                    <input type="password" id="password" required class="form-control" value="<?php echo base64_decode($row['contrasena_me']); ?>">

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
                    <input style="margin-left:20px;" type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña" />
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
    $(document).ready(function() {
      $('#mostrar_contrasena').click(function() {
        if ($('#mostrar_contrasena').is(':checked')) {
          $('#password').attr('type', 'text');
        } else {
          $('#password').attr('type', 'password');
        }
      });
    });

    $(document).ready(function() {
      $('#mostrar_contrasena').click(function() {
        if ($('#mostrar_contrasena').is(':checked')) {
          $('#password2').attr('type', 'text');
        } else {
          $('#password2').attr('type', 'password');
        }
      });
    });

    $(document).ready(function() {
      $('#mostrar_contrasena').click(function() {
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