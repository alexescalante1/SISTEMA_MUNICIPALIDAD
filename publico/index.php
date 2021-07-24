<?php

require_once "controladores/general.controlador.php";
require_once "modelos/general.modelo.php";



require_once "controladores/plantilla.controlador.php";
require_once "modelos/plantilla.modelo.php";

require_once "modelos/rutas.php";

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();