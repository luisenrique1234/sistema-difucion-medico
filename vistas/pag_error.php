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

<div id="login">
        
    <div class="wow bounceIn">
        <div class="container"> 
                                   
            <div id="login-center" class="center justify-content-center align-items-center">
                <div id="login-column" class="col-lg-6 col-lg-offset-3">

                
                    <br>
                    <br>
                    <br>
                    <div id="login-box" class="col-md-12  bg-light text-dark">
                        
                            <h3 class="text-center text-dark">Su cuenta<span class="btn btn-info"><?php echo $_SESSION["s_medico"];?></span></h3>
                            
                            <h3 class="text-center text-dark">No</h3>
                            <h3 class="text-center text-dark">cuenta con los permisos autorizados.</h3>
                            <h3 class="text-center text-dark">Contacte al personal acreditado.</h3>
                            <div class="form-group">
                            
                            </div>
                            <div class="form-group text-center">                                
                                <br>
                                <a href="../bd/logout.php" class="btn btn-danger">SALIR</a>
                            </div>                            
                    </div>
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