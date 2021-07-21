<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

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

	<!--=====================================
	Marcado HTML5
	======================================-->

	<meta name="title" content="SISTEMA DE INVENTARIO">

	<meta name="description" content="Inventario">

	<meta name="keyword" content="Inventario">

	<title>SI-EPIE ESTUDIANTE</title>

	<!--=====================================
	PLUGINS DE CSS
	======================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/flexslider.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/sweetalert.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/dscountdown.css">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">

	<!--=====================================
	HOJAS DE ESTILO PERSONALIZADAS
	======================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/cabezote.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/productos.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/infoproducto.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/perfil.css">

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/footer.css">

	<!--=====================================
	PLUGINS DE JAVASCRIPT
	======================================-->

	<script src="<?php echo $url; ?>vistas/js/plugins/Chart.js"></script>
	
	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.scrollUp.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.flexslider.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/sweetalert.min.js"></script>

	<script src="<?php echo $url; ?>vistas/js/plugins/md5-min.js"></script>
	
	<script src="<?php echo $url; ?>vistas/js/plugins/dscountdown.min.js"></script>
		
	<script src="<?php echo $url; ?>vistas/js/plugins/knob.jquery.js"></script>
	

	<?php 

		/* 
		
		
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		
		*/

	?>

</head>

<body>

<?php


if(isset($_SESSION["validarSesionUSERSIUNAP"]) && $_SESSION["validarSesionUSERSIUNAP"] === "ok"){




/*=============================================
CABEZOTE
=============================================*/

include "modulos/cabezote.php";

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

		include "modulos/intemBuscadorPrincipal.php";
		include "modulos/destacadosM.php";

	}else{

		include "modulos/error404.php";

	}

}else{

	include "modulos/intemBuscadorPrincipal.php";
	include "modulos/destacadosM.php";

}

/*include "modulos/footer.php";*/


echo '<input type="hidden" value="'.$url.'" id="rutaOculta">
<script src="'.$url.'vistas/js/cabezote.js"></script>
<script src="'.$url.'vistas/js/plantilla.js"></script>
<script src="'.$url.'vistas/js/buscador.js"></script>
<script src="'.$url.'vistas/js/infoproducto.js"></script>
<script src="'.$url.'vistas/js/usuarios.js"></script>
<script src="'.$url.'vistas/js/notificacion.js"></script>
<script src="'.$url.'vistas/js/visitas.js"></script>';


}else{

	include "modulos/login.php";
  
}

?>

</body>
</html>