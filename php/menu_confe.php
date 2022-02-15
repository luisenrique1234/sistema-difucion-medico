<?php //error_reporting(0);?>
<header id="header">
        <div>
        <div class="dark1">
            <div class="navbar" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">
                            <img src="images/logo.png" alt="logo" width="70" height="70">
                        </a>

                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="index.php">Inicio</a></li>
                            <li class="dropdown"><a href="articulo_cien.php">Articulos</a>
                            </li>
                            <li class="dropdown"><a style="border-radius: 10px;" class="btn btn-info" href="conferencia_me.php">Conferencia</a>
                            </li>
                            <?php 
                            include ('conexion.php');
                            $id_me=$_SESSION["s_idme"];
                            $sql2=("SELECT conferencia.titulo_confe,conferencia.etapa_confe,conferencia.link_confe FROM conferencia,medico,recordatorio WHERE conferencia.id_confe=recordatorio.id_confererec 
                            AND medico.id_medico=recordatorio.id_medicorec AND recordatorio.id_medicorec='$id_me' AND conferencia.etapa_confe='Programada' ");
                                    $sql= $mysqli->query($sql2);
                                        $numeroSql = mysqli_num_rows($sql);
                            
                            
                            ?>
                            
                            <li class="dropdown"><a href="cirugia_general.php"><i class="fa fa-calendar-plus-o campana" aria-hidden="true"><small style="border-radius: 30px; color: white; background-color: #ef0000 ">+<?php echo"<small>$numeroSql</small>"; ?>&nbsp</small></i></a>
                                        
                                        
                                <ul role="menu" class="sub-menu">
                                <?php 
                                        while ($rowSql = mysqli_fetch_assoc($sql)){ 
                                        $titulo2=$rowSql["titulo_confe"];
                                        $etapa2=$rowSql["etapa_confe"];
                                        $link_confe=$rowSql["link_confe"];
                                        
                                    echo"<li> <a href='$link_confe'>$titulo2</a></li>";
                                     } ?>
                                </ul>
                                
                            </li>
                            
                                
                        <li>
                           <!-- <div >
                            <img src="images/predeterminado.jpg" width="100%" height="60">
                            </div>-->
                                <a href="pefil_medico.php"> <i class="fa fa-user-circle icouser" aria-hidden="true"></i>&nbsp; &nbsp;<?php  echo $_SESSION["s_medico"];?>&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                <ul role="menu" class="sub-menu">
                                <li><a href="pefil_medico.php">Editar mi perfil</a></li>
                                    <li><a href="lista_publicm.php">Mis investigaciones</a></li>
                                    <li><a href="mis_conferencia.php">Mis Conferencia</a></li>
                                    <li><a  onclick="return alercerrarme();">Cerrar sesión</a></li>
                                </ul>
                                 
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="search">
                    <!--<form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Buscar">
                        </div>
                    </form>-->
                    <div class="social-icons search">
                        <div class="oscuro">
                            <div class="modo" id="modo">
                                <i class="fa fa-adjust" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div id="pruebarecarga"></div>

    </header>
    <script>
$(document).ready(function() {
      var refreshId =  setInterval( function(){
    $('#pruebarecarga').load('php/refrecar_conferecia.php');
   }, 8000 );
});

</script>