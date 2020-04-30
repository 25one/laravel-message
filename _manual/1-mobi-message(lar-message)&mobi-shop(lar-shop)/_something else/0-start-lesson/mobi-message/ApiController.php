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
   require_once 'message.php';
}

}

?>
