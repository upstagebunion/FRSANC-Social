<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN""http://www.w3.org/TR/html4/strict.dtd"> 

<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> Te Amo Sara | FRSANC </title>
	<link href="estilos/estilos.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
	 <link rel="icon" href="images/logo150.png" type="image/png" sizes="150x150"> 
	 
<link rel="stylesheet" href="assets/styles/normalize.css">
<link rel="stylesheet" href="assets/styles/main.css">
</head>
	
	<body>

		<div class="contenedor active" id="contenedor">
			
			<?php 
				include "views/moduls/header.php";
			?>

			<?php
				$navAct = ContentCont::ctrlNav();
				include $navAct;
			?>

			<?php

				$cont = new ContentCont;
				$cont -> contenido();

			?>
	</body>
	
		<script src="https://kit.fontawesome.com/4d06835232.js" crossorigin="anonymous"></script>
		<script src="jscript/jscript.js"></script>

</html>