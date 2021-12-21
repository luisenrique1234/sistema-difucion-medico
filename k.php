<?php

$numero=0;

if (isset($_POST['sumar']))

{

	$numero++;

	echo $numero;

}

else

{

	$numero-1;

	echo $numero;

}

?>