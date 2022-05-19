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
    <title>Estadisticas de visitas</title>
    <!--<link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">-->
    <!--<script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>-->
    <link href="./css/bulma.min.css" rel="stylesheet">
    <script src="../graficos/chart.min.js"></script>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />-->
    <link href="./css/all.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/dark.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="shortcut icon" href="../images/ico/ico.png">
    <link rel="stylesheet" href="../css/boton.css">
    <style>
      .color-menu{
        color: white;
        font-size: 18px;
        position: relative;
        top: 15px;
        margin-right: 30px;
        
        
      }
      .bulm_menu{
        position: relative;
        left: 150px;
      }
      .boton{
        position: relative;
        top: 15px;
      }
      
  
  
  
  a:hover {
    border-bottom: 1px solid;
    color: #84b6f4;
  }
  

  a {
    -webkit-transition: 300ms;
    -moz-transition: 300ms;
    -o-transition: 300ms;
    transition: 300ms;
  }
    </style>
</head>

<body>
<header id="header">
<nav class="navbar " role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="../admin_bien.php">
      <img src="../images/admin-logo.png" width="60" height="200">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <ul id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-end bulm_menu">
      <a class="color-menu" href="index.php" class="navbar-item">
        Inicio
      </a>

      <li class="navbar-item has-dropdown is-hoverable dropdown">
        <a href="/medico-red/mantenimiento/mante_medico.php" class="link color-menu ">
        Lista de Medico<i class="fa fa-angle-down"></i>
        </a>

        <ul class="navbar-dropdown">
        <li><a class="navbar-item" href="/medico-red/mantenimiento/mante_medico.php">Lista de médico</a></li>
        <li><a class="navbar-item" href="/medico-red/mantenimiento/desativado_medico.php">lista desactivado médico</a></li>
    </ul>
    </li>

      <li class="navbar-item has-dropdown is-hoverable">
        <a href="/medico-red/mantenimiento/mante_public.php" class="link color-menu ">
        Lista de Artículos<i class="fa fa-angle-down"></i>
        </a>
        <ul class="navbar-dropdown">
        <li><a class="navbar-item" href="/medico-red/mantenimiento/mante_public.php">Lista de Artículos</a></li>
        <li><a class="navbar-item" href="/medico-red/mantenimiento/desativado_public.php">Lista desctivado de Articulos</a></li>
        <li><a class="navbar-item" href="/medico-red/mantenimiento/mante_comentario.php">Comentario de Artículo</a></li>
        <li><a class="navbar-item" href="/medico-red/mantenimiento/desativado_comen.php">Lista desctivado de comentario</a></li>
        </ul>
        </li>

      <li class="navbar-item has-dropdown is-hoverable">
        <a href="/medico-red/mantenimiento/mante_confe.php" class="link color-menu ">
        Lista  Conferencia<i class="fa fa-angle-down"></i>
        </a>
        <ul class="navbar-dropdown">
        <li><a class="navbar-item" href="/medico-red/mantenimiento/mante_confe.php">Lista Conferencia</a></li>
        <li><a class="navbar-item" href="/medico-red/mantenimiento/desacti_confe.php">Lista desactivado Conferencia</a></li>
        </ul>
        </li>

      <li class="navbar-item has-dropdown is-hoverable">
        <a href="/medico-red/mantenimiento/mante_rol.php" class="link color-menu">
        Roles<i class="fa fa-angle-down"></i>
        </a>

        <ul class="navbar-dropdown">
          <li><a class="navbar-item" href="/medico-red/mantenimiento/mante_rol.php">Lista de Roles médico</a></li>
          <li><a class="navbar-item" href="/medico-red/mantenimiento/desactivado_rol.php">Lista de Roles médico desactivado</a></li>
          <li><a class="navbar-item" href="/medico-red/mantenimiento/mante_espec.php">Especialidades médicos</a></li>
          <li><a class="navbar-item" href="/medico-red/mantenimiento/desactivado_espec.php">Especialidades médicas desactivada</a> </li>
          </ul>
          </li>
      
    </div>

    <div class="navbar-end">
    <div class="navbar-item">
    <div class="navbar-item has-dropdown is-hoverable">
    <a href="/medico-red/perfiladmin/pefil_admin.php" style="background-color: #20558A; color: white;" class="button"><?php echo $_SESSION["s_admin"]; ?>. .<i class="fa fa-user"></i></a>

        <ul class="navbar-dropdown">
          <a href="/medico-red/perfiladmin/pefil_admin.php" class="navbar-item">
          Mi perfil
          </a>
          <a href="/medico-red/mantenimiento/mante_admin.php" class="navbar-item">
          Administradores
          </a>
          <a onclick="return alercerrarsision();" class="navbar-item">
          Cerrar sesion
          </a>
        </ul>
      </div>
      
    </div>
    
                    <div class="boton">
                        <div class="oscuro">
                            <div class="modo" id="modo">
                                <i class="fa fa-adjust" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
    </div>
    </ul>
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