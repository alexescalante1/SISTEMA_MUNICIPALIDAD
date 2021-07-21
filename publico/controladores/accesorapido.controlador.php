<?php

Class ControladorAccesoRapido{

	/*=============================================
	MOSTRAR ACCESO RAPIDO
	=============================================*/

	static public function ctrMostrarAccesoRapido(){

		$tabla = "categoria";

		$respuesta = ModeloAccesoRapido::mdlMostrarAccesoRapido($tabla);

		return $respuesta;

	}

	static public function ctrActualizarAccesoRapido($item1, $valor1, $item2, $valor2){

		$tabla = "accesorapido";

		$respuesta = ModeloAccesoRapido::mdlActualizarAccesoRapido($tabla, $item1, $valor1, $item2, $valor2);

		return $respuesta;
	}

}