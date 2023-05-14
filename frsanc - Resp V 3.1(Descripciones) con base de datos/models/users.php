<?php

	require_once "conexion.php";

	class UserModel{

		static public function mdlObtenerUser($tabla, $item, $autor_id){

			$stmt = Conexion::conectar()->prepare("SELECT usuario FROM $tabla WHERE $item = $autor_id ");

			$stmt -> execute();
			return $stmt -> fetchAll();	
		}

		static public function mdlComent($tabla, $datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(comentario, autor_id, post_id) VALUES (:coment, :autor, :post)");

			$stmt -> bindParam(":coment", $datos["coment"], PDO::PARAM_STR);
			$stmt -> bindParam(":autor", $datos["id"], PDO::PARAM_STR);
			$stmt -> bindParam(":post", $datos["post"], PDO::PARAM_STR);

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