<!-- pefil_medico -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistama de divulgacion médico</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="perfilMedico.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="css/dark.css" rel="stylesheet">

    <link rel="stylesheet" href="css/boton.css">
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/ico.png">
</head>
<!--/head-->
<body  >
  <?php include_once "./php/menu.php"; ?>
 <div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body d-flex flex-column align-items-center text-center">
                    <div class="col-md-12">
                        <spam class="profile-img">
                            <img id="img"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                              <button class="btn btn-default fileinput-button" onclick="document.getElementById('file').click()">Actualizar</button>
                              <input type='file'   style="display:none" id="file" accept="image/*" onchange="mostrar()">
                        </spam>
                        <h4 class="text-secondary mb-1 mt-0 h3">María Altagracia Cárdenas</h4>
                      <p class="text-secondary mb-1 h4">Médico General</p>
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
                      <h4 class="mb-0"> María Altagracia Cárdenas Abreu<h4>
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
                      <a class="btn btn-info " target="__blank" href="/sistema-difucion-medico-master/pefil_medico_edit.php"><i class="iconButton fa fa-pencil "></i>Editar Perfil</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
                    <!--*******************************************************-->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/lightbox.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/medico_alerta.js"></script>
        <!--LUgar donde esta el ativador del modo oscuro -->
        <script type="text/javascript" src="js/temad.js"></script>
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
}</script>
    </body>
</html>