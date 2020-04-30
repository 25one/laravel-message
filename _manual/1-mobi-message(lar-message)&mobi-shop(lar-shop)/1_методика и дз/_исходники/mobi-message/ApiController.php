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
   if(isset($_SESSION['answer']) && $_SESSION['answer']) {
      $result_api = $_SESSION['answer'];
      $_SESSION['answer'] = '';   	
   }

   require_once 'message.php';
}

public function actionMessage()
{
   $_SESSION['answer'] = $this->model_api->mailerMessage($_POST['title'], $_POST['message']);
   header('location:index.php');
}

}

?>
