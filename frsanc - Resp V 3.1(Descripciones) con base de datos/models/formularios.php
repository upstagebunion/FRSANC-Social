<?php

	require_once "conexion.php";

	class FormularioModel{
	
		/*Registro*/

		static public function mdlRegistro($tabla, $datos){
		
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, email, password) VALUES (:usuario, :email, :password)");

			$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
			$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);

			if($stmt -> execute()){
				return "ok";
			}else{
				print_r(Conexion::conectar()->errorInfo());
			}
			$stmt -> close();
			$stmt = null;
		}


		/*Obtener Busqueda*/
		static public function mdlObtenerVarRegistros($tabla, $item, $valor, $limit1, $limit2){
			if($limit1 == null && $limit2 == null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item LIKE '%$valor%' ORDER BY id DESC");
				$stmt -> execute();
				return $stmt -> fetchAll();	
			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item LIKE '%$valor%' ORDER BY id DESC LIMIT $limit1,$limit2 ");
				$stmt -> execute();
				return $stmt -> fetchAll();	
			}
		}

		/*Obtener Comentarios*/
		static public function mdlObtenerVarComentarios($tabla, $item, $valor){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = $valor ORDER BY idcoment DESC");
				$stmt -> execute();
				return $stmt -> fetchAll();	
		}

		/*Obtener Imagenes*/
		static public function mdlObtenerRegistro($tabla, $item, $valor, $limit1, $limit2){
			if($item == null && $valor == null && $limit1 == null && $limit2 == null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
				$stmt -> execute();
				return $stmt -> fetchAll();	
			}elseif($limit1 == null && $limit2 == null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetch();
			}else{
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC LIMIT $limit1,$limit2");
				$stmt -> execute();
				return $stmt -> fetchAll();	
			}

			$stmt -> close();
			$stmt = null;
		}

		/*Sube Imagenes*/
		static public function mdlSubirImagen($temp, $nombre){
			if (move_uploaded_file($temp,"images/".$nombre)){
				return "ok";
			}
		}

		/*Subir Imagen Base de Datos*/
		static public function dbSubirImagen($tabla, $datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(autor_id, nombre, ruta, contenido) VALUES (:autor_id, :nombre, :ruta, :contenido)");

			$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt -> bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
			$stmt -> bindParam(":autor_id", $datos["autor_id"], PDO::PARAM_STR);
			$stmt -> bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);

			if($stmt -> execute()){
				return "ok";
			}else{
				print_r(Conexion::conectar()->errorInfo());
			}
			$stmt -> close();
			$stmt = null;
		}


	}

?>