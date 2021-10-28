<?php 
session_start();

//Si nadie inció sesión vuelve a la pag de Login
if ($_SESSION["s_medico"] === null){
	header("Location: ../login.php");
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
    <link rel="stylesheet" href="../css/pag_error.css">

    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <title>Permisos</title>
    <link rel="shortcut icon" href="../images../ico/ico.png" type="image/x-icon">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1 class="display-4 text-center">Permisos</h1>
                    <h2 class="text-center">Usuario: <span
                            class="btn btn-info"><?php echo $_SESSION["s_medico"];?></span></h2>
                    <p class="lead text-center">Usted NO tiene permisos de Medico</p>
                    <h2 class="text-center">Su permiso es: <span
                            class="btn btn-warning"><?php echo $_SESSION["s_rol_descripcion2"];?></span></h2>
                    <hr class="my-4">
                    <a class="btn btn-danger btn-lg" href="../bd/logout.php" role="button">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <script src="../popper/popper.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>

    <script src="../plugins/sweet_alert2/sweetalert2.all.min.js"></script>
    <script src="../codigo.js"></script>
</body>

</html>