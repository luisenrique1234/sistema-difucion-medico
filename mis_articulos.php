<?php include('php/conexion.php'); ?>

<?php


// Desactivar toda notificación de error si quieres ver los errores tienes que quitar esta linea
error_reporting(0);



/*esta fucion sirve para converti toddos los carateres como acentos en formato
uti-8 indenpedientemente de cual fuera su formato de  origen todo se convertira en 
utf-8 para que asi todos tengan el mismo formato*/
function mostrar($str)
{
    $codi = mb_detect_encoding($str, "ISO-8859-1,UTF-8");
    $str = iconv($codi, 'ISO-8859-1', $str);
    echo $str;
}

session_start();
if ($_SESSION["s_medico"] === null) {
    header("Location: ./login.php");
} else {
    if ($_SESSION["s_idRol2"] == 3) {
        header("Location: ./vistas/pag_error.php");
    }
}

$buscar = '';
$buscarestado = 'Todos';

date_default_timezone_set('America/Santo_Domingo');
$DatesantoTime = date('Y-m-d', time());
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mis Artículos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/boton.css">
    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/ico.png">

    
</head>
<!--/head-->

<body class="dark">

    <?php include_once "./php/menu_nada.php"; ?>

    <br>
    <div>
        <div>
            <div>
                <div class="card">
                    <div class="card-body">
                        <div class="fom_buscar">
                            <br>
                            <br>

                            <h3 class="col-lg-5 col-lg-offset-5 col-xs-12 col-xs-offset-0">Mis Artículos</h3>

                            <form id="form2" name="form2" method="POST" action="mis_articulos.php">

                                <div>

                                    <table class="table">
                                        <thead>
                                            <div>
                                                <div class="col-lg-3 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                                                    <!--<input type="submit" class="btn btn-info" value="Ver"  style="margin-top: 30px;">-->
                                                    <button class="btn btn-info mis_conferencia" type="sumit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </div>
                                                <div class="col-lg-6 col-lg-offset-0 col-xs-12 col-xs-offset-0 misconferencia">
                                                    <label class="form-label">Titulo del Artículo</label>


                                                    <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $buscar = $_POST["buscar"] ?>">
                                                </div>

                                                <div class="col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0  misarticulo">
                                                    <label class="control-label mesarticulo">Agregar Artículo</label>
                                                    <a class='btn btn-info' href="formulario_articulo.php" role="button"><i class="fa fa-newspaper-o tamñó"> <i class="fa fa-plus" aria-hidden="true"></i></i></a>

                                                </div>

                                                <div class=" col-lg-2 col-lg-offset-2 col-xs-12 col-xs-offset-0 fecha_mis">

                                                    <div class="label_bus"><label class="control-label">Fecha desde: </label></div>
                                                    <input type="date" id="buscafechadesde" name="buscafechadesde" class="form-control mt-2 select_bus" value="<?php echo $buscafechadesde = $_POST["buscafechadesde"]; ?>" style="border: #bababa 1px solid; color:#20558A;">
                                                </div>

                                                <div class="col-lg-2 col-lg-offset-1 col-xs-12 col-xs-offset-0 fecha_mis">

                                                    <div class="label_bus"><label class="control-label">Fecha hasta:</label></div>
                                                    <input type="date" id="buscafechahasta" name="buscafechahasta" class="form-control mt-2 select_bus" value="<?php echo $buscafechahasta = $_POST["buscafechahasta"]; ?>" style="border: #bababa 1px solid; color:#20558A;">
                                                </div>
                                                <div class="col-lg-2 col-lg-offset-0 col-xs-12 col-xs-offset-0 estadopri">

                                                    <div class="label_seleartimi"><label class="control-label">Estado:</label></div>

                                                    <select id="buscarestado" name="buscarestado" class="form-control select_bus">
                                                        <?php if ($_POST["buscarestado"] != '') { ?>
                                                            <option value="<?php echo $_POST["buscarestado"]; ?>">
                                                                <?php echo $buscarestado = $_POST["buscarestado"]; ?></option>
                                                        <?php } ?>
                                                        <option value="Todos">Todos</option>
                                                        <option value="Publico" class="icono"> Público </option>
                                                        <option value="Privado"><i class="fa fa-eye-slash"></i> Privado</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </thead>
                                    </table>
                                </div>
                                <br>
                        </div>
                        <div class="container mt-5">

                            <?php
                            /*FILTRO de busqueda////////////////////////////////////////////*/

                            if ($buscar == '' and $buscafechadesde == '' and $buscafechahasta == '' and $buscarestado == 'Todos') {
                                $filtro = "";
                            } else {
                                if ($buscar != ''  and $buscafechadesde == '' and $buscafechahasta == '' and $buscarestado == 'Todos') {
                                    $filtro = "AND (publicacion.titulo_public LIKE '%" . $buscar . "%' OR publicacion.text_public LIKE '%" . $buscar . "%' OR publicacion.contendio_pdf LIKE '%" . $buscar . "%' 
                                OR publicacion.etiqueta LIKE '%" . $buscar . "%' OR publicacion.referencia_pu LIKE '%" . $buscar . "%')";
                                }
                                //estados filtros-----------------
                                if ($buscar == ''  and $buscafechadesde == '' and $buscafechahasta == '' and $buscarestado != 'Todos') {
                                    $filtro = "AND publicacion.estado_articulo = '" . $buscarestado . "'";
                                }

                                if ($buscar == ''  and $buscafechadesde != '' and $buscafechahasta != '' and $buscarestado != 'Todos') {
                                    $filtro = " AND publicacion.estado_articulo = '" . $buscarestado . "' AND publicacion.fecha_public BETWEEN '" . $buscafechadesde . "' AND '" . $buscafechahasta . "'";
                                }

                                if ($buscar != ''  and $buscafechadesde == '' and $buscafechahasta == '' and $buscarestado != 'Todos') {
                                    $filtro = "AND publicacion.estado_articulo = '" . $buscarestado . "'AND (publicacion.titulo_public LIKE '%" . $buscar . "%' OR publicacion.text_public LIKE '%" . $buscar . "%' OR publicacion.contendio_pdf LIKE '%" . $buscar . "%' 
                                OR publicacion.etiqueta LIKE '%" . $buscar . "%' OR publicacion.referencia_pu LIKE '%" . $buscar . "%')";
                                }

                                if ($buscar != ''  and $buscafechadesde != '' and $buscafechahasta != '' and $buscarestado != 'Todos') {
                                    $filtro = " AND publicacion.estado_articulo = '" . $buscarestado . "' AND publicacion.fecha_public BETWEEN '" . $buscafechadesde . "' AND '" . $buscafechahasta . "'AND (publicacion.titulo_public LIKE '%" . $buscar . "%' 
                                OR publicacion.text_public LIKE '%" . $buscar . "%' OR publicacion.contendio_pdf LIKE '%" . $buscar . "%' 
                                OR publicacion.etiqueta LIKE '%" . $buscar . "%' OR publicacion.referencia_pu LIKE '%" . $buscar . "%')";
                                }
                                //--------------------------------------------------------------------------------------------------------------
                                if ($buscar == ''  and $buscafechadesde != '' and $buscafechahasta != '' and $buscarestado == 'Todos') {
                                    $filtro = "  AND publicacion.fecha_public BETWEEN '" . $buscafechadesde . "' AND '" . $buscafechahasta . "'";
                                }

                                if ($buscar != ''  and $buscafechadesde != '' and $buscafechahasta != '' and $buscarestado == 'Todos') {
                                    $filtro = " AND publicacion.fecha_public BETWEEN '" . $buscafechadesde . "' AND '" . $buscafechahasta . "'AND (publicacion.titulo_public LIKE '%" . $buscar . "%' 
                                OR publicacion.text_public LIKE '%" . $buscar . "%' OR publicacion.contendio_pdf LIKE '%" . $buscar . "%' 
                                OR publicacion.etiqueta LIKE '%" . $buscar . "%' OR publicacion.referencia_pu LIKE '%" . $buscar . "%')";
                                }

                                if ($buscar == ''  and $buscafechadesde != '' and $buscafechahasta == '' and $buscarestado == 'Todos') {
                                    $filtro = " AND publicacion.fecha_public BETWEEN '" . $buscafechadesde . "' AND '" . $DatesantoTime . "' ";
                                }

                                if ($buscar == ''  and $buscafechadesde != '' and $buscafechahasta == '' and $buscarestado != 'Todos') {
                                    $filtro = "AND publicacion.estado_articulo = '" . $buscarestado . "' AND publicacion.fecha_public BETWEEN '" . $buscafechadesde . "' AND '" . $DatesantoTime . "' ";
                                }

                                if ($buscar != ''  and $buscafechadesde != '' and $buscafechahasta == '' and $buscarestado == 'Todos') {
                                    $filtro = " AND publicacion.fecha_public BETWEEN '" . $buscafechadesde . "' AND '" . $DatesantoTime . "' AND (publicacion.titulo_public LIKE '%" . $buscar . "%' 
                                OR publicacion.text_public LIKE '%" . $buscar . "%' OR publicacion.contendio_pdf LIKE '%" . $buscar . "%' 
                                OR publicacion.etiqueta LIKE '%" . $buscar . "%' OR publicacion.referencia_pu LIKE '%" . $buscar . "%')";
                                }

                                if ($buscar != ''  and $buscafechadesde != '' and $buscafechahasta == '' and $buscarestado != 'Todos') {
                                    $filtro = "AND publicacion.estado_articulo = '" . $buscarestado . "' AND publicacion.fecha_public BETWEEN '" . $buscafechadesde . "' AND '" . $DatesantoTime . "' AND (publicacion.titulo_public LIKE '%" . $buscar . "%' 
                                OR publicacion.text_public LIKE '%" . $buscar . "%' OR publicacion.contendio_pdf LIKE '%" . $buscar . "%' 
                                OR publicacion.etiqueta LIKE '%" . $buscar . "%' OR publicacion.referencia_pu LIKE '%" . $buscar . "%')";
                                }

                                if ($buscar == ''  and $buscafechadesde == '' and $buscafechahasta != '' and $buscarestado == 'Todos') {
                                    $filtro = "";
                                }
                                if ($buscar != ''  and $buscafechadesde == '' and $buscafechahasta != '' and $buscarestado == 'Todos') {
                                    $filtro = "";
                                }
                                if ($buscar == ''  and $buscafechadesde == '' and $buscafechahasta != '' and $buscarestado != 'Todos') {
                                    $filtro = "";
                                }
                                if ($buscar != ''  and $buscafechadesde == '' and $buscafechahasta != '' and $buscarestado != 'Todos') {
                                    $filtro = "";
                                }
                            }
                            
                            $id_med = $_SESSION["s_idme"];
                            $sql2 = ("SELECT publicacion.id_public,publicacion.titulo_public,publicacion.text_public,publicacion.autor_pu,publicacion.link_video,publicacion.estado_articulo,
                            publicacion.link_audio,publicacion.link_archivo,DATE_FORMAT(publicacion.fecha_public,'%d/%m/%y') AS fecha,publicacion.categoria_public,publicacion.me_gusta_pu,publicacion.referencia_pu,
                            especialidad.espec_descripsion FROM publicacion,especialidad WHERE publicacion.categoria_public=especialidad.id_espec   AND publicacion.estado='A' AND publicacion.id_medico_pu='$id_med' $filtro ORDER BY publicacion.fecha_public DESC");
                            $sql = $mysqli->query($sql2);
                            $numeroSql = mysqli_num_rows($sql);

                            ?>

                            </form>

                            <div style="
                            padding : 4px;
                            height : 500px;
                            overflow : auto; ">
                                <div class="table-responsive">
                                    <p class="col-lg-10 col-lg-offset-1 col-xs-12 col-xs-offset-0" style="   color:#20558A"><i class="fa fa-area-chart" aria-hidden="true"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
                                    <table class="table">
                                        <tbody>
                                            <?php while ($rowSql = mysqli_fetch_assoc($sql)) {
                                                $autores = $rowSql['autor_pu'];
                                                $video = $rowSql['link_video'];
                                                $audio = $rowSql['link_audio'];
                                                $fecha = $rowSql['fecha'];
                                                $archivo = $rowSql['link_archivo'];
                                                $estado = $rowSql['estado_articulo'];
                                            ?>
                                                <tr class="col-lg-8 col-lg-offset-1 col-xs-12 col-xs-offset-0">
                                                    <td class="col-lg-10">
                                                        <i class="fa fa-heart" aria-hidden="true"> <?php echo $rowSql["me_gusta_pu"]; ?></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-comments"> <?php echo $rowSql["me_gusta_pu"]; ?> </i>
                                                        <br>
                                                        <h5 style="display: inline;">Titulo:</h5><?php mostrar($rowSql['titulo_public']); ?>
                                                        <br>
                                                        <h5 style="display: inline;">Resumen: </h5><?php mostrar(substr($rowSql['text_public'], 0, 200)); ?>
                                                        <h5 class="altura" style="display: inline; position: relative; top: -10px;">Autores:</h5> <?php echo "<span style='left: 56px; position:  relative; top: -29px;'>$autores</span>"; ?>
                                                        <h5 style="display: inline; position:  relative; top: -39px;">Especialidad:</h5> <?php echo "<span style='position:  relative; top: -39px;'>".$rowSql["espec_descripsion"]. "</span>";?> &nbsp;&nbsp; <h5 style="display: inline; position:  relative; top: -39px;">Publicación: </h5><?php echo"<span style='position:  relative; top: -39px;'> $fecha</span>"; ?> &nbsp;&nbsp;
                                                        <?php if ($estado == "Publico") {
                                                            echo "<h5 style='display: inline; position:  relative; top: -39px;'><i class='fa fa-eye'></i> $estado</h5>";
                                                        } else {
                                                            echo "<h5 style='display: inline; position:  relative; top: -39px;'><i class='fa fa-eye-slash'></i> $estado</h5>";
                                                        }  ?>
                                                    </td>
                                                    <?php
                                                    echo "<td style=' font-size: 49px;'> <a title='Editar Articulo' href='actualizar_articulo.php?id=" . $rowSql["id_public"] . "' class='btn btn-success' style='left: 60px; position: relative; font-size: 19px;'   role='button'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>
                                                    <td style=' font-size: 49px;'> <a title='Eliminar Artículo' onclick='return alereliminararticulo(" . $rowSql["id_public"] . ");' class='btn btn-danger' style='left: 78px; position: relative; font-size: 19px;'  role='button'><i class='fa fa-trash' aria-hidden='true'></i></i></a></td>  
                                                    <td style=' font-size: 49px;'> <a title='Ver articulo completo' target='__blank' href='ver_articulo.php?id=" . $rowSql["id_public"] . "' class='btn btn-info' style='left: 90px; position: relative; font-size: 19px;'   role='button'><i class='fa fa-external-link'></i></i></a></td>";
                                                    ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/medico_alerta.js"></script>
    <!--LUgar donde esta el ativador del modo oscuro -->
    <script type="text/javascript" src="js/temad.js"></script>
</body>

</html>