<?php
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
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de visitas</title>
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">

    <link href="../css/dark.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="shortcut icon" href="../images/ico/ico.png">
    <link rel="stylesheet" href="../css/boton.css">
</head>

<body>
<header id="header">
<nav class="navbar " role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="../admin_bien.php">
      <img src="../images/admin-logo.png" width="100" height="100">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-end">
      <a href="../admin_bien.php" class="navbar-item">
        Inicio
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a href="../mante_medico.php" class="navbar-link">
        Lista de Medico
        </a>

        <div class="navbar-dropdown">
          <a href="../mante_medico.php" class="navbar-item">Lista de médico</a>

          <a href="../desativado_medico.php" class="navbar-item">Lista desactivado médico</a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a href="../mante_public.php" class="navbar-link">
        Lista de publicaciones
        </a>

        <div class="navbar-dropdown">
          <a href="../mante_public.php" class="navbar-item">
            Lista de publicaciones
          </a>
          <a href="#" class="navbar-item">
            Comentario de publicaciones
          </a>
          <a href="../desativado_public.php" class="navbar-item">
            LIsta de desactivado publicaciones
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a href="../mante_inve.php" class="navbar-link">
        Lista  investigaciones 
        </a>

        <div class="navbar-dropdown">
          <a href="../mante_inve.php" class="navbar-item">
            Lista de investigaciones
          </a>
          <a href="#" class="navbar-item">
            Comentario de investigaciones
          </a>
          <a href="../desacti_inve.php" class="navbar-item">
            LIsta de desactivado investigaciones
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a href="../mante_rol.php" class="navbar-link">
        Roles
        </a>

        <div class="navbar-dropdown">
          <a href="../mante_rol.php" class="navbar-item">
            Lista Roles médicos
          </a>
          <a href="../mante_espec.php" class="navbar-item">
            Especialidades médicos
          </a>
        </div>
      </div>
      
    </div>

    <div class="navbar-end">
    <div class="navbar-item">
    <div class="navbar-item has-dropdown is-hoverable">
    <a href="#" style="background-color: #5bc3db;" class="button"><?php echo $_SESSION["s_admin"]; ?>. .<i class="fa fa-user"></i></a>

        <div class="navbar-dropdown">
          <a href="#" class="navbar-item">
          Mi perfil
          </a>
          <a onclick="return alercerrarsision();" class="navbar-item">
          Cerrar sesion
          </a>
        </div>
      </div>
      
    </div>
    </div>
  </div>
</nav>
</header>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
            const boton = document.querySelector(".navbar-burger");
            const menu = document.querySelector(".navbar-menu");
            boton.onclick = () => {
                menu.classList.toggle("is-active");
                boton.classList.toggle("is-active");
            };
        });
    </script>