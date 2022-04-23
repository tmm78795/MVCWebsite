<?php
require_once "Controller/Controller.php";
$controller = "Controller";
$function = 'invoke';

$controllerObj = new $controller();



if(isset($_GET['function']) && $_GET['function'] != "") {
    $tempFun = Controller::sanitizeString($_GET['function']);
    if(method_exists($controller, $tempFun)) {
        $function = Controller::sanitizeString($_GET['function']);
    }
  
}


$controllerObj->$function();

?>