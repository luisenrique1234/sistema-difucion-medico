<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../codigo.js"></script>
</head>
<?php 

header("Refresh: 2; URL= ../conferencia_me.php");
    echo '
<script type="text/javascript">


$(document).ready(function(){

	Swal.fire({
        icon: "error",
        title: "Esta conferencia ya ha terminado"
      })
});


</script>

' ;
?>