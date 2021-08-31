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
	MOSTRAR BANDEJA
	=============================================*/
	static public function mdlMostrarBandeja($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT doc.idDocumentos, doc.codigo, doc.modo, doc.tipodoc, doc.numdoc,doc.asunto, rem.nombre,rem.numDoc,doc.archivo, doc.estado, doc.fecha FROM $tabla doc INNER JOIN remitente rem ON rem.idRemitente = doc.idRemitente WHERE doc.$item = :$item");

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
	MOSTRAR BANDEJA
	=============================================*/
	static public function mdlMostrarDoc($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT doc.idDocumentos,doc.codigo,doc.modo,doc.tipodoc,doc.numdoc,rem.nombre,rem.numDoc,doc.asunto,doc.obserbaciones,doc.clase,doc.procedimiento,doc.requicitos,doc.referencia,admin.nombre,doc.folios,doc.archivo,doc.tiempoRespuesta,doc.estado,doc.fecha FROM $tabla doc INNER JOIN remitente rem ON rem.idRemitente = doc.idRemitente INNER JOIN administradores admin ON admin.id = doc.idAdmin WHERE doc.$item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

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
	CREAR REM
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
	CREAR DOC
	=============================================*/

	static public function mdlIngresarDoc($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(modo, tipodoc, numdoc, idRemitente, asunto, obserbaciones, clase, procedimiento, requicitos, referencia, idAdmin, folios, archivo, tiempoRespuesta, estado) VALUES (:modo, :tipodoc, :numdoc, :idRemitente, :asunto, :obserbaciones, :clase, :procedimiento, :requicitos, :referencia, :idAdmin, :folios, :archivo, :tiempoRespuesta, :estado)");

		$stmt->bindParam(":modo", $datos["modo"], PDO::PARAM_STR);
		$stmt->bindParam(":tipodoc", $datos["tipodoc"], PDO::PARAM_STR);
		$stmt->bindParam(":numdoc", $datos["numdoc"], PDO::PARAM_STR);
		$stmt->bindParam(":idRemitente", $datos["idRemitente"], PDO::PARAM_STR);
		$stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
		$stmt->bindParam(":obserbaciones", $datos["obserbaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":clase", $datos["clase"], PDO::PARAM_STR);
		$stmt->bindParam(":procedimiento", $datos["procedimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":requicitos", $datos["requicitos"], PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
		$stmt->bindParam(":idAdmin", $datos["idAdmin"], PDO::PARAM_STR);
		$stmt->bindParam(":folios", $datos["folios"], PDO::PARAM_STR);
		$stmt->bindParam(":archivo", $datos["archivo"], PDO::PARAM_STR);
		$stmt->bindParam(":tiempoRespuesta", $datos["tiempoRespuesta"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			$stmt2 = Conexion::conectar()->prepare("SELECT MAX(idDocumentos) AS id FROM documentos");
			
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

	
	static public function mdlIngresarDeriva($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(respuesta, idGerencia, idDocumento) VALUES (:respuesta, :idGerencia, :idDocumento)");

		$stmt->bindParam(":respuesta", $datos["respuesta"], PDO::PARAM_STR);
		$stmt->bindParam(":idGerencia", $datos["idGerencia"], PDO::PARAM_STR);
		$stmt->bindParam(":idDocumento", $datos["idDocumento"], PDO::PARAM_STR);

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
	LISTAR BUSCADOR
	=============================================*/

	static public function mdlListarBusqueda($tabla, $busqueda){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE titulo like '%$busqueda%' OR palabrasClave like '%$busqueda%'");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

		/*=============================================
	BUSCADOR
	=============================================*/

	static public function mdlMostrarSeg($tabla, $valor, $ordenar, $modo, $base, $tope){

		$stmt = Conexion::conectar()->prepare("SELECT doc.idDocumentos,doc.codigo,doc.modo,doc.tipodoc,doc.numdoc,rem.nombre,rem.numDoc,doc.asunto,doc.archivo,doc.fecha FROM $tabla doc INNER JOIN remitente rem ON rem.idRemitente = doc.idRemitente WHERE doc.estado = :estado ORDER BY $ordenar $modo LIMIT $base, $tope");

		$stmt->bindParam(":estado", $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	LISTAR BUSCADOR
	=============================================*/

	static public function mdlListarSeg($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT count(*) FROM $tabla WHERE estado = :estado");
		
		$stmt->bindParam(":estado", $valor, PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}