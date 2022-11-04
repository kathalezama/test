<?php 
require 'vendor/autoload.php';
require_once 'config/global.php';
require_once 'config/database.php';

if(!isset($_GET["c"])) $_GET["c"] = constant("DEFAULT_CONTROLLER");
if(!isset($_GET["a"])) $_GET["a"] = constant("DEFAULT_ACTION");

$controller_path = 'app/controller/'.$_GET["c"].'Controller.php';

/* Check if controller exists */
if(!file_exists($controller_path)) $controller_path = 'app/controller/'.constant("DEFAULT_CONTROLLER").'.php';

/* Load controller */
require_once $controller_path;
$controllerName = $_GET["c"].'Controller';
$controller = new $controllerName();

/* Check if method is defined */
$dataToView["data"] = array();
if(method_exists($controller,$_GET["a"])) $dataToView["data"] = $controller->{$_GET["a"]}();


/* Load views */
require_once 'resources/layout/header.php';
require_once 'resources/views/'.$controller->view.'.php';
require_once 'resources/layout/footer.php';

?>