<?php

require_once "conexion.php";

class ModeloPublicacion{

	/*=============================================
	MOSTRAR GENERAL
	=============================================*/
	static public function mdlMostrar($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	ACTUALIZAR
	=============================================*/

	static public function mdlActualizar($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
		
	}


	/*=============================================
	CREAR PUBLICAC
	=============================================*/

	static public function mdlIngresarPublicacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ruta, titulo, descripcion, portada, multimedia, vistas, categoria, palabrasClave, departamento, provincia, distrito) VALUES (:ruta, :titulo, :descripcion, :portada, :multimedia, :vistas, :categoria, :palabrasClave, :departamento, :provincia, :distrito)");

		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":portada", $datos["imgFotoPrincipal"], PDO::PARAM_STR);
		$stmt->bindParam(":multimedia", $datos["multimedia"], PDO::PARAM_STR);
		$stmt->bindParam(":vistas", $datos["vistas"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":palabrasClave", $datos["palabrasClave"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);
		$stmt->bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	/*=============================================
	EDITAR PUBLICAC
	=============================================*/

	static public function mdlEditarPublicacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ruta = :ruta, titulo = :titulo, descripcion = :descripcion, portada = :portada, multimedia = :multimedia, vistas = :vistas, categoria = :categoria, palabrasClave = :palabrasClave, departamento = :departamento, provincia = :provincia, distrito = :distrito WHERE idPublicar = :idPublicar");

		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":portada", $datos["imgFotoPrincipal"], PDO::PARAM_STR);
		$stmt->bindParam(":multimedia", $datos["multimedia"], PDO::PARAM_STR);
		$stmt->bindParam(":vistas", $datos["vistas"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["depart"], PDO::PARAM_STR);
		$stmt->bindParam(":provincia", $datos["provin"], PDO::PARAM_STR);
		$stmt->bindParam(":distrito", $datos["distri"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":palabrasClave", $datos["pClaves"], PDO::PARAM_STR);
		
		$stmt -> bindParam(":idPublicar", $datos["idPublicar"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	/*=============================================
	ELIMINAR PUBLICACION
	=============================================*/

	static public function mdlEliminarPublicac($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPublicar = :idPublicar");

		$stmt -> bindParam(":idPublicar", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	CREAR VIDEO
	=============================================*/

	static public function mdlIngresarVideo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(enlace, titulo, categoria) VALUES (:enlace, :titulo, :categoria)");

		$stmt->bindParam(":enlace", $datos["enlace"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR VIDEO
	=============================================*/

	static public function mdlEliminarPvideo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPvideos = :idPvideos");

		$stmt -> bindParam(":idPvideos", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	CREAR CARRUSEL
	=============================================*/

	static public function mdlIngresarCimagen($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ruta, titulo, prioridad, portada) VALUES (:ruta, :titulo, :prioridad, :portada)");

		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":prioridad", $datos["prioridad"], PDO::PARAM_STR);
		$stmt->bindParam(":portada", $datos["imgFotoPrincipal"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	/*=============================================
	ELIMINAR CARRUSEL
	=============================================*/

	static public function mdlEliminarCimagen($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCarrusel = :idCarrusel");

		$stmt -> bindParam(":idCarrusel", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CREAR GERENCIA
	=============================================*/

	static public function mdlIngresarGerencia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ruta, titulo, encargado, portada, contacto) VALUES (:ruta, :titulo, :encargado, :portada, :contacto)");

		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":encargado", $datos["encargado"], PDO::PARAM_STR);
		$stmt->bindParam(":portada", $datos["imgFotoPrincipal"], PDO::PARAM_STR);
		$stmt->bindParam(":contacto", $datos["contacto"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	ELIMINAR GERENCIA
	=============================================*/

	static public function mdlEliminarGerencia($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idGerencias = :idGerencias");

		$stmt -> bindParam(":idGerencias", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}