<?php

class ControladorPublicacion{

	/*=============================================
	MOSTRAR GENERAL
	=============================================*/
	
	static public function ctrMostrar($tabla, $item, $valor){

		$respuesta = ModeloPublicacion::mdlMostrar($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	SUBIR MULTIMEDIA
	=============================================*/

	static public function ctrSubirMultimedia($datos, $ruta){

		if(isset($datos["tmp_name"]) && !empty($datos["tmp_name"])){

			/*=============================================
			DEFINIMOS LAS MEDIDAS
			=============================================*/

			list($ancho, $alto) = getimagesize($datos["tmp_name"]);	

			$nuevoAncho = 1920;
			$nuevoAlto = 1080;

			/*=============================================
			CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DE LA MULTIMEDIA
			=============================================*/

			$directorio = "../vistas/img/multimedia/".$ruta;

			/*=============================================
			PRIMERO PREGUNTAMOS SI EXISTE UN DIRECTORIO DE MULTIMEDIA CON ESTA RUTA
			=============================================*/

			if (!is_dir($directorio)){
				
				error_reporting(0);
				$crear = mkdir($directorio, 0777, true);
				
			}

			/*=============================================
			DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
			=============================================*/

			if($datos["type"] == "image/jpeg"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$rutaMultimedia = $directorio."/".$datos["name"];

				$origen = imagecreatefromjpeg($datos["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $rutaMultimedia);

			}

			if($datos["type"] == "image/png"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$rutaMultimedia = $directorio."/".$datos["name"];

				$origen = imagecreatefrompng($datos["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagealphablending($destino, FALSE);
		
				imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $rutaMultimedia);

			}

			return $rutaMultimedia;	

		}

	}






	/*=============================================
	CREAR PUBLICACION
	=============================================*/


	static public function ctrCrearPublicacion($datos){

		if(isset($datos["tituloPublicacion"])){

				/*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

				$rutaFotoPrincipal = "../vistas/img/publicacion/default/default.png";

				if(isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	

					$nuevoAncho = 1920;
					$nuevoAlto = 1080;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/publicacion/".$datos["rutaPublicacion"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFotoPrincipal);

					}

					if($datos["fotoPrincipal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/publicacion/".$datos["rutaPublicacion"].".png";

						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPrincipal);

					}

				}

				$datosPubl = array(
						"titulo"=>$datos["tituloPublicacion"],
						"categoria"=>$datos["categoria"],
						"multimedia"=>$datos["multimedia"],
						"ruta"=>$datos["rutaPublicacion"],
						"descripcion"=> $datos["descripcionPublicacion"],
						"palabrasClave"=> $datos["pClavesPublicacion"],
						"vistas"=> 0,
						"departamento"=> $datos["Departamento"],
						"provincia"=> $datos["Provincia"],
						"distrito"=> $datos["Distrito"],
						"imgFotoPrincipal"=>substr($rutaFotoPrincipal,3)
				);
				
				$respuesta = ModeloPublicacion::mdlIngresarPublicacion("publicar", $datosPubl);

				return $respuesta;
		
		}

	}

























	/*=============================================
	EDITAR PUBLICACION
	=============================================*/

	static public function ctrEditarPublicacion($datos){

		if(isset($datos["idPublicar"])){

				/*=============================================
				ELIMINAR LAS FOTOS DE MULTIMEDIA DE LA CARPETA
				=============================================*/

				$item = "idPublicar";
				$valor = $datos["idPublicar"];
				
				$traerProductos = ModeloPublicacion::mdlMostrar("publicar", $item, $valor);

				foreach ($traerProductos as $key => $value) {
					
					$multimediaBD = json_decode($value["multimedia"],true);
					$multimediaEditar = json_decode($datos["multimedia"],true);

					$objectMultimediaBD = array();
					$objectMultimediaEditar = array();

					foreach ($multimediaBD as $key => $value) {

						array_push($objectMultimediaBD, $value["foto"]);

					}

					foreach ($multimediaEditar as $key => $value) {

						array_push($objectMultimediaEditar, $value["foto"]);

					}

					$borrarFoto = array_diff($objectMultimediaBD, $objectMultimediaEditar);

					foreach ($borrarFoto as $key => $value) {
						
						unlink("../".$value);

					}

				}

				/*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

				$rutaFotoPrincipal = "../".$datos["antiguaFotoPrincipalA"];

				if(isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])){

					/*=============================================
					BORRAMOS ANTIGUA FOTO PRINCIPAL
					=============================================*/

					unlink("../".$datos["antiguaFotoPrincipalA"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	

					$nuevoAncho = 1920;
					$nuevoAlto = 1080;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/publicacion/".$datos["rutaPublicacion"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFotoPrincipal);

					}

					if($datos["fotoPrincipal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/publicacion/".$datos["rutaPublicacion"].".png";

						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPrincipal);

					}

				}
				
		
				$datosPublc = array(
					"idPublicar"=>$datos["idPublicar"],
					"titulo"=>$datos["tituloPublicacion"],
					"ruta"=>$datos["rutaPublicacion"],
					"categoria"=>$datos["categoria"],
					"descripcion"=>$datos["descripcionPublicacion"],
					"pClaves"=>$datos["pClavesPublicacion"],
					"multimedia"=>$datos["multimedia"],
					"depart"=> $datos["Departamento"],
					"provin"=> $datos["Provincia"],
					"distri"=> $datos["Distrito"],
					"vistas"=> 0,
					"imgFotoPrincipal"=>substr($rutaFotoPrincipal,3)
					);


				$respuesta = ModeloPublicacion::mdlEditarPublicacion("publicar", $datosPublc);

				return $respuesta;


		}
		
	}








	/*=============================================
	ELIMINAR PUBLICACION
	=============================================*/

	static public function ctrEliminarPublicac($datos){

		if(isset($datos["idPublicar"])){

			/*=============================================
			ELIMINAR MULTIMEDIA
			=============================================*/

			$borrar = glob("../vistas/img/multimedia/".$datos["rutaCabecera"]."/*");

				foreach($borrar as $file){

					unlink($file);

				}

			rmdir("../vistas/img/multimedia/".$datos["rutaCabecera"]);

			/*=============================================
			ELIMINAR FOTO PRINCIPAL
			=============================================*/

			if($datos["imgPrincipal"] != "" && $datos["imgPrincipal"] != "vistas/img/publicacion/default/default.png"){

				unlink("../".$datos["imgPrincipal"]);

			}

			$respuesta = ModeloPublicacion::mdlEliminarPublicac("publicar", $datos["idPublicar"]);

			return $respuesta;

		}

	}




	/*=============================================
	CREAR VIDEO
	=============================================*/


	static public function ctrCrearVideo($datos){

		if(isset($datos["tituloV"])){

			$datosPV = array(
					"titulo"=>$datos["tituloV"],
					"enlace"=>$datos["enlace"],
					"categoria"=>$datos["categoria"]
			);
			
			$respuesta = ModeloPublicacion::mdlIngresarVideo("pvideos", $datosPV);

			return $respuesta;
		
		}

	}



	/*=============================================
	ELIMINAR VIDEO
	=============================================*/

	static public function ctrEliminarPvideo($datos){

		if(isset($datos["idPvideos"])){

			$respuesta = ModeloPublicacion::mdlEliminarPvideo("pvideos", $datos["idPvideos"]);

			return $respuesta;

		}

	}



	/*=============================================
	CREAR IMAGEN CARRUSEL
	=============================================*/


	static public function ctrCrearCimagen($datos){

		if(isset($datos["tituloC"])){

				/*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

				$rutaFotoPrincipal = "../vistas/img/publicacion/default/default.png";

				if(isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	

					$nuevoAncho = 1920;
					$nuevoAlto = 1080;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/carrusel/".$datos["rutaC"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFotoPrincipal);

					}

					if($datos["fotoPrincipal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/carrusel/".$datos["rutaC"].".png";

						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPrincipal);

					}

				}

				$datosCi = array(
						"titulo"=>$datos["tituloC"],
						"ruta"=>$datos["rutaC"],
						"prioridad"=> $datos["prioridadC"],
						"imgFotoPrincipal"=>substr($rutaFotoPrincipal,3)
				);
				
				$respuesta = ModeloPublicacion::mdlIngresarCimagen("carrusel", $datosCi);

				return $respuesta;
		
		}

	}




	/*=============================================
	ELIMINAR CARRUSEL
	=============================================*/

	static public function ctrEliminarCimagen($datos){

		if(isset($datos["idCarrusel"])){

			/*=============================================
			ELIMINAR FOTO PRINCIPAL
			=============================================*/

			if($datos["imgPrincipal"] != "" && $datos["imgPrincipal"] != "vistas/img/publicacion/default/default.png"){

				unlink("../".$datos["imgPrincipal"]);

			}

			$respuesta = ModeloPublicacion::mdlEliminarCimagen("carrusel", $datos["idCarrusel"]);

			return $respuesta;

		}

	}



	/*=============================================
	CREAR GERENCIA
	=============================================*/

	static public function ctrCrearGerencia($datos){

		if(isset($datos["tituloG"])){

				/*=============================================
				VALIDAR IMAGEN PRINCIPAL
				=============================================*/

				$rutaFotoPrincipal = "../vistas/img/perfiles/default/anonymous.png";

				if(isset($datos["fotoPrincipal"]["tmp_name"]) && !empty($datos["fotoPrincipal"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($datos["fotoPrincipal"]["tmp_name"]);	

					$nuevoAncho = 600;
					$nuevoAlto = 600;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["fotoPrincipal"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/gerencias/".$datos["rutaG"].".jpg";

						$origen = imagecreatefromjpeg($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFotoPrincipal);

					}

					if($datos["fotoPrincipal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$rutaFotoPrincipal = "../vistas/img/gerencias/".$datos["rutaG"].".png";

						$origen = imagecreatefrompng($datos["fotoPrincipal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoPrincipal);

					}

				}

				$datosGR = array(
						"titulo"=>$datos["tituloG"],
						"ruta"=>$datos["rutaG"],
						"encargado"=> $datos["nombreG"],
						"contacto"=> $datos["contactoG"],
						"imgFotoPrincipal"=>substr($rutaFotoPrincipal,3)
				);
				
				$respuesta = ModeloPublicacion::mdlIngresarGerencia("gerencias", $datosGR);

				return $respuesta;
		
		}

	}

	/*=============================================
	ELIMINAR GERENCIA
	=============================================*/

	static public function ctrEliminarGerencia($datos){

		if(isset($datos["idGerencias"])){

			/*=============================================
			ELIMINAR FOTO PRINCIPAL
			=============================================*/

			if($datos["imgPrincipal"] != "" && $datos["imgPrincipal"] != "vistas/img/perfiles/default/anonymous.png"){

				unlink("../".$datos["imgPrincipal"]);

			}

			$respuesta = ModeloPublicacion::mdlEliminarGerencia("gerencias", $datos["idGerencias"]);

			return $respuesta;

		}

	}

	
}