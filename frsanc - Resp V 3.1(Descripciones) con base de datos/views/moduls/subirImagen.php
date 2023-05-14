<?php

	if(!isset($_SESSION["accesAllow"])){
		echo '<script>window.location = "index.php?pag=registro";</script>';
		
		return;
	}else{
		if($_SESSION["accesAllow"] != "ok"){
			echo '<script>window.location = "index.php?pag=registro";</script>';
		
			return;
		}
	}

?>

<main class="main">
	<div class="grid-formulario">
		<form method="post" enctype="multipart/form-data">
			<div class="input">
				<p>Nombre</p>
				<input type="text" id="nombre" name="nombre" placeholder="Nombre de archivo" required></input>
			</div>
			<div class="input">
				<p>Imagen</p>
				<input type="file" id="archivo" name="archivo" required></input>
			</div>
			<div class="input-text">
				<p>Descripción</p>
				<textarea type="text" id="contenido" name="contenido" placeholder="Describe la imágen..."></textarea>
			</div>
			</br>
			<div class="enviar">
				<input type="submit"></input>
			</div>
		</form>
		</br>
	</div>
		<?php 
	
			$registro = FormulariosControl::subirImagen();

			if($registro == "ok"){
				echo '<script>
						if(window.history.replaceState){
				
							window.history.replaceState(null, null, window.location.href);
				
						}
		
					 </script>';

					 echo "	<div class='notificacion'> La imágen se ha subido Correctamente</div>";
			}
			else{
				echo "	<div class='notificacionE'> ".$registro."</div> 
					<script>
						if(window.history.replaceState){
				
							window.history.replaceState(null, null, window.location.href);
				
						}
		
					</script>";
			}

		?>
</main>
