<?php

$mysqli = new mysqli("localhost","root","","red_medica");

if( $mysqli -> connect_errno){

    echo "Erro en la conexion";
}else {
    echo "";
}

?>
