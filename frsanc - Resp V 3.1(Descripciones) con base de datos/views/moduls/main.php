<?php
	
	$contPorPag = 8;
	
	if(isset($_GET["search"])){
		$_GET["search"] = str_replace("<",".", $_GET["search"]);
		if(!isset($_GET["num"])){
			$pagAct = 1;
		}else{
			$pagAct = $_GET["num"];
		}
		$imagenes = FormulariosControl::ctrlObtenerBusquedaPag($_GET["search"],($pagAct*$contPorPag)-$contPorPag,$pagAct*$contPorPag);
		$publicacionesTotales = count($imagenes);
	}else{
		if(!isset($_GET["num"])){
			$pagAct = 1;
		}else{
			$pagAct = $_GET["num"];
		}
		$todo = FormulariosControl::ctrlObtenerRegistro();
		$imagenes = FormulariosControl::ctrlObtRegPag(($pagAct*$contPorPag)-$contPorPag, $pagAct*$contPorPag);
		$publicacionesTotales = count($todo);
	}

	
	$paginas = ceil($publicacionesTotales/$contPorPag);
?>

<main class="main">
	<?php if (isset($imagenes) && isset($_GET["search"])): ?>
		<?php if($imagenes != null || count($imagenes) > 0): ?>
			<h3 class="titulo">Resultados para "<?php echo $_GET["search"]; ?>"</h3>
				<div class="grid-imagenes">
					<?php foreach($imagenes as $key => $value): ?>
						<a href="index.php?pag=imgDispl&pop=<?php echo $value['id'] ?>"><div class="img-cont"><img src="<?php echo $value['ruta'] ?>" alt="<?php echo $value['nombre'] ?>"/></div><?php echo $value['nombre']?></a>
					<?php endforeach ?>
				</div>
				<div class="cont-pag">
					<ul>
						<?php for($i=0;$i<$paginas;$i++):?>
							<li class="<?php echo $pagAct==$i+1? 'active' : ''?>"><a href="index.php?search=<?php echo $_GET['search']?>&num=<?php echo $i+1?>"><?php echo $i+1?></a></li>
						<?php endfor?>
					</ul>
				</div>
		<?php else: ?>
			<h2 class="titulo">No se encontraron resultados para "<?php echo $_GET["search"]; ?>"</h2>
		<?php endif ?>
	<?php else: ?>
		<h1 class="titulo">Inicio || Te amo</h1>
		<div class="grid-imagenes">
			<?php foreach($imagenes as $key => $value): ?>
				<a href="index.php?pag=imgDispl&pop=<?php echo $value['id'] ?>"><div class="img-cont"><img src="<?php echo $value['ruta'] ?>" alt="<?php echo $value['nombre'] ?>"/></div><?php echo $value['nombre']?></a>
			<?php endforeach ?>

			<a href="#"><img src="https://via.placeholder.com/500x281?text=TeAmoSara" alt="Jsjsjsjsjs" />La mujer</a>
			<a href="#"><img src="https://via.placeholder.com/500x281?text=TeAmoSara" alt="Jsjsjsjsjs" />PERFECTA</a>
			<a href="#"><img src="https://via.placeholder.com/500x281?text=TeAmoSara" alt="Jsjsjsjsjs" />Tan HERMOSA</a>
			<a href="#"><img src="https://via.placeholder.com/500x281?text=TeAmoSara" alt="Jsjsjsjsjs" />Mi novia</a>
		</div>

		<div class="cont-pag">
			<ul>
				<?php for($i=0;$i<$paginas;$i++):?>
					<li class="<?php echo $pagAct==$i+1? 'active' : ''?>"><a href="index.php?pag=main&num=<?php echo $i+1?>"><?php echo $i+1?></a></li>
				<?php endfor?>
			</ul>
		</div>
	<?php endif ?>
	
</main>