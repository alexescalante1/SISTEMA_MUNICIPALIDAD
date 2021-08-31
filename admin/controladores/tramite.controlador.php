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
	
	
	/*=============================================
	CREAR DOCUMENTO
	=============================================*/

	static public function ctrCrearDoc($datos){

		$respuesta = ModeloTramite::mdlIngresarDoc("documentos", $datos);

		if($respuesta){

			$dat = array(
				"respuesta"=>"",
				"idGerencia"=>$datos["idGerencia"],				
				"idDocumento"=>$respuesta[0]
			);
			$resp = ModeloTramite::mdlIngresarDeriva("derivaciones", $dat);
			
			$Len = strlen($respuesta[0]);
			if($Len==2){
				$Len = "000000";
			}else if($Len==3){
				$Len = "00000";
			}else if($Len==4){
				$Len = "0000";
			}else if($Len==5){
				$Len = "000";
			}else if($Len==6){
				$Len = "00";
			}else if($Len==7){
				$Len = "0";
			}else{
				$Len = "";
			}

			$CODET = date("Y").$Len.$respuesta[0];
			
			ModeloTramite::mdlActualizar("documentos", "codigo", $CODET, "idDocumentos", $respuesta[0]);
			
			return $CODET;
			
		}else{
			return "error";	
		}


	}

	/*=============================================
	CREAR DOCUMENTO
	=============================================*/

	static public function ctrAddArchivo($datos){

		move_uploaded_file($datos["archivo"]["tmp_name"], "../vistas/img/archivos/".$datos["codigo"].".pdf");

		$RS = ModeloTramite::mdlActualizar("documentos", "archivo", "vistas/img/archivos/".$datos["codigo"].".pdf", "codigo", $datos["codigo"]);
		
		return $RS;

	}
}