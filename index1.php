<?php
require_once "Controller/adminController.php";
$controller = "AdminController";
$function = 'invoke';

$controllerObj = new $controller();

if(isset($_GET['function']) && $_GET['function'] != "") {
    $tempFun = AdminController::sanitizeString($_GET['function']);
    if(method_exists($controller, $tempFun)) {
        $function = $tempFun;
    }
  
}


$controllerObj->$function();

?>