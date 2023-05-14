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

			<h3 class="titulo">Bienvenido <?php echo $_SESSION["user"]; ?> </h3></br>
			<?php if($_SESSION["admin"] == true){
				echo '<h3>Usted tiene permisos de Administrador</h3>';
			}else{
				echo '<h3>No cuentas con permisos de Administrador</h3>';
			}

			/*$usuario = new UserCont;
			$usuario -> contUser();*/
				
				/*<div class="grid-imagenes">
				<?php foreach($usuario as $key => $value): ?>
				<a href="index.php?pag=imgDispl&pop=<?php echo $value['id'] ?>"><div class="img-cont"><img src="<?php echo 'users/'.$_SESSION["user"].$value; ?>" alt="algo"/></div><?php echo $value['nombre']?></a>
				<?php endforeach ?>*/

					
			?>
			


</main>