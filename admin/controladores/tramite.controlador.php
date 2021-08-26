<?php

class ControladorTramite{

	/*=============================================
	MOSTRAR GENERAL
	=============================================*/
	
	static public function ctrMostrar($tabla, $item, $valor){

		$respuesta = ModeloTramite::mdlMostrar($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR REMITENTE
	=============================================*/

	static public function ctrCrearRemitente($datos){

		$respuesta = ModeloTramite::mdlIngresarRemitente("remitente", $datos);

		return $respuesta;

	}
	
}