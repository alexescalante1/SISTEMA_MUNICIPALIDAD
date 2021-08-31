<?php

require_once "../controladores/publicacion.controlador.php";
require_once "../modelos/publicacion.modelo.php";

class AjaxPublicacion{

	/*=============================================
	RECIBIR MULTIMEDIA
	=============================================*/

	public $imagenMultimediaA;
	public $rutaMultimediaA;	

	public function  ajaxRecibirMultimedia(){

		$datos = $this->imagenMultimediaA;
		$ruta = $this->rutaMultimediaA;

		$respuesta = ControladorPublicacion::ctrSubirMultimedia($datos, $ruta);

		echo $respuesta;

	}

	/*=============================================
	GUARDAR PUBLICAC
	=============================================*/	

	public $tituloPublicacion;
	public $rutaPublicacion;
	public $seleccionarCategoria;
	public $descripcionPublicacion;
	public $pClavesPublicacion;
	public $Departamento;
	public $Provincia;
	public $Distrito;
	public $multimedia;
	public $fotoPrincipal;

	public $idA;
	public $antiguaFotoPrincipalA;

	public function  ajaxCrearPublicacion(){

		$datos = array(
			"tituloPublicacion"=>$this->tituloPublicacion,
			"rutaPublicacion"=>$this->rutaPublicacion,				
			"categoria"=>$this->seleccionarCategoria,
			"descripcionPublicacion"=>$this->descripcionPublicacion,
			"pClavesPublicacion"=>$this->pClavesPublicacion,
			"Departamento"=>$this->Departamento,
			"Provincia"=>$this->Provincia,
			"Distrito"=>$this->Distrito,
			"multimedia"=>$this->multimedia,
			"fotoPrincipal"=>$this->fotoPrincipal
		);

		$respuesta = ControladorPublicacion::ctrCrearPublicacion($datos);

		echo $respuesta;

	}

	/*=============================================
	ELIM PRUEBA
	=============================================*/	
	public $rutaCabecera;
	public $imgPrincipal;

	public function  ajaxElimPublicac(){

		$datos = array(
			"idPublicar"=>$this->idA,
			"rutaCabecera"=>$this->rutaCabecera,				
			"imgPrincipal"=>$this->imgPrincipal
		);

		$respuesta = ControladorPublicacion::ctrEliminarPublicac($datos);

		echo $respuesta;

	}


	/*=============================================
	TRAER PUBLICACION
	=============================================*/	

	public function ajaxTraerPublicac(){

		$item = "idPublicar";
		$valor = $this->idA;

		$respuesta = ControladorPublicacion::ctrMostrar("publicar",$item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR PUBLICACION
	=============================================*/	

	public function  ajaxEditarPublicacion(){

		$datos = array(
			"idPublicar"=>$this->idA,
			"tituloPublicacion"=>$this->tituloPublicacion,
			"rutaPublicacion"=>$this->rutaPublicacion,
			"categoria"=>$this->seleccionarCategoria,
			"descripcionPublicacion"=>$this->descripcionPublicacion,					
			"pClavesPublicacion"=>$this->pClavesPublicacion,
			"Departamento"=>$this->Departamento,
			"Provincia"=>$this->Provincia,
			"Distrito"=>$this->Distrito,
			"multimedia"=>$this->multimedia,
			"fotoPrincipal"=>$this->fotoPrincipal,
			"antiguaFotoPrincipalA"=>$this->antiguaFotoPrincipalA
			);

		$respuesta = ControladorPublicacion::ctrEditarPublicacion($datos);

		echo $respuesta;

	}

	/*=============================================
	CREAR VIDEO
	=============================================*/	

	public function  ajaxCrearVideo(){

		$datos = array(
			"tituloV"=>$this->tituloPublicacion,
			"enlace"=>$this->rutaPublicacion,				
			"categoria"=>$this->seleccionarCategoria
		);

		$respuesta = ControladorPublicacion::ctrCrearVideo($datos);

		echo $respuesta;

	}


	/*=============================================
	ELIM VIDEO
	=============================================*/	

	public function  ajaxElimPvideo(){

		$datos = array(
			"idPvideos"=>$this->idA
		);

		$respuesta = ControladorPublicacion::ctrEliminarPvideo($datos);

		echo $respuesta;

	}

	/*=============================================
  	ACTIVAR DARK
 	=============================================*/	

	 public function ajaxActivarDark(){

		session_start();

		if($_SESSION["validarSesionBackend"]=="ok"){

			$tabla = "administradores";
		
			$item1 = "dark";
			if($_SESSION["estiloPantalla"] == 1){
				
				$valor1 = 0;
				$_SESSION["estiloPantalla"] = 0;
	
			}else{
	
				$valor1 = 1;
				$_SESSION["estiloPantalla"] = 1;
	
			}
			
			$item2 = "id";
			$valor2 = $this->activarIdAd;
	
			$respuesta = ModeloPublicacion::mdlActualizar($tabla, $item1, $valor1, $item2, $valor2);
	
			echo $respuesta;

		}else{

			echo "error";
			
		}
		
	}

	/*=============================================
	GUARDAR CARRUSEL
	=============================================*/	

	public function  ajaxCrearCimagen(){

		$datos = array(
			"tituloC"=>$this->tituloPublicacion,
			"rutaC"=>$this->rutaPublicacion,
			"prioridadC"=>$this->descripcionPublicacion,
			"fotoPrincipal"=>$this->fotoPrincipal
		);

		$respuesta = ControladorPublicacion::ctrCrearCimagen($datos);

		echo $respuesta;

	}

	/*=============================================
	ELIM IMAGEN CARRUSEL
	=============================================*/	

	public function  ajaxElimCimagen(){

		$datos = array(
			"idCarrusel"=>$this->idA,				
			"imgPrincipal"=>$this->imgPrincipal
		);

		$respuesta = ControladorPublicacion::ctrEliminarCimagen($datos);

		echo $respuesta;

	}

	/*=============================================
	GUARDAR GERENCIA
	=============================================*/	

	public function  ajaxCrearGerencia(){

		$datos = array(
			"tituloG"=>$this->tituloPublicacion,
			"rutaG"=>$this->rutaPublicacion,
			"nombreG"=>$this->descripcionPublicacion,
			"contactoG"=>$this->pClavesPublicacion,
			"fotoPrincipal"=>$this->fotoPrincipal
		);

		$respuesta = ControladorPublicacion::ctrCrearGerencia($datos);

		echo $respuesta;

	}


	/*=============================================
	ELIM GERENCIA
	=============================================*/	

	public function  ajaxElimGerencia(){

		$datos = array(
			"idGerencias"=>$this->idA,				
			"imgPrincipal"=>$this->imgPrincipal
		);

		$respuesta = ControladorPublicacion::ctrEliminarGerencia($datos);

		echo $respuesta;

	}


	/*=============================================
	TRAER GERENCIA
	=============================================*/	

	public function ajaxTraerGerencia(){

		$item = "idGerencias";
		$valor = $this->idA;

		$respuesta = ControladorPublicacion::ctrMostrar("gerencias",$item, $valor);

		echo json_encode($respuesta);

	}

 }


//==================================================================================================

/*=============================================
ACTIVAR ADMISION
=============================================*/	

if(isset($_POST["idAdmin"])){

	//if($_SESSION["validarSesionBackend"]=="ok"){
		$activarD = new AjaxPublicacion();
		$activarD -> activarIdAd = $_POST["idAdmin"];
		$activarD -> ajaxActivarDark();
	/*}else{
		echo "error";
	}*/	
	
}


#RECIBIR ARCHIVOS MULTIMEDIA
#-----------------------------------------------------------
if(isset($_FILES["fileM"])){

	$multimedia = new AjaxPublicacion();
	$multimedia -> imagenMultimediaA = $_FILES["fileM"];
	$multimedia -> rutaMultimediaA = $_POST["rutaM"];
	$multimedia -> ajaxRecibirMultimedia();

}


#CREAR PUBLICACI
#-----------------------------------------------------------
if(isset($_POST["tituloPublicacion"])){

	$producto = new AjaxPublicacion();
	$producto -> tituloPublicacion = $_POST["tituloPublicacion"];
	$producto -> rutaPublicacion = $_POST["rutaPublicacion"];
	$producto -> seleccionarCategoria = $_POST["seleccionarCategoria"];
	$producto -> descripcionPublicacion = $_POST["descripcionPublicacion"];
	$producto -> pClavesPublicacion = $_POST["pClavesPublicacion"];
	$producto -> Departamento = $_POST["Departamento"];
	$producto -> Provincia = $_POST["Provincia"];
	$producto -> Distrito = $_POST["Distrito"];

	$producto -> multimedia = $_POST["multimedia"];

	if(isset($_FILES["fotoPrincipal"])){

		$producto -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$producto -> fotoPrincipal = null;

	}

	$producto -> ajaxCrearPublicacion();

}


/*=============================================
ELIMINAR PUBLICA
=============================================*/
if(isset($_POST["idEPublicacion"])){

	$elimPr = new AjaxPublicacion();
	$elimPr -> idA = $_POST["idEPublicacion"];
	$elimPr -> rutaCabecera = $_POST["rutaCabecera"];
	$elimPr -> imgPrincipal = $_POST["imgPrincipal"];
	$elimPr -> ajaxElimPublicac();

}


/*=============================================
TRAER PUBLICACION
=============================================*/
if(isset($_POST["idPublicar"])){

	$traerP = new AjaxPublicacion();
	$traerP -> idA = $_POST["idPublicar"];
	$traerP -> ajaxTraerPublicac();

}


/*=============================================
EDITAR PUBLICAC
=============================================*/
if(isset($_POST["idMPublicac"])){

	$editarPublicac = new AjaxPublicacion();
	$editarPublicac -> idA = $_POST["idMPublicac"];
	$editarPublicac -> tituloPublicacion = $_POST["editarPublicac"];
	$editarPublicac -> rutaPublicacion = $_POST["rutaPublicac"];
	$editarPublicac -> seleccionarCategoria = $_POST["seleccionarCategoria"];
	$editarPublicac -> descripcionPublicacion = $_POST["descripcionPublicac"];		
	$editarPublicac -> pClavesPublicacion = $_POST["pClavesPublicac"];
	$editarPublicac -> Departamento = $_POST["depart"];
	$editarPublicac -> Provincia = $_POST["provin"];
	$editarPublicac -> Distrito = $_POST["distri"];
	$editarPublicac -> multimedia = $_POST["multimedia"];

	if(isset($_FILES["fotoPrincipal"])){

		$editarPublicac -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$editarPublicac -> fotoPrincipal = null;

	}

	$editarPublicac -> antiguaFotoPrincipalA = $_POST["antiguaFotoPrincipalA"];

	$editarPublicac -> ajaxEditarPublicacion();

}


#CREAR VIDEO
#-----------------------------------------------------------
if(isset($_POST["tituloPvideo"])){

	$video = new AjaxPublicacion();
	$video -> tituloPublicacion = $_POST["tituloPvideo"];
	$video -> rutaPublicacion = $_POST["enlaceVideo"];
	$video -> seleccionarCategoria = $_POST["seleccionarCategoriaV"];
	$video -> ajaxCrearVideo();

}


/*=============================================
ELIMINAR PUBLICA
=============================================*/
if(isset($_POST["idEPvideo"])){

	$elimPr = new AjaxPublicacion();
	$elimPr -> idA = $_POST["idEPvideo"];
	$elimPr -> ajaxElimPvideo();

}

#CREAR CARRUSEL
#-----------------------------------------------------------
if(isset($_POST["tituloCimagen"])){

	$cimg = new AjaxPublicacion();
	$cimg -> tituloPublicacion = $_POST["tituloCimagen"];
	$cimg -> rutaPublicacion = $_POST["rutaCimagen"];
	$cimg -> descripcionPublicacion = $_POST["Cprioridad"];

	if(isset($_FILES["fotoPrincipal"])){

		$cimg -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$cimg -> fotoPrincipal = null;

	}

	$cimg -> ajaxCrearCimagen();

}


/*=============================================
ELIMINAR CARRUSEL
=============================================*/
if(isset($_POST["idECarrusel"])){

	$elimPr = new AjaxPublicacion();
	$elimPr -> idA = $_POST["idECarrusel"];
	$elimPr -> imgPrincipal = $_POST["imgPrincipal"];
	$elimPr -> ajaxElimCimagen();

}


#CREAR GERENCIA
#-----------------------------------------------------------
if(isset($_POST["tituloGerencia"])){

	$cgerenc = new AjaxPublicacion();
	$cgerenc -> tituloPublicacion = $_POST["tituloGerencia"];
	$cgerenc -> rutaPublicacion = $_POST["rutaGerencia"];
	$cgerenc -> descripcionPublicacion = $_POST["nombreGerente"];
	$cgerenc -> pClavesPublicacion = $_POST["numContacto"];

	if(isset($_FILES["fotoPrincipal"])){

		$cgerenc -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$cgerenc -> fotoPrincipal = null;

	}

	$cgerenc -> ajaxCrearGerencia();

}


/*=============================================
ELIMINAR GERENCIA
=============================================*/
if(isset($_POST["idEGerencias"])){

	$elimG = new AjaxPublicacion();
	$elimG -> idA = $_POST["idEGerencias"];
	$elimG -> imgPrincipal = $_POST["imgPrincipal"];
	$elimG -> ajaxElimGerencia();

}


/*=============================================
TRAER GERENCIA
=============================================*/
if(isset($_POST["idGerencias"])){

	$traerP = new AjaxPublicacion();
	$traerP -> idA = $_POST["idGerencias"];
	$traerP -> ajaxTraerGerencia();

}