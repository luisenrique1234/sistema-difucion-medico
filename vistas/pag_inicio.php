<?php 
session_start();

//Si nadie inció sesión vuelve a la pag de Login
if ($_SESSION["s_usuario"] === null){
	header("Location: ../index.php");
}else{
    if($_SESSION["s_idRol"]!=1){
        header("Location: pag_error.php");
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="#" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/sweet_alert2/sweetalert2.min.css">
    <link rel="stylesheet" href="../css../style.css">
    
    <title>Bienvenido -EduTec</title>
    <link rel="shortcut icon" href="../img../logo-b.png" type="image/x-icon">
</head>
<body>

<nav class="navbar navbar-expand-lg"style="background-color: #e3f2fd;" >
<img src="../img../logo-b.png" alt="Logo" width="50px" style="margin-right: 10px; border-radius: 80%;" />
  <h5>EduTec</h5>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../lista_alumnos.php">Alumnos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../lista_califi.php">Calificaciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../lista_grupos.php">Grupos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../lista_bloque.php">Bloques</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Desativados
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../lista_alum_desacti.php">lista de Alumnos Desativados</a>
          <a class="dropdown-item" href="#">Grupos Desativados</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Bloques Desativados</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <div class="jumbotron">
          <h1 class="display-4 text-center">¡Bienvenido!</h1>
          <h2 class="text-center">Usuario: <span class="badge badge-success"><?php echo $_SESSION["s_usuario"];?></span></h2>    
          <p class="lead text-center">Esta es la página de inicio EduTec.</p>
          <hr class="my-4">          
          <a class="btn btn-danger btn-lg" href="../bd/logout.php" role="button">Cerrar Sesión</a>
        </div>
        </div>
    </div>
</div>    

        
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="../popper/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../plugins/sweet_alert2/sweetalert2.all.min.js"></script>
<script src="../codigo.js"></script>
</body>
</html>