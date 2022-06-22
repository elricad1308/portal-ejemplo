<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Carga Fat-Free
require 'vendor/autoload.php';

// Crea una instancia del framework
$f3 = \Base::instance();

// Carga la configuración de la aplicación desde el archivo
$f3->config('app/config.ini');

// Carga la configuración de las rutas desde el archivo
$f3->config('app/routes.ini');

// Ejecuta la aplicaciòn
$f3->run();