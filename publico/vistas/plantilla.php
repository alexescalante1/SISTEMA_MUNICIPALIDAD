<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  	<?php

		session_start();

		$servidor = Ruta::ctrRutaServidor();

		$plantilla = ControladorPlantilla::ctrEstiloPlantilla();

		echo '<link rel="icon" href="'.$servidor.$plantilla["icono"].'">';

		/*=============================================
		MANTENER LA RUTA FIJA DEL PROYECTO
		=============================================*/

		$url = Ruta::ctrRuta();

		/*=============================================
		MARCADO DE CABECERA
		=============================================*/

		$rutas = array();

		if(isset($_GET["ruta"])){

			$rutas = explode("/", $_GET["ruta"]);

			$ruta = $rutas[0];

		}else{

			$ruta = "inicio";

		}

	?>

  <title>MUNICIPALIDAD</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo $url; ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo $url; ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo $url; ?>vistas/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>vistas/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo $url; ?>vistas/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo $url; ?>vistas/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo $url; ?>vistas/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>vistas/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo $url; ?>vistas/assets/css/style.css" rel="stylesheet">



  <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/flexslider.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/dscountdown.css">



	<!--=====================================
	PLUGINS DE JAVASCRIPT
	======================================-->

	<script src="<?php echo $url; ?>vistas/js/plugins/Chart.js"></script>
	
	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>


	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.scrollUp.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.flexslider.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/md5-min.js"></script>
	
	<script src="<?php echo $url; ?>vistas/js/plugins/dscountdown.min.js"></script>
		
	<script src="<?php echo $url; ?>vistas/js/plugins/knob.jquery.js"></script>
  <!-- =======================================================
  * Template Name: FlexStart - v1.4.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="inicio" class="logo d-flex align-items-center">
        <img src="<?php echo $url; ?>vistas/assets/img/logo.png" alt="">
        <span>FlexStart</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        
		
		
		<i class="bi bi-list mobile-nav-toggle"></i>



      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <?php



if(isset($_SESSION["validarSesionUSERSIUNAP"]) && $_SESSION["validarSesionUSERSIUNAP"] === "ok"){




/*=============================================
CABEZOTE
=============================================*/

//include "modulos/cabezote.php";

/*=============================================
CONTENIDO DINÁMICO
=============================================*/

$rutas = array();
$ruta = null;
$infoArticulos = null;

if(isset($_GET["ruta"])){

	$rutas = explode("/", $_GET["ruta"]);

	$item = "ruta";
	$valor =  $rutas[0];

	/*=============================================
	URL'S AMIGABLES DE CATEGORÍAS
	=============================================*/

	$rutaCategorias = ControladorArticulos::ctrMostrarCategorias($item, $valor);

	if($rutas[0] == $rutaCategorias["ruta"]){

		$ruta = $rutas[0];

	}

	/*=============================================
	URL'S AMIGABLES DE ARTICULOS
	=============================================*/

	$rutaArticulos = ControladorArticulos::ctrMostrarInfoArticulo($item, $valor);
	
	if($rutas[0] == $rutaArticulos["ruta"]){

		$infoArticulos = $rutas[0];

	}

	/*=============================================
	LISTA BLANCA DE URL'S AMIGABLES
	=============================================*/

	if($ruta != null || $rutas[0] == "mas-destacados"){

		include "modulos/intemBuscadorSecundario.php";
		include "modulos/productosM.php";

	}else if($infoArticulos != null){
		
		include "modulos/intemBuscadorSecundario.php";
		include "modulos/infoproductoM.php";

	}else if($rutas[0] == "verificar" || $rutas[0] == "salir" || $rutas[0] == "perfil" || $rutas[0] == "error"){

		include "modulos/".$rutas[0].".php";

	}else if($rutas[0] == "buscador"){
		
		include "modulos/intemBuscadorSecundario.php";
		include "modulos/buscador.php";

	}else if($rutas[0] == "inicio"){

		//include "modulos/intemBuscadorPrincipal.php";
		//include "modulos/destacadosM.php";

	}else{

		include "modulos/error404.php";

	}

}else{

	//include "modulos/intemBuscadorPrincipal.php";
	//include "modulos/destacadosM.php";

}

/*include "modulos/footer.php";*/


echo '<input type="hidden" value="'.$url.'" id="rutaOculta">';


}else{

	//include "modulos/login.php";
  
}

?>

  <main id="main">


  	<?php 



		include ("modulos2/portada.php");
		include ("modulos2/contador.php");
		include ("modulos2/blog.php");
		include ("modulos/noticias.php");

		include ("modulos2/publicaciones.php");
		include ("modulos2/team.php");
	?>






















  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="<?php echo $url; ?>vistas/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="<?php echo $url; ?>vistas/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo $url; ?>vistas/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo $url; ?>vistas/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo $url; ?>vistas/assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo $url; ?>vistas/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo $url; ?>vistas/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <!-- Template Main JS File -->
  <script src="<?php echo $url; ?>vistas/assets/js/main.js"></script>

  	<script src="<?php echo $url; ?>vistas/js/cabezote.js"></script>
	<script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
	<script src="<?php echo $url; ?>vistas/js/buscador.js"></script>
	<script src="<?php echo $url; ?>vistas/js/infoproducto.js"></script>
	<script src="<?php echo $url; ?>vistas/js/usuarios.js"></script>
	<script src="<?php echo $url; ?>vistas/js/notificacion.js"></script>
	<script src="<?php echo $url; ?>vistas/js/visitas.js"></script>
</body>

</html>