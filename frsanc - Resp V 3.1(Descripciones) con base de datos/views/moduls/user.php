<?php 
	if(isset($_GET["user"])){
		$usuarioExiste = UserCont::ctrlObtenerUsuario($_GET["user"]);
		if($usuarioExiste != null){
			$posts = UserCont::ctrlObtenerBusqueda($_GET["user"]);
		}else{
			echo '<script>window.location = "index.php?pag=error404";</script>';
		}
	}else{
		echo '<script>window.location = "index.php?pag=error404";</script>';
	}
?>

<main class="main">
	<h2 class="titulo">Perfil de "<?php echo $usuarioExiste[0]["usuario"]; ?>"</h2>
	<h3> Publicaciones hechas: </h3>
	<div class="grid-imagenes">
	<?php foreach($posts as $key => $value): ?>
		<a href="index.php?pag=imgDispl&pop=<?php echo $value['id'] ?>"><div class="img-cont"><img src="<?php echo $value['ruta'] ?>" alt="<?php echo $value['nombre'] ?>"/></div><?php echo $value['nombre']?></a>
	<?php endforeach ?>
	</div>
</main>