<?php
//confifuracion para la encriptacion de datos
define("KEY", "13112003101020021311200310102002");
define("METHOD","AES-256-CBC");

//rutas de controladores y funciones
define("CONTROLADOR_DEFECTO", "index");
define("ACCION_DEFECTO", "index");


//rutas de templates
define("HEADER","view/templates/header.php");
define("FOOTER","view/templates/footer.php");


//rutas de vistas modulo usuario
define("VUSUARIO","view/usuarios/usuarios.");

define("VRUTAS","view/RutasRecoleccion/RutasR.");

define("VEMPRESA","view/empresa/empresa.");

define("VHISTORIAL","view/historial/historial.");

//rutas de vistas modulo materiales
define("VMATERIALES","view/gestionmateriales/materiales.");


//conexion a la base de datos
define("DB_NAME","daw_dbproyecto");
define("DB_USER","root");
define("DB_PASS","");
?>