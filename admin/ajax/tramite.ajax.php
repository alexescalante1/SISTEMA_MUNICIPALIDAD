<?php

require_once "../controladores/tramite.controlador.php";
require_once "../modelos/tramite.modelo.php";

class AjaxTramite{

	/*=============================================
	GUARDAR REMITENTE
	=============================================*/	
	public $id;

	public $Rtipopersona;
	public $Rtipodoc;
	public $Rndoc;
	public $Rnombre;
	public $Rdireccion;
	public $Remail;
	public $Rtelefono;
	public $Rfax;
	public $RDepartamento;
	public $RProvincia;
	public $RDistrito;
	public $Rrepresentante;

	public function  ajaxCrearRemitente(){

		$datos = array(
			"tipopersona"=>$this->Rtipopersona,
			"tipoDoc"=>$this->Rtipodoc,				
			"numDoc"=>$this->Rndoc,
			"nombre"=>$this->Rnombre,
			"direccion"=>$this->Rdireccion,
			"email"=>$this->Remail,
			"telefono"=>$this->Rtelefono,
			"fax"=>$this->Rfax,
			"departamento"=>$this->RDepartamento,
			"provincia"=>$this->RProvincia,
			"distrito"=>$this->RDistrito,
			"representante"=>$this->Rrepresentante,
			"estado"=>"1"
		);

		$respuesta = ControladorTramite::ctrCrearRemitente($datos);

		echo $respuesta[0];

	}

	/*=============================================
	VALIDAR NO REPETIR
	=============================================*/	

	public function ajaxValidarRemitente(){

		$tabla = "remitente";
		$item = "numDoc";
		$valor = $this->Rnombre;
		$respuesta = ControladorTramite::ctrMostrar($tabla,$item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
ACTIVAR CATEGORIA
=============================================*/

if(isset($_POST["Rtipopersona"])){

	$ingReg = new AjaxTramite();
	$ingReg -> Rtipopersona = $_POST["Rtipopersona"];
	$ingReg -> Rtipodoc = $_POST["Rtipodoc"];
	$ingReg -> Rndoc = $_POST["Rndoc"];
	$ingReg -> Rnombre = $_POST["Rnombre"];
	$ingReg -> Rdireccion = $_POST["Rdireccion"];
	$ingReg -> Remail = $_POST["Remail"];
	$ingReg -> Rtelefono = $_POST["Rtelefono"];
	$ingReg -> Rfax = $_POST["Rfax"];
	$ingReg -> RDepartamento = $_POST["RDepartamento"];
	$ingReg -> RProvincia = $_POST["RProvincia"];
	$ingReg -> RDistrito = $_POST["RDistrito"];
	$ingReg -> Rrepresentante = $_POST["Rrepresentante"];

	$ingReg -> ajaxCrearRemitente();

}


/*=============================================
VALIDAR NO REPETIR REMITENTE
=============================================*/

if(isset($_POST["validarRemitente"])){

	$VLr = new AjaxTramite();
	$VLr -> Rnombre = $_POST["validarRemitente"];
	$VLr -> ajaxValidarRemitente();

}
