<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/notificacion.controlador.php";
require_once "controladores/accesorapido.controlador.php";
require_once "controladores/articulos.controlador.php";

require_once "modelos/plantilla.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/notificacion.modelo.php";
require_once "modelos/accesorapido.modelo.php";
require_once "modelos/articulos.modelo.php";

require_once "modelos/rutas.php";

require_once "extensiones/PHPMailer/PHPMailerAutoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();