<?php

	class FormulariosControl{
	
		/*REGISTRO*/

		static public function ctrlRegistro(){

			if(isset($_POST["rUsuario"]) && $_POST["rUsuario"] != "" && strlen($_POST["rUsuario"]) <= 20 ){
				if(isset($_POST["email"]) && $_POST["email"] != "" && strpos($_POST["email"],"@") != false){
					if(isset($_POST["password"]) && $_POST["password"] != "" && strlen($_POST["password"]) >= 7){

						$item = "email";
						$tabla = "registros";
						$emailExist = FormularioModel::mdlObtenerRegistro($tabla,$item,$_POST["email"],null,null);

						if(empty($emailExist) || count($emailExist) == 0){
							$tabla = "registros";
							$datos = array("usuario" => $_POST["rUsuario"],"email" => $_POST["email"], "password" => $_POST["password"]);

							$respuesta =  FormularioModel::mdlRegistro($tabla, $datos);

							return $respuesta;
						}else{
							return "Ese correo electrónico ya está registrado";
						}
					}else{
						return "Inserte Alguna contrasena (Min. 7 Caracteres)";
					}
				}else{
					return "Inserte su email";
				}
			}else{
				return "Rellene el campo de Usuario (Max. 20 Caracteres)";
			}
		
		}

		/*Obtener Imagenes*/
		static public function ctrlObtenerBusqueda($busqueda){
			$tabla = "imagenes";
			$item = "nombre";
			$value = $busqueda;
			$respuesta = FormularioModel::mdlObtenerVarRegistros($tabla, $item, $value,null,null);

			return $respuesta;
		}

		static public function ctrlObtenerBusquedaPag($busqueda, $limit1, $limit2){
			$tabla = "imagenes";
			$item = "nombre";
			$value = $busqueda;
			$respuesta = FormularioModel::mdlObtenerVarRegistros($tabla, $item, $value, $limit1, $limit2);

			return $respuesta;
		}

		static public function ctrlObtenerRegistro(){
				$tabla = "imagenes";
				$respuesta = FormularioModel::mdlObtenerRegistro($tabla, null, null,null,null);

				return $respuesta;
			
		}

		static public function ctrlObtenerImagen($tabla, $item, $valor){
			$respuesta = FormularioModel::mdlObtenerRegistro($tabla, $item, $valor,null,null);

			return $respuesta;
		}

		static public function ctrlObtenerPost($tabla, $item, $valor){
			$respuesta = FormularioModel::mdlObtenerRegistro($tabla, $item, $valor,null,null);

			return $respuesta;
		}

		static public function ctrlObtRegPag($limit1,$limit2){
			$tabla = "imagenes";
			$respuesta = FormularioModel::mdlObtenerRegistro($tabla, null, null,$limit1,$limit2);

			return $respuesta;
		}

		/*Obtener Comentarios*/
		static public function ctrlObtenerComents($post_id){
			$tabla = "comentarios";
			$item = "post_id";
			$value = $post_id;
			$respuesta = FormularioModel::mdlObtenerVarComentarios($tabla, $item, $value);

			return $respuesta;
		}

		/*SUBIR IMÁGEN*/

		static public function subirImagen(){
		
			if(isset($_POST["nombre"]) && $_POST["nombre"] != "" && strlen($_POST["nombre"]) <= 30 ){
				if(isset($_SESSION["admin"]) && $_SESSION["admin"]== true){
						if(isset($_FILES["archivo"])){
							$nombreArchivo = $_FILES["archivo"]["name"];
							$nombreTemp =$_FILES["archivo"]["tmp_name"];
							$tipoArchivo =$_FILES["archivo"]["type"];
							$fileSize = $_FILES["archivo"]["size"];

							if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/png"){
								if($fileSize <= 5000000){
									$subida = FormularioModel::mdlSubirImagen($nombreTemp, $nombreArchivo);
								}else{
									return "El archivo es demasiado pesado (Máximo 5 Mb)";
								}
							}else{
								return "Formato de imagen no Valido";
							}
						}else{
							return "Seleccione un archivo";
						}


						if($subida == "ok"){
							$tabla = "imagenes";
							$ruta = "images/".$nombreArchivo;
							$datos = array("nombre" => $_POST["nombre"], "ruta" => $ruta, "autor_id" => $_SESSION["id"], "contenido" => $_POST["contenido"]);
							$respuesta =  FormularioModel::dbSubirImagen($tabla, $datos);
						}else{
							$respuesta = "No se pudo guardar el archivo";
						}

						return $respuesta;
				}else{
					return "Usted no es Administrador";
				}
			}else{
				return "Rellene el campo de Nombre (Max. 30 Caracteres)";
			}
		
		}

		/*INGRESAR*/

		public function ctrlIngreso(){
			if(isset($_POST["ingresoEmail"])){
				$tabla = "registros";
				$item = "email";
				$valor = $_POST["ingresoEmail"];
				$respuesta = FormularioModel::mdlObtenerRegistro($tabla, $item, $valor, null, null);
				if($respuesta != null){
					if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]){

						$_SESSION["accesAllow"] = "ok";
						$_SESSION["user"] = $respuesta["usuario"];
						$_SESSION["id"] = $respuesta["id"];

						if($respuesta["admin"] == 1){
							$_SESSION["admin"] = true;
								echo "<div class='notificacion'>Ingreso Exitoso, Usted es Administrador</div>";
								echo '<script>
									if(window.history.replaceState){
				
										window.history.replaceState(null, null, window.location.href);
				
									}
									window.location = "index.php?pag=main";
		
								</script>';
						}else{
							$_SESSION["admin"] = false;
							echo "<div class='notificacion'>Ingreso Exitoso</div>";
							echo '<script>
								if(window.history.replaceState){
				
									window.history.replaceState(null, null, window.location.href);
				
								}
								window.location = "index.php?pag=main";
		
							</script>';
						}
					}else{
						echo "<script>
							if(window.history.replaceState){
				
								window.history.replaceState(null, null, window.location.href);
				
							}
		
						</script>";
						echo "<div class='notificacionE'>El correo y la contrasena ingresada no coinciden</div>";
					}
				}else{
					echo "<script>
							if(window.history.replaceState){
				
								window.history.replaceState(null, null, window.location.href);
				
							}
		
						</script>";
						echo "<div class='notificacionE'>El correo y la contrasena ingresada no coinciden</div>";
				}
			}
		}

	}


?>