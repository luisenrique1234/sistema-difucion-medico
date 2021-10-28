<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registro medico</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">


    <link rel="stylesheet" href="css/estilos.css">

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

<body>
    <div id="login">

        <div class="wow bounceIn">
            <div class="container">
                <div id="login-center" class="center justify-content-center align-items-center">
                    <div id="login-column" class="col-lg-6 col-lg-offset-3">

                        <br>
                        <div class=" col-lg-offset-4">
                            <img src="images/logo.png" width="40%">
                        </div>

                        <div id="login-box" class="col-md-12  bg-light text-dark">
                            <form action="php/registro_medico.php?accion=INS" method="POST">
                                <h3 class="text-center text-dark">Registro Medico</h3>
                                <div class="form-group">
                                    <label for="usuario" class="text-dark">Nombre</label><br>
                                    <input type="text" name="nombre" id="nombre" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="usuario" class="text-dark">Apellido</label><br>
                                    <input type="text" name="apellido" id="apellido" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="usuario" class="text-dark">SQARTO Medico</label><br>
                                    <input type="text" name="codime" id="codigo" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                <label class="control-label">Especialidad<span
                                                                style="color:turquoise">*</span> </label>
                                                        <select class="form-control" name="espec"
                                                            required="required">
                                                            <option>Pediatria</option>
                                                            <option>Cirugia general</option>
                                                            <option selected>Cardiologia</option>
                                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-dark">Password</label><br>
                                    <input type="password" name="password" id="password" class="form-control" required="required">
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" value="registralr" class="btn btn-submit">
                                    <br>
                                    <h5><a href="login.php">Login</a></h5>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/temad.js"></script>

    <script src="plugins/sweet_alert2/sweetalert2.all.min.js"></script>
    <script src="codigo.js"></script>
</body>

</html>