<?php
//session_start();
require_once './vendor/autoload.php';

use ApiController\ApiController;

$controller = new ApiController();

if(!isset($_POST['hook'])) {$hook='Start'; $parametr = '';} else {
    $hook = $_POST['hook'];
    if(strpos($hook, '/')) {
       $arr_hook = explode('/', $hook);
       $hook = $arr_hook[0];
       $parametr = $arr_hook[1];
    }
    else {
       $parametr = '';    
    }
}
$action='action' . $hook;
$controller->$action($parametr);
?>
