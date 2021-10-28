<?php
session_start();
unset($_SESSION["s_medico"]);
unset($_SESSION["s_idRol2"]);
unset($_SESSION["s_rol_descripcion2"]);
session_destroy();
header("Location: ../login.php");
?>