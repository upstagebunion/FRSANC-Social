<?php $verif = new ContentCont; ?>
<?php if(isset($_GET["pag"])): ?>

	<nav class="menu-lateral">
		<a href="index.php?pag=main" <?php $verif -> selecNav("main"); ?> ><i class="far fa-heart"></i>Te amo</a>
		<a href="#"><i class="far fa-heart"></i>Eres</a>
		<a href="#"><i class="far fa-heart"></i>El amor</a>
		<a href="#"><i class="far fa-heart"></i>De mi vida</a>
		<hr />
		<a href="index.php?pag=loving_you" <?php $verif -> selecNav("loving_you"); ?>><i class="far fa-heart"></i>Loving You</a>
		<a href="index.php?pag=under_rain" <?php $verif -> selecNav("under_rain"); ?>><i class="far fa-heart"></i>Under Rain</a>
		<a href="index.php?pag=pinguinita" <?php $verif -> selecNav("pinguinita"); ?>><i class="far fa-heart"></i>PING�INITA</a>
		<a href="#"><i class="far fa-heart"></i>PERFECTA</a>
		<hr />
		<a href="index.php?pag=registro" <?php $verif -> selecNav("registro"); ?>><i class="far fa-heart"></i>Registro</a>
		<a href="index.php?pag=logIn" <?php $verif -> selecNav("logIn"); ?>><i class="far fa-heart"></i>Inicio Sesi�n</a>
	</nav>

<?php else: ?>
	
	<nav class="menu-lateral">
		<a href="index.php?pag=main" class="active" ><i class="far fa-heart"></i>Te amo</a>
		<a href="#"><i class="far fa-heart"></i>Eres</a>
		<a href="#"><i class="far fa-heart"></i>El amor</a>
		<a href="#"><i class="far fa-heart"></i>De mi vida</a>
		<hr />
		<a href="index.php?pag=loving_you"><i class="far fa-heart"></i>Loving You</a>
		<a href="index.php?pag=under_rain"><i class="far fa-heart"></i>Under Rain</a>
		<a href="index.php?pag=pinguinita" ><i class="far fa-heart"></i>PING�INITA</a>
		<a href="#"><i class="far fa-heart"></i>PERFECTA</a>
		<hr />
		<a href="index.php?pag=registro"><i class="far fa-heart"></i>Registro</a>
		<a href="index.php?pag=logIn"><i class="far fa-heart"></i>Inicio Sesi�n</a>
	</nav>

<?php endif ?>