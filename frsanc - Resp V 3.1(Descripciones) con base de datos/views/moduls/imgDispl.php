<?php
	if (isset($_GET["pop"])){
		if(is_numeric($_GET["pop"])){
			$imagenes = FormulariosControl::ctrlObtenerPost("imagenes", "id", $_GET["pop"]);
			if($imagenes != null){
				$comentarios = FormulariosControl::ctrlObtenerComents($_GET["pop"]);
			}else{
				echo '<script>window.location = "index.php?pag=error404";</script>';
			}
		}else{
			echo '<script>window.location = "index.php?pag=error404";</script>';
		}
	}else{
		echo '<script>window.location = "index.php?pag=error404";</script>';
	}
?>

<?php if ($imagenes != null): ?> 
	<main class="main">
		<h1 class="titulo"><?php echo $imagenes["nombre"] ?></h1>
		<div class="publicado_por">
			<p>Publicado por <a href="index.php?user=<?php echo $imagenes['autor_id'];?>"><?php $usuarioExiste = UserCont::ctrlObtenerUsuario($imagenes["autor_id"]); echo $usuarioExiste[0]["usuario"]; ?></a></p>
		</div>
		<div class="contenedor-post">
			<div class="grid-dibujo">
				<img src="<?php echo $imagenes["ruta"] ?>" alt="<?php echo $imagenes["nombre"] ?>" />
			</div>
			<div class="descripcion">
				<h1>Descripción</h1>
				<div class="caja-descripcion">
					<p>
						<?php  
						if($imagenes["contenido"] != null && $imagenes["contenido"] != "" && $imagenes["contenido"] != " "){
							$texto = nl2br($imagenes["contenido"]);
						}else{
							$texto = "No hay descripcion disponible... Aprovecho para decir que Te amo.";
						}
						echo $texto; ?>
					</p>
				</div>
			</div>
			<div class="comentarios">
			<h1>Comentarios</h1>
				<div class="grid-comentarios">
					<div class="caja-comentarios">
					<?php if ($comentarios != null):?>
						<?php foreach($comentarios as $key => $value): ?>
							<div class = "comentario">
								<h3>
									<?php 
										$usuario = UserCont::ctrlObtenerUsuario($value['autor_id']);
										echo $value['idcoment'], "  ".$usuario[0]['usuario'];
									?>
								</h3>
								<p> <?php echo $value['comentario'] ?></p>
							</div>
						<?php endforeach ?>
					<?php else: ?>
						<div class = "comentario">
							<p>No hay comentarios... Aprovecho para decir que Te amo.</p>
						</div>
					<?php endif ?>
					</div>
					<div class="comentar">
						<form class="form-coment" method="post">
							<input class="input" type="text" id="coment" name="coment" placeholder="Tienes algo que comentar?" required></input>
							<input class="submit" type="submit" value="Comentar"></input>
						</form>
					</div>
				</div>
			</div>
		</div>
			<?php 
	
				$registro = UserCont::ctrlComent();

				if($registro == "ok"){
					echo '<script>
							if(window.history.replaceState){
				
								window.history.replaceState(null, null, window.location.href);
				
							}
		
						 </script>';

						 echo "	<div class='notificacion'> Se ha comentado </div>";
				}
				else{
					echo "<div class='notificacionE'> ".$registro."</div>
					<script>
							if(window.history.replaceState){
				
								window.history.replaceState(null, null, window.location.href);
							}
					</script>";
				}

			?>
		</main>
<?php endif ?>

