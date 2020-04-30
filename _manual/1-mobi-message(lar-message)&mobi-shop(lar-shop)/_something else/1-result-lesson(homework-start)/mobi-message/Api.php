<?php
namespace ApiModel;

require_once './vendor/autoload.php';

class Api {

public function __construct()
{
   //...
}

public function mailerMessage($title, $message)
{
    $client = new \GuzzleHttp\Client();  
    //$response = $client->request('POST', 'http://laravel-message/api/mobimessage?api_token=12345678', [ 
    $response = $client->request('POST', 'http://lar-message/test.php', [ 
        'form_params' => [
            'title' => $title, //title, message
            'message' => $message,
            'datevisit' => date('Y-m-d'),              
        ]
    ]);  
    //return json_decode($response->getBody()->getContents()); //stdClass Object ...->id(success) or ...->message[0](error of field of message) 
    return $response->getBody()->getContents();  
}

}

?>
