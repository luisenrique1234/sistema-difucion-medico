<?php 

session_start();
if ($_SESSION["s_admin"] === null) {
    header("Location: ./admin_login.php");
} else{
    if($_SESSION["s_idRol3"]==2){
        header("Location: ./index.php");
    }
    elseif($_SESSION["s_idRol3"]==3){
        header("Location: ./vistas/pag_error.php");
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bienvenido</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">

    
    <link rel="stylesheet" href="css/bienvenido.css">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/ico.png">
</head><!--/head-->
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
                        
                            <h3 class="text-center text-dark">Bienvenido <span class="btn btn-info"><?php echo $_SESSION["s_admin"];?></span></h3>
                            
                            <h3 class="text-center text-dark">AL</h3>
                            <h3 class="text-center text-dark">Sistema de difusión de información médico</h3>
                            <div class="form-group">
                            
                            </div>
                            <div class="form-group text-center">                                
                                <a href="/medico-red/contador/index.php"  class="btn btn-info btn-lg btn-block">ENTRAR</a>
                                <br>
                                <a href="bd/logout2.php" class="btn btn-danger">SALIR</a>
                            </div>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script> 
    <script type="text/javascript" src="js/temad.js"></script> 
    
    <script src="plugins/sweet_alert2/sweetalert2.all.min.js"></script>
</body>
</html>