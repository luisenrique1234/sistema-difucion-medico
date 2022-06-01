<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registro médico</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="/medico-red/contador/css/all.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">
    <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>


    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="images/ico/ico.png">
</head>

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
                                <h3 class="text-center text-dark">Registró Médico</h3>

                                <div class="col-md-6 col-md-offset-0">
                                    <div class="form-group">
                                        <label class="control-label"><i class="fa fa-user"></i> Nombre<span style="color: red">*</span></label>
                                        <input type="text" name="nombre" required placeholder="Escribir Nombre" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6 col-md-offset-0">
                                    <div class="form-group">
                                        <label class="control-label"><i class="fa fa-user"></i> Apellido<span style="color: red">*</span></label>
                                        <input type="text" name="apellido" required placeholder="Escribir Apellido" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-offset-0">
                                    <div class="form-group">
                                        <label class="control-label"><i class="fa fa-user-circle"></i> Usuario<span style="color: red">*</span></label>
                                        <input type="text" name="userne" required placeholder="Escribir User" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6 col-md-offset-0">
                                    <div class="form-group">
                                        <label class="control-label"><i class="iconData fa fa-home "></i>Lugar de trabaja<span style="color: red">*</span></label>
                                        <input type="text" name="trabajo" required placeholder="Ej. Clinica Nombre" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-offset-0">
                                    <label class="control-label"><i class="iconData fa fa-user-md "></i> Area<span style="color: red">*</span></label>
                                    <select class="form-control" id="inputGroupSelect01" required name="area">
                                        <option value="Asistencial">Asistencial</option>
                                        <option value="Investigación">Investigación</option>
                                        <option value="Docencia">Docencia</option>
                                        <option value="Administrativa">Administrativa</option>
                                        <option value="Informativa">Informativa</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-md-offset-0">
                                    <div class="form-group">
                                        <label class="control-label"><i class="iconData fa fa-compass"></i> Cargo<span style="color: red">*</span></label>
                                        <input type="text" name="cargo" required placeholder="Ej. Medico Enterino" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-offset-0">
                                    <div class="form-group">
                                        <label class="control-label"><i class="fa fa-id-card"></i> Exequátur<span style="color: red">*</span></label>
                                        <input type="text" name="exequ" minlength="6" maxlength="6" required placeholder="Ej. 123-45" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-offset-0">
                                    <label class="control-label"><i class="iconData fa fa-graduation-cap  "></i> Especialidad<span style="color:red">*</span> </label>
                                    <select name="espec" class="form-control" required>
                                        <?php
                                        include 'php/conexion.php';
                                        $getAlumno1 = "SELECT * FROM  especialidad ORDER BY espec_descripsion ASC";
                                        $gerAlumno2 = $mysqli->query($getAlumno1);
                                        while ($row2 = mysqli_fetch_array($gerAlumno2)) {
                                            $id = $row2['id_espec'];
                                            $espe = $row2['espec_descripsion'];
                                        ?>
                                            <option value="<?php echo $id ?>"><?php echo $espe; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-12 col-md-offset-0">
                                    <div class="form-group">
                                        <label class="control-label"><i class="fa fa-envelope"></i> Email<span style="color: red">*</span></label>
                                        <input type="text" name="email" required placeholder="MiEmail@gmail.com" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-offset-0">
                                    <div class="form-group">
                                        <label class="control-label"><i class="fa fa-clock"></i> Años Ejercidos<span style="color: red">*</span></label>
                                        <input placeholder="Cantidad de años" type="number" required name="exper" class="form-control">
                                    </div>
                                </div>

                                <!--<div class="form-group">
                                    <label for="usuario" class="text-dark">Provincia</label><br>
                                    <select name="provicia" class="form-control" required="required">
                                        <option value="La Vega" selected>La Vega</option>
                                        <option value="Santiago">Santiago</option>
                                        <option value="Valverde">Valverde</option>
                                        <option value="Santiago Rodríguez">Santiago Rodríguez</option>
                                    </select>
                                </div>-->
                                <div class="col-md-6 col-md-offset-0">
                                    <div class="form-group">
                                        <label class="control-label"><i class="iconData fa fa-clock-o "></i> password<span style="color: red">*</span></label>
                                        <input type="password" name="password" id="password2" required class="form-control">
                                        <div style="margin-top:8px;">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="margin-left:20px;" type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña" />
                                            &nbsp;&nbsp;Mostrar Contraseña
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <input type="submit" value="registrate" class="btn btn-submit">
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

    <script>
        $(document).ready(function() {
            $('#mostrar_contrasena').click(function() {
                if ($('#mostrar_contrasena').is(':checked')) {
                    $('#password2').attr('type', 'text');
                } else {
                    $('#password2').attr('type', 'password');
                }
            });
        });
    </script>

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