<?php

require_once "../controladores/tramite.controlador.php";
require_once "../modelos/tramite.modelo.php";

class AjaxTramite{

	/*=============================================
	GUARDAR REMITENTE
	=============================================*/	

	public $DTS = array();

	public function  ajaxCrearRemitente(){

		$datos = array(
			"tipopersona"=>$this->DTS[1],
			"tipoDoc"=>$this->DTS[2],				
			"numDoc"=>$this->DTS[3],
			"nombre"=>$this->DTS[4],
			"direccion"=>$this->DTS[5],
			"email"=>$this->DTS[6],
			"telefono"=>$this->DTS[7],
			"fax"=>$this->DTS[8],
			"departamento"=>$this->DTS[9],
			"provincia"=>$this->DTS[10],
			"distrito"=>$this->DTS[11],
			"representante"=>$this->DTS[12],
			"estado"=>"1"
		);

		$respuesta = ControladorTramite::ctrCrearRemitente($datos);

		echo $respuesta;

	}

	/*=============================================
	VALIDAR NO REPETIR
	=============================================*/	

	public function ajaxValidarRemitente(){

		$tabla = "remitente";
		$item = "numDoc";
		$valor = $this->DTS[1];
		$respuesta = ControladorTramite::ctrMostrar($tabla,$item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ADD ARCHIVO
	=============================================*/	

	public function ajaxAddArchivo(){

		$datos = array(
			"codigo"=>$this->DTS[1],
			"archivo"=>$this->DTS[2]
		);

		$respuesta = ControladorTramite::ctrAddArchivo($datos);

		echo $respuesta;

	}


	public function  ajaxCrearDocumento(){

		$datos = array(
			"idAdmin"=>$this->DTS[1],
			"idRemitente"=>$this->DTS[2],				
			"tipodoc"=>$this->DTS[3],
			"numdoc"=>$this->DTS[4],
			"asunto"=>$this->DTS[5],
			"clase"=>$this->DTS[6],
			"procedimiento"=>"",
			"referencia"=>$this->DTS[7],
			"idGerencia"=>$this->DTS[8],
			"obserbaciones"=>$this->DTS[9],
			"requicitos"=>$this->DTS[10],
			"tiempoRespuesta"=>$this->DTS[11],
			"folios"=>$this->DTS[12],
			"estado"=>"1",
			"archivo"=>"",
			"modo"=>$this->DTS[14]
		);

		$respuesta = ControladorTramite::ctrCrearDoc($datos);

		echo $respuesta;

	}

	public function ajaxTraerDoc(){

		$respuesta = ModeloTramite::mdlMostrarDoc("documentos", "idDocumentos", $this->DTS[1]);

		echo json_encode($respuesta);

	}

	public function ajaxMostrar(){

		$respuesta = ModeloTramite::mdlMostrarDoc("documentos", $this->DTS[1], $this->DTS[2]);

		echo json_encode($respuesta);

	}

	public function ajaxViewBdj(){

		$respuesta = ModeloTramite::mdlListarSeg("documentos", $this->DTS[1]);

		echo $respuesta[0];

	}

	public function ajaxViewSeg(){

		$respuesta = ModeloTramite::mdlMostrarSeg("documentos", $this->DTS[1], "idDocumentos", $this->DTS[2], $this->DTS[3], $this->DTS[4]);

		echo json_encode($respuesta);

	}

}

if(isset($_POST["Rtipopersona"])){

	$ingReg = new AjaxTramite();
	$ingReg -> DTS[1] = $_POST["Rtipopersona"];
	$ingReg -> DTS[2] = $_POST["Rtipodoc"];
	$ingReg -> DTS[3] = $_POST["Rndoc"];
	$ingReg -> DTS[4] = $_POST["Rnombre"];
	$ingReg -> DTS[5] = $_POST["Rdireccion"];
	$ingReg -> DTS[6] = $_POST["Remail"];
	$ingReg -> DTS[7] = $_POST["Rtelefono"];
	$ingReg -> DTS[8] = $_POST["Rfax"];
	$ingReg -> DTS[9] = $_POST["RDepartamento"];
	$ingReg -> DTS[10] = $_POST["RProvincia"];
	$ingReg -> DTS[11] = $_POST["RDistrito"];
	$ingReg -> DTS[12] = $_POST["Rrepresentante"];

	$ingReg -> ajaxCrearRemitente();

}


if(isset($_POST["REGDOCIDADMIN"])){

	$ingReg = new AjaxTramite();
	$ingReg -> DTS[1] = $_POST["REGDOCIDADMIN"];
	$ingReg -> DTS[2] = $_POST["IDREMITENTE"];
	$ingReg -> DTS[3] = $_POST["tipoDoc"];
	$ingReg -> DTS[4] = $_POST["numDoc"];
	$ingReg -> DTS[5] = $_POST["asuntoDoc"];
	$ingReg -> DTS[6] = $_POST["claseDoc"];
	$ingReg -> DTS[7] = $_POST["referenciaDoc"];
	$ingReg -> DTS[8] = $_POST["oficinaDoc"];
	$ingReg -> DTS[9] = $_POST["observacionesDoc"];
	$ingReg -> DTS[10] = $_POST["requicitosDoc"];
	$ingReg -> DTS[11] = $_POST["tiempoResDoc"];
	$ingReg -> DTS[12] = $_POST["foliosDoc"];

	if(isset($_FILES["archivo"])){
		$ingReg -> DTS[13] = $_FILES["archivo"];
	}else{
		$ingReg -> DTS[13] = null;
	}
	$ingReg -> DTS[14] = $_POST["modoDoc"];
	
	$ingReg -> ajaxCrearDocumento();

}
/*=============================================
ADJUNTAR ARCHIVO
=============================================*/

if(isset($_POST["CODDOCUMENTO"])){

	$VLr = new AjaxTramite();
	$VLr -> DTS[1] = $_POST["CODDOCUMENTO"];
	if(isset($_FILES["archivo"])){
		$VLr -> DTS[2] = $_FILES["archivo"];
	}else{
		$VLr -> DTS[2] = null;
	}

	$VLr -> ajaxAddArchivo();

}
/*=============================================
VALIDAR NO REPETIR REMITENTE
=============================================*/

if(isset($_POST["validarRemitente"])){

	$VLr = new AjaxTramite();
	$VLr -> DTS[1] = $_POST["validarRemitente"];
	$VLr -> ajaxValidarRemitente();

}


if(isset($_POST["idDocumentos"])){

	$VLr = new AjaxTramite();
	$VLr -> DTS[1] = $_POST["idDocumentos"];
	$VLr -> ajaxTraerDoc();

}

if(isset($_POST["itemBusc"])){

	$VLr = new AjaxTramite();
	$VLr -> DTS[1] = $_POST["itemBusc"];
	$VLr -> DTS[2] = $_POST["valor"];
	$VLr -> ajaxMostrar();
	
}


if(isset($_POST["viewBdj"])){

	$VLr = new AjaxTramite();
	$VLr -> DTS[1] = $_POST["viewBdj"];
	$VLr -> ajaxViewBdj();
	
}

if(isset($_POST["viewSeg"])){

	$VLr = new AjaxTramite();
	$VLr -> DTS[1] = $_POST["viewSeg"];
	$VLr -> DTS[2] = $_POST["modo"];
	$VLr -> DTS[3] = $_POST["base"];
	$VLr -> DTS[4] = $_POST["tope"];
	$VLr -> ajaxViewSeg();
	
}
