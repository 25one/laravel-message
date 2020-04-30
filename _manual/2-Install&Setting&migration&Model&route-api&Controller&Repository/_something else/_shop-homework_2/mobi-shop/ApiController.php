<?php
namespace ApiController;

require_once './vendor/autoload.php';

use ApiModel\Api;

class ApiController {

protected $model_api;

public function __construct()
{
   $this->model_api = new Api;
}

public function actionStart()
{
   //if(isset($_SESSION['answer']) && $_SESSION['answer']) {
   //   $answer = $_SESSION['answer'];
   //   $_SESSION['answer'] = '';
   //}	
   require_once 'message.php';
}

public function actionMessage()
{
   echo $this->model_api->mailerMessage($_POST['title'], $_POST['message'], $_POST['apitoken']);
   //header('location:index.php');   
}

}

?>
