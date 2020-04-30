<?php
namespace ApiModel;

require_once './vendor/autoload.php';

class Api {

public function __construct()
{
   //...
}

//mailerMessage
public function mailerMessage($title, $message, $apitoken)
{
    $client = new \GuzzleHttp\Client();  
    //$response = $client->request('POST', 'http://lar-shop/test.php', [ 
    $response = $client->request('POST', 'http://laravel-shop/api/apimessages', [ 
        'form_params' => [
            'title' => $title, //title, message
            'message' => $message,
            'apitoken' => $apitoken,            
            'datevisit' => date('Y-m-d'), //+datevisit - Y-m-d                
        ]
    ]);  
    //return json_decode($response->getBody()->getContents()); //stdClass Object ...->id(success) or ...->message[0](error of field of message) 
    return $response->getBody()->getContents();  
}

}

?>
