<?php

require_once "controladores/plantilla.controlador.php";

require_once "controladores/publicacion.controlador.php";
require_once "modelos/publicacion.modelo.php";

require_once "controladores/administradores.controlador.php";
require_once "modelos/administradores.modelo.php";


require_once "modelos/rutas.php";

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();