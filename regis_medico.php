<?php


/*esta fucion sirve para converti toddos los carateres como acentos en formato
uti-8 indenpedientemente de cual fuera su formato de  origen todo se convertira en 
utf-8 para que asi todos tengan el mismo formato*/
function mostrar ($str){
$codi= mb_detect_encoding($str,"ISO-8859-1,UTF-8");
            $str=iconv($codi,'utf-8',$str);
            echo $str;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Publicar</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/dark.css" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/ico.png">
</head><!--/head-->

<body class="dark">
	<header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div> 
                </div>
             </div>
        </div>
        <div class="dark1">
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.php">
                        <h1><img src="images/logo.png" alt="logo" width="100" height="100"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a  href="index.php">Inicio</a></li>
                        <li class="dropdown"><a href="#">Paginas <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="aboutus.html">About</a></li>
                                <li><a href="aboutus2.html">About 2</a></li>
                                <li><a href="service.html">Services</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                                <li><a href="contact2.html">Contact us 2</a></li>
                                <li><a href="404.html">404 error</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li>                    
                        <li class="dropdown"><a href="blog.html">Blog <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="blog.html">Blog Default</a></li>
                                <li><a href="blogtwo.html">Timeline Blog</a></li>
                                <li><a href="blogone.html">2 Columns + Right Sidebar</a></li>
                                <li><a href="blogthree.html">1 Column + Left Sidebar</a></li>
                                <li><a href="blogfour.html">Blog Masonary</a></li>
                                <li><a href="blogdetails.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="portfolio.html">Portfolio <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="portfolio.html">Portfolio Default</a></li>
                                <li><a href="portfoliofour.html">Isotope 3 Columns + Right Sidebar</a></li>
                                <li><a href="portfolioone.html">3 Columns + Right Sidebar</a></li>
                                <li><a href="portfoliotwo.html">3 Columns + Left Sidebar</a></li>
                                <li><a href="portfoliothree.html">2 Columns</a></li>
                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                            </ul>
                        </li>                         
                        <li><a href="shortcodes.html ">Inicio de sesion </a></li>                    
                    </ul>
                </div>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
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
    
    <!--/#header-->
    <!--id la imagen de triangulor que se usa para el inicio-->
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div>
                        <div class="col-sm-12">
                            <h1 class="title">Registro</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   </section>
    <!--/#action-->
    

    <section id="blog" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Noticias</h3>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="images/portfolio/project1.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on  07 March 2014</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="images/portfolio/project2.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on  07 March 2014</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="images/portfolio/project3.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                                    <p>posted on  07 March 2014</p>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-item categories">
                            <h3>Especialidades</h3>
                            <ul class="nav navbar-stacked">
                                <li><a href="#">Traumatología,<span class="pull-right">(1)</span></a></li>
                                <li class="active"><a href="#">Farmacología<span class="pull-right">(8)</span></a></li>
                                <li><a href="#">Neumología<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Infectología<span class="pull-right">(9)</span></a></li>
                                <li><a href="#">Alergología<span class="pull-right">(3)</span></a></li>
                                <li><a href="#">Medicina preventiva<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Cirugía <span class="pull-right">(2)</span></a></li>
                                <li><a href="#">Radiología <span class="pull-right">(8)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-7">
              

                    
                            <div class="col-md-12 col-sm-12">
                            
                                <div class="post-thumb">
                                <div class="panel-dafault" style="margin-top: 12px" > <!--panel de crear -->
         <div class="panel-heading">  
  	   
  	     
		   <form action="php/alumno_registro.php?accion=INS" method="POST">
  	     	 	<div class="row">
                    <div class="wow fadeInDown">
  	     	 		<div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-4 col-lg-offset-1 col-xs-12 col-xs-offset-0">
  	     	 		 	<div class="form-group" class="alert alert-danger" role="alert">
  	     	 		 		<label class="control-label">Nombre<span style="color: turquoise">*</span></label>
  	     	 		 		<input type="text" name="nombre" required="required" placeholder="Nombre" class="form-control">
  	     	 		 	</div>
						 </div>
                         
                            
                         
                         <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-lg-4 col-lg-offset-0 col-xs-12 col-xs-offset-0">
                         <label class="control-label">Apellido<span style="color: turquoise">*</span></label>
						 <div class="form-group">
                         <input type="text" name="nombre" required="required" placeholder="Apellido" class="form-control">
                            </div> 
                         </div>
                         
					
  	     	 	<!-- parte que ocupada la pantalla completa -->
  	     	 	
  	     	 		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-1 col-xs-12 col-xs-offset-0">
  	     	 			<div class="form-group">
                                <br>
                                <input type="submit" value="Registrar" class="btn btn-submit">
                                <br>
                                <br>	
                                <a href="index.php" class="btn btn-danger">Cancelar</a>
  	     	 			</div>
  	     	 		</div>
  	     	 	
  	     	 </form>
  	     </div>
         </div> 
         </div>
                                    
                
                
                        
                    
                 </div>
            </div>
        </div>
    </section>
    <!--/#blog-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                <div class="col-sm-12">
                    <div class=" copyright-text text-center ">
                        <p>Red medica 2021. Todos los derechos reservados.</p>
                        <p>Diseñado por <a target="_blank" href="http://luis-enrique.com">Sr.LEGG</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script> 
    <script type="text/javascript" src="js/temad.js"></script> 
</body>
</html>
