<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>preba de tiempo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <div id="pruebarecarga"> </div>
<?php echo rand(1,400) ?>

    <script type="text/javascript">
    $(document).ready(function(){
        setInterval(
            function(){
            $('#pruebarecarga').load('prueba_.php');
            },2000
        );

    });

    </script>
    
    
</body>
</html>