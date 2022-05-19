<header id="header">
        <div>
            <div class="navbar" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="../admin_bien.php">
                            <img src="../images/admin-logo.png" alt="logo" width="45" height="45">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="text-muted" href="/medico-red/contador/index.php">Inicio</a></li>
                            <li class="dropdown"><a class="text-muted" href="/medico-red/mantenimiento/mante_medico.php">Lista de Medico<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/medico-red/mantenimiento/mante_medico.php">Lista de médico</a></li>
                                    <li><a href="/medico-red/mantenimiento/desativado_medico.php">lista desactivado médico</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="text-muted" href="/medico-red/mantenimiento/mante_public.php">Lista de Artículos<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/medico-red/mantenimiento/mante_public.php">Lista de Artículos</a></li>
                                    <li><a href="/medico-red/mantenimiento/desativado_public.php">Lista desctivado de Articulos</a></li>
                                    <li><a href="/medico-red/mantenimiento/mante_comentario.php">Comentario de Artículo</a></li>
                                    <li><a href="/medico-red/mantenimiento/desativado_comen.php">Lista desctivado de comentario</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="text-muted" href="/medico-red/mantenimiento/mante_confe.php">Lista  Conferencia<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                <li><a href="/medico-red/mantenimiento/mante_confe.php">Lista Conferencia</a></li>
                                    <li><a href="/medico-red/mantenimiento/desacti_confe.php">Lista desactivado Conferencia</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="text-muted" href="/medico-red/mantenimiento/mante_rol.php">Roles<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                <li><a href="/medico-red/mantenimiento/mante_rol.php">Lista de Roles médico</a></li>
                                <li><a href="/medico-red/mantenimiento/desactivado_rol.php">Lista de Roles médico desactivado</a></li>
                                <li><a href="/medico-red/mantenimiento/mante_espec.php">Especialidades médicos</a></li>
                                <li><a href="/medico-red/mantenimiento/desactivado_espec.php">Especialidades médicas desactivada</a> </li>
                                </ul>
                            </li>
                            <li>
                                <!-- <div >
                            <img src="images/predeterminado.jpg" width="100%" height="60">
                            </div>-->
                                <a href="/medico-red/perfiladmin/pefil_admin.php" class="btn btn-info"><?php echo $_SESSION["s_admin"]; ?>. .<i class="fa fa-user"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/medico-red/perfiladmin/pefil_admin.php">Mi perfil</a></li>
                                    <li><a href="/medico-red/mantenimiento/mante_admin.php">Administradores </a></li>
                                    <li><a  onclick="return alertaactivar();">Cerrar sesion</a></li>
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
    </header>