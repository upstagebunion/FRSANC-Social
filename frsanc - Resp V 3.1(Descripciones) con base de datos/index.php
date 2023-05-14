<?php

	session_start();

?>
<?php
    require_once "controllers/TempCont.php";
    require_once "controllers/ContCont.php";
    require_once "controllers/FormulariosCont.php";
    require_once "controllers/userCont.php";
    require_once "models/formularios.php";
    require_once "models/users.php";


    $plantilla = new TemplateControl();
    $plantilla -> traerPlantilla();
?>