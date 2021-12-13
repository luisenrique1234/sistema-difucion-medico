<?php

$numero=0;

if (isset($_POST["numero"])) {

    $numero=(int)$_POST["numero"];

}

 

if (isset($_POST['sumar']))

{

	$numero++;

} elseif (isset($_POST['restar'])) {

	$numero--;

}

?>

<!DOCTYPE html>

<html>

<head>

	<title>Page Title</title>

	<meta charset="utf-8">

 

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

 

</head>

<body>

 

<p>El numero actual es el <?php echo $numero?></p>

 

<form name = "submit" action = "contador.php" method = "POST">

    <input type="hidden" name="numero" value="<?php echo $numero?>">

Sumar <input type = "submit" name = "sumar" value = "sumar"><br>

Restar <input type = "submit" name = "restar" value = "restar">

</form>

 

</body>

 

</html>