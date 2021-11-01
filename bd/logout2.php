<?php
session_start();
unset($_SESSION["s_admin"]);
unset($_SESSION["s_idRol3"]);
unset($_SESSION["s_rol_descripcion3"]);
//session_destroy();
header("Location: ../admin_login.php");
?>