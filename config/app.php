<?php

define('APP_PATH',  __DIR__ . '/..');
define('CONTROLLER__DEFAULT', 'Pages');
define('APP_NAME', 'cms_digitalpaco');



#Autoload Composer
require_once APP_PATH . '/vendor/autoload.php';

#Variable de entorno
require_once 'env.php';
require_once 'functions.php';
#controller
$controllerDefault= CONTROLLER__DEFAULT;
if ($_GET && isset($_GET["controller"])) {
    $controllerDefault = ucfirst($_GET['controller']);
    if (file_exists("app/Controllers/{$controllerDefault}.php")) {
        require_once ("app/Controllers/{$controllerDefault}.php");
    }else {
        die("$controllerDefault no encontrado");
    }
}else{
    if (file_exists("app/Controllers/$controllerDefault.php")) {
        require_once("app/Controllers/$controllerDefault.php");
    }else {
        die("$controllerDefault no encontrado");
    }
}
$cotrollerClass = new $controllerDefault();



