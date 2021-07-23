<?php

class ControladorGeneral{

	static public function ctrMostrar($tabla, $ordenar, $item, $valor, $base, $tope, $modo){

		$respuesta = ModeloGeneral::mdlMostrar($tabla, $ordenar, $item, $valor, $base, $tope, $modo);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR
	=============================================*/

	static public function ctrMostrarInfo($tabla, $item, $valor){

		$respuesta = ModeloGeneral::mdlMostrarInfo($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	LISTAR
	=============================================*/

	static public function ctrListar($tabla, $item, $valor){

		$respuesta = ModeloGeneral::mdlListar($tabla, $item, $valor);

		return $respuesta[0];

	}

	/*=============================================
	BUSCADOR
	=============================================*/

	static public function ctrBuscar($tabla, $busqueda, $ordenar, $modo, $base, $tope){

		$respuesta = ModeloGeneral::mdlBuscar($tabla, $busqueda, $ordenar, $modo, $base, $tope);

		return $respuesta;

	}

	/*=============================================
	LISTAR BUSCADOR
	=============================================*/

	static public function ctrListarBusqueda($tabla, $busqueda){

		$respuesta = ModeloGeneral::mdlListarBusqueda($tabla, $busqueda);

		return $respuesta[0];

	}


	/*=============================================
	ACTUALIZAR VISTA
	=============================================*/

	static public function ctrActualizar($tabla, $item1, $valor1, $item2, $valor2){

		$respuesta = ModeloGeneral::mdlActualizar($tabla, $item1, $valor1, $item2, $valor2);

		return $respuesta;
	}

	/*=============================================
	CONT
	=============================================*/

	static public function ctrContar($tabla, $item, $valor, $item2, $valor2){

		$respuesta = ModeloGeneral::mdlContar($tabla, $item, $valor, $item2, $valor2);

		return $respuesta;
	
	}

}