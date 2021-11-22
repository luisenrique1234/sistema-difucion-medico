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
                            <li class="dropdown"><a href="conferencia_me.php">Investigaciones<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="aboutus.html">Enbarosos</a></li>
                                    <li><a href="aboutus2.html">Maltrato infantil</a></li>
                                    <li><a href="service.html">Salud infantil</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a style="border-radius: 75px;" class="btn btn-info" href="Cardiologia.php">Conferencia</a>
                                <!--<ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Ataques al corazon</a></li>
                                    <li><a href="blogtwo.html">Arritmia cardiaca</a></li>
                                    <li><a href="blogone.html">Taquicardia</a></li>
                                </ul>-->
                            </li>

                            <li class="dropdown"><a href="cirugia_general.php"><i class="fa fa-bell campana" aria-hidden="true"><span style=" color: #ef0000;">⁺³</span></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Anestecia</a></li>
                                    <li><a href="#">Anestecia Local</a></li>
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
    </header>