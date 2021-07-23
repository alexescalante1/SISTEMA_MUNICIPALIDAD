<?php

class ControladorArticulos{

	/*=============================================
	MOSTRAR CATEGORÍAS
	=============================================*/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categoria";

		$respuesta = ModeloArticulos::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR ARTICULOS
	=============================================*/

	static public function ctrMostrarArticulos($ordenar, $item, $valor, $base, $tope, $modo){

		$tabla = "detallearticulo";

		$respuesta = ModeloArticulos::mdlMostrarArticulos($tabla, $ordenar, $item, $valor, $base, $tope, $modo);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR INFOARTICULOS
	=============================================*/

	static public function ctrMostrarInfoArticulo($item, $valor){

		$tabla = "detallearticulo";

		$respuesta = ModeloArticulos::mdlMostrarInfoArticulo($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	LISTAR PRODUCTOS
	=============================================*/

	static public function ctrListarArticulos($ordenar, $item, $valor){

		$tabla = "detallearticulo";

		$respuesta = ModeloArticulos::mdlListarArticulos($tabla, $ordenar, $item, $valor);

		return $respuesta;

	}



	/*=============================================
	MOSTRAR BANNER
	=============================================*/
/*
	static public function ctrMostrarBanner($ruta){

		$tabla = "banner";

		$respuesta = ModeloProductos::mdlMostrarBanner($tabla, $ruta);

		return $respuesta;

	}
*/
	/*=============================================
	BUSCADOR
	=============================================*/

	static public function ctrBuscarArticulos($busqueda, $ordenar, $modo, $base, $tope){

		$tabla = "detallearticulo";

		$respuesta = ModeloArticulos::mdlBuscarArticulos($tabla, $busqueda, $ordenar, $modo, $base, $tope);

		return $respuesta;

	}

	/*=============================================
	LISTAR PRODUCTOS BUSCADOR
	=============================================*/

	static public function ctrListarArticulosBusqueda($busqueda){

		$tabla = "detallearticulo";

		$respuesta = ModeloArticulos::mdlListarArticulosBusqueda($tabla, $busqueda);

		return $respuesta;

	}












	/*=============================================
	ACTUALIZAR VISTA PRODUCTO
	=============================================*/

	static public function ctrActualizarProducto($item1, $valor1, $item2, $valor2){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2);

		return $respuesta;
	}


















	/*=============================================
	CONT CODIGOS
	=============================================*/

	static public function ctrContarCodArticulos($item, $valor, $item2, $valor2){

		$tabla = "articulos";

		$respuesta = ModeloArticulos::mdlContarCodArticulos($tabla, $item, $valor, $item2, $valor2);

		return $respuesta;
	
	}

}