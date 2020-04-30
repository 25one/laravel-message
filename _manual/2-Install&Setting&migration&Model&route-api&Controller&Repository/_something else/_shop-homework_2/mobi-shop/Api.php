<?php
namespace ApiModel;

require_once './vendor/autoload.php';

class Api {

public function __construct()
{
   //...
}

public function mailerMessage($title, $message, $apitoken)
{
    $client = new \GuzzleHttp\Client();  

    //$response = $client->request('POST', 'http://laravel-shop/api/apimessage?api_token=12345678', [
    $response = $client->request('POST', 'http://laravel-shop/api/apimessage', [
    //$response = $client->request('POST', 'http://lar-shop/test.php', [ 
        'form_params' => [
            'title' => $title, //title, message
            'message' => $message,
            'datevisit' => date('Y-m-d'),   
            'apitoken' => $apitoken,                        
        ]
    ]);  

    //return json_decode($response->getBody()->getContents()); //stdClass Object ...->id(success) or ...->message[0](error of field of message) 
    return $response->getBody()->getContents();  
}

}

?>
