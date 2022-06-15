<header id="header">
        <div>
        <div class="dark1">
            <div class="navbar" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">
                            <img style="position: relative; top: -6px;" src="images/logo.png" alt="logo" width="45" height="45">
                        </a>

                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a style="border-radius: 10px;" class="btn btn-default" href="index.php">Inicio</a></li>
                            <li class="dropdown"><a  class="text-muted" href="articulo_cien.php">Artículos</a>
                            </li>
                            <li class="dropdown"><a class="text-muted"   href="conferencia_me.php">Conferencia</a>
                            </li>
                            <?php 
                            include ('conexion.php');
                            $id_me=$_SESSION["s_idme"];
                            $sql2=("SELECT conferencia.titulo_confe,conferencia.etapa_confe,conferencia.link_confe FROM conferencia,medico,recordatorio WHERE conferencia.id_confe=recordatorio.id_confererec 
                            AND medico.id_medico=recordatorio.id_medicorec AND recordatorio.id_medicorec='$id_me' AND conferencia.etapa_confe='Programada' ");
                                    $sql= $mysqli->query($sql2);
                                        $numeroSql = mysqli_num_rows($sql);
                            
                            
                            ?>
                            
                            <li class="dropdown"><a  class="text-muted" href="#"><i class="fa fa-calendar-plus-o campana" aria-hidden="true"><small style="border-radius: 30px; color: white; background-color: #ef0000 ">+<?php echo"<small>$numeroSql</small>"; ?>&nbsp</small></i></a>
                                        
                                        
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
                            <a class="text-muted" href="/medico-red/perfilmedico/pefil_medico.php"> <?php $backslash='\\'; echo  '<img style="border-radius: 30px; position: relative; top: -5px;" src="'.$backslash.'medico-red'.$backslash.'php'.$backslash.'imagenes-perfil'.$backslash.''.$_SESSION["s_foto"]. '" alt="" width="24" height="24"/>'; ?> &nbsp;<?php  echo $_SESSION["s_medico"];?>&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                <ul role="menu" class="sub-menu">
                                <li><a href="/medico-red/perfilmedico/pefil_medico.php">Editar mi perfil</a></li>
                                    <li><a href="mis_articulos.php">Mis Artículos</a></li>
                                    <li><a href="mis_conferencia.php">Mis Conferencias</a></li>
                                    <li><a href="/medico-red/graficos/articulo_grafico.php">Gráficos Artículos</a></li>
                                    <li><a href="/medico-red/graficos/conferencia_graficos.php">Gráficos Conferencia</a></li>
                                    <li><a  onclick="return alercerrarme();">Cerrar sesión</a></li>
                                </ul>
                                 
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="search">
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