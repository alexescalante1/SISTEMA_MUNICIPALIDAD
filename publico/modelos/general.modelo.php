<?php

require_once "conexion.php";

class ModeloGeneral{

	/*=============================================
	MOSTRAR ARTICULOS
	=============================================*/

	static public function mdlMostrar($tabla, $ordenar, $item, $valor, $base, $tope, $modo){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla WHERE $item = :$item ORDER BY $ordenar $modo LIMIT $base, $tope");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla ORDER BY $ordenar $modo LIMIT $base, $tope");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR INFO
	=============================================*/

	static public function mdlMostrarInfo($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	LISTAR
	=============================================*/

	static public function mdlListar($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT count(*) FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT count(*) FROM $tabla");
			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BUSCADOR
	=============================================*/

	static public function mdlBuscar($tabla, $busqueda, $ordenar, $modo, $base, $tope){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE titulo like '%$busqueda%' OR palabrasClave like '%$busqueda%' ORDER BY $ordenar $modo LIMIT $base, $tope");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	LISTAR BUSQUEDA
	=============================================*/

	static public function mdlListarBusqueda($tabla, $busqueda){

		$stmt = Conexion::conectar()->prepare("SELECT count(*) FROM $tabla WHERE titulo like '%$busqueda%' OR palabrasClave like '%$busqueda%'");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


	

	/*=============================================
	ACTUALIZAR VISTA
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
	CONTAR
	=============================================*/

	static public function mdlContar($tabla, $item, $valor, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("SELECT count(*) FROM $tabla WHERE $item = :$item AND $item2 = :$item2");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}