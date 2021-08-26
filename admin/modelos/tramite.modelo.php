<?php

require_once "conexion.php";

class ModeloTramite{

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

	static public function mdlIngresarRemitente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipopersona, tipoDoc, numDoc, nombre, direccion, email, telefono, fax, departamento, provincia, distrito, representante, estado) VALUES (:tipopersona, :tipoDoc, :numDoc, :nombre, :direccion, :email, :telefono, :fax, :departamento, :provincia, :distrito, :representante, :estado)");

		$stmt->bindParam(":tipopersona", $datos["tipopersona"], PDO::PARAM_STR);
		$stmt->bindParam(":tipoDoc", $datos["tipoDoc"], PDO::PARAM_STR);
		$stmt->bindParam(":numDoc", $datos["numDoc"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":fax", $datos["fax"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":provincia", $datos["provincia"], PDO::PARAM_STR);
		$stmt->bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);
		$stmt->bindParam(":representante", $datos["representante"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			$stmt2 = Conexion::conectar()->prepare("SELECT MAX(idRemitente) AS id FROM remitente");
			
			$stmt2 -> execute();

			return $stmt2 -> fetch();
	
			$stmt2 -> close();
	
			$stmt2 = null;

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

}