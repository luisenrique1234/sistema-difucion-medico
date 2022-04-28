<?php 
function mostrar($str)
{
    $codi = mb_detect_encoding($str, "ISO-8859-1,UTF-8");
    $str = iconv($codi, 'ISO-8859-1', $str);
    echo $str;
}

session_start();
if ($_SESSION["s_medico"] === null) {
    header("Location: ./login.php");
} else {
    if ($_SESSION["s_idRol2"] == 3) {
        header("Location: ./vistas/pag_error.php");
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
    <title>Sistama de divulgacion médico</title>
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
<body  >
  <?php include_once "../php/menu_nada.php"; ?>
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
                       <h4 class="mb-0 text-left"><i class="iconData fa fa-user-circle  "></i>Nombre de Usuario:</h4>
                      <input placeholder="Nombre que las demas personas verán" type="text" name="work" id="work" class="form-control">
                       <h4 class="mb-0 text-left"><i class="iconData fa fa-graduation-cap  "></i>Especialidad:</h4>
                      <input placeholder="Ej. Cardiolog@" type="text" name="work" id="work" class="form-control">
                      <h4 class="text-left mb-0"><i class="iconData fa fa-envelope "></i>Email:</h4>
                     <input placeholder="MiEmail@gmail.com" type="text" name="work" id="work" class="form-control">

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
                       <input placeholder="Escribir Nombres y Apellidos..." type="text" name="UserName"  class="form-control">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-user "></i>Apellido:</h4>
                    </div>
                    <div class="col-sm-7 ">
                       <input placeholder="Escribir Nombres y Apellidos..." type="text" name="userapellido"  class="form-control">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-home "></i>Trabaja en:</h4>
                    </div>
                    <div class="col-sm-7 ">
                         <input placeholder="Ej. Clinica Nombre" type="text" name="work" id="work" class="form-control">
                    </div>
                  </div>
                  <hr>
                 <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-user-md "></i>Area:</h4>
                    </div>
                    <div class="col-sm-7 ">
                       <select class="form-control" id="inputGroupSelect01">
                          <option selected>Elegir...</option>
                          <option value="Asistencial">Asistencial</option>
                          <option value="Investigación">Investigación</option>
                          <option value="Docencia">Docencia</option>
                          <option value="Administrativa">Administrativa</option>
                          <option value="Informativa">Informativa</option>
                        </select>
                    </div>
                  </div>
                  <hr>
               <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-compass"></i>Cargo:</h4>
                    </div>
                    <div class="col-sm-7 ">
                           <input placeholder="Ej. Medico Enterino" type="text" name="work" id="work" class="form-control">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-5">
                           <h4 class="mb-0"><i class="iconData fa fa-clock-o "></i>Años Ejercidos:</h4>
                    </div>
                    <div class="col-sm-7 ">
                    <input placeholder="Cantidad de años" type="number" name="work" id="work" class="form-control">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12 formButtonsContainer">
                      
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                       <i class="iconButton fa fa-unlock-alt"></i> Cambiar Contraseña
                      </button>
                     <div >
                       <a class="btn btn-danger" target="__blank" href="pefil_medico.php"><i class="iconButton fa fa-ban"></i>Cancelar</a>
 
                      <a class="btn btn-info mb-4" target="__blank" href="pefil_medico.php"><i class="iconButton fa fa-save"></i>Guardar</a>
                      <!-- Button trigger modal -->
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"   aria-hidden="true">
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
		    
		    <label>Contraseña Actual</label>
		    <div class="form-group pass_show"> 
                <input type="password"   class="form-control"> 
            </div> 
		       <label>Nueva Contraseña</label>
            <div class="form-group pass_show"> 
                <input type="password"   class="form-control" > 
            </div> 
		       <label>Confirmar Contraseña</label>
            <div class="form-group pass_show"> 
                <input type="password"   class="form-control" > 
            </div> 
		</div>  
	</div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-info"><i class="iconButton fa fa-save"></i>Guardar</button>
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