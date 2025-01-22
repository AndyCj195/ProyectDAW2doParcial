<?php
require_once 'config/Config.php';

$controlador = (!empty($_REQUEST['c'])?htmlentities($_REQUEST['c']):CONTROLADOR_DEFECTO);

$controlador = ucwords(strtolower($controlador))."Controller";

$funcion = (!empty($_REQUEST['f'])?htmlentities($_REQUEST['f']):ACCION_DEFECTO);

require_once 'controller/'.$controlador.'.php';

$crtl = new $controlador(); //crea el objeto
$crtl->$funcion(); //ejecuta la funcion
?>